<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class check extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_check","check");
	}
	public function index(){
		$data['allschedule'] = $this->check->get_all_schedules_current();
		$this->load->view('inc_header');
		$this->load->view('check/home',$data);
		$this->load->view('inc_footer');
	}
	public function barcode_check($schedule_id, $attendance_order = 1){
		$result = $this->check->get_all_group($schedule_id);
		$active_group = 0;
		foreach($result as $res){
			$res->th_group_name = $this->check->get_group_name($res->GROUP_group_id)->th_group_name;
			if($res->attendance_order == $attendance_order) $active_group = $res->GROUP_group_id;
		}
		$data['allgroup_in_schedule'] = $result;
		$data['schedule_detail'] = $this->check->get_schedule_detail($schedule_id);
		$data['has_data'] = 'first';
		if($active_group == 0) $attendance_order = 0;
		$data['attendance_order'] = $attendance_order;
		$data['active_group'] = $active_group;
		$data['color'] = 'green';
		if($_SERVER['REQUEST_METHOD']=='POST'){
			//echo "<script>alert(". $this->input->post('barcode').");</script>";
			$data['has_data'] = 'has';
			$group_id = $this->input->post('group_id');
			$student_id = $this->check->get_student_id($this->input->post('barcode'),$group_id);
			$data['barcode'] = $this->input->post('barcode');
			if($student_id!=0){
				$msg['skip'] = false; // skip students
				$msg['prerequisite'] = false; // didn't come previous attend
				$msg['inserted'] = false; // insert transaction
				$msg['previously_inserted'] = false; // have inserted before
				$msg['late'] = false; // come late
				$msg['cant_extra'] = false; // can not extra attend

				$data['student_id'] = $student_id;
				$data['student'] = $this->check->get_student_detail($student_id,$group_id);
				if($attendance_order>0){
					$prev_num = $this->input->post('prev_num');
					$max_student_no = $this->check->get_max_student_no($schedule_id,$group_id);
					//$data['max_student_no'] = $max_student_no;
					$prerequisite = $data['schedule_detail']->round - 1;
					if(!$this->check->attend_prev($student_id, $prerequisite)){
						$data['color'] = 'red';
						$msg['prerequisite'] = true;
					}
					if($this->check->inserted_transaction($student_id,$schedule_id)){
						// inserted
						$data['color'] = 'danger';
						$msg['previously_inserted'] = true;
					}else if($data['student']->order < $max_student_no && $data['student']->order != $prev_num){
						// come late
						$data['color'] = 'red';
						$msg['late'] = true;
					//}else if($data['student']->order == $prev_num+1){ $data['color'] = 'green'; }
					}else{
						if($data['student']->order == $max_student_no+1){
							// in order
							$data['color'] = 'green';
						}else{
							// skip order
							$data['color'] = 'yellow';
							$msg['skip'] = true;
						}
						$prerequisite = $data['schedule_detail']->round - 1;
						if($this->check->attend_prev($student_id, $prerequisite) || $data['student']->order == $prev_num){
							$this->check->create_transaction($student_id,$schedule_id);
							$msg['inserted'] = true;
							$msg['prerequisite'] = false;
						}else{
							$data['color'] = 'red';
							$msg['prerequisite'] = true;
						}
						
					}
				}else{
					if($this->check->inserted_transaction($student_id,$schedule_id)){
						// inserted
						$data['color'] = 'danger';
						$msg['previously_inserted'] = true;
					}else{
						if($this->check->can_extra_attend($student_id,$schedule_id)){
							$msg['inserted'] = true;
							$this->check->create_transaction($student_id,$schedule_id);
						}else{
							$msg['cant_extra'] = true;
							$data['color'] = 'red';
						}
					}
					
				}
				$data['message'] = $msg;
			}else{
				$data['has_data'] = 'notfound';
				$data['color'] = 'red';
			}
			
		}
		$data['last10transaction'] = $this->check->get_last_10_transaction();
		//$data['first_faculty'] = $this->check->get_name_list($result[0]->GROUP_group_id);
		//$this->load->view('inc_header');
		$this->load->view('check/barcode_check',$data);
		//$this->load->view('inc_footer');
	}
	public function remove_trans($schedule_id, $attendance_order = 1, $remove_id = -1){
		if($remove_id>-1){
			$this->check->remove_transaction($remove_id,$schedule_id);
		}
		redirect('/check/barcode_check/'.$schedule_id.'/'.$attendance_order, 'refresh');
	}
    public function list_check($schedule_id, $attendance_order = 1){
        $result = $this->check->get_all_group($schedule_id);
        $active_group = 0;
        foreach($result as $res){
            $res->th_group_name = $this->check->get_group_name($res->GROUP_group_id)->th_group_name;
			if($res->attendance_order == $attendance_order) $active_group = $res->GROUP_group_id;
        }
		$data['allgroup_in_schedule'] = $result;
		$data['active_group'] = $active_group;
		$data['attendance_order'] = $attendance_order;
		$data['schedule_detail'] = $this->check->get_schedule_detail($schedule_id);
       	$prerequisite = $data['schedule_detail']->round - 1;
        if($active_group > 0) $name_list = $this->check->get_name_list($active_group);
        else $name_list = $this->check->get_extra_list($schedule_id);

        foreach($name_list as $student){
        	if($this->check->inserted_transaction($student->student_id, $schedule_id)) $student->checked = true;
        	else $student->checked = false;

        	$student->color = 'green';
        	$student->prerequisite = false;
			if($this->check->attend_prev($student->student_id, $prerequisite) || $student->checked){
				$student->prerequisite = false;
			}else{
				$student->color = 'red';
				$student->prerequisite = true;
			}
        }

        $data['name_list'] = $name_list;
		$data['last10transaction'] = $this->check->get_last_10_transaction();
        //$this->load->view('inc_header');
        $this->load->view('check/list_check',$data);
        //$this->load->view('inc_footer');
    }
    public function create_transaction($student_id,$schedule_id){
    	$this->check->create_transaction($student_id,$schedule_id);
    }
    public function remove_transaction($student_id,$schedule_id){
    	$this->check->remove_transaction($student_id,$schedule_id);
    }
}