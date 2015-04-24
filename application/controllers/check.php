<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class check extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_check","check");
	}
	public function index(){
		$data['allschedule'] = $this->check->get_all_schedules();
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
				$data['student_id'] = $student_id;
				$data['student'] = $this->check->get_student_detail($student_id,$group_id);
				$prev_num = $this->input->post('prev_num');
				$max_student_no = $this->check->get_max_student_no($schedule_id,$group_id);
				if($this->check->inserted_transaction($student_id,$schedule_id)){
					// inserted
					$data['color'] = 'danger';
				}else if($data['student']->order < $max_student_no){
					// come late
					$data['color'] = 'red';
				//}else if($data['student']->order == $prev_num+1){ $data['color'] = 'green'; }
				}else if($data['student']->order == $max_student_no+1){
					// in order
					$data['color'] = 'green';
				}else{
					// skip order
					$data['color'] = 'yellow';
				}
			}else{
				$data['has_data'] = 'notfound';
				$data['color'] = 'red';
			}
			
		}
		//$data['first_faculty'] = $this->check->get_name_list($result[0]->GROUP_group_id);
		//$this->load->view('inc_header');
		$this->load->view('check/barcode_check',$data);
		//$this->load->view('inc_footer');
	}
}