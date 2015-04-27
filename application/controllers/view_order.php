<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class view_order extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_view_order","order");
		$this->load->helper('download');
	}
	public function index(){
		$data['color'] = 'green';
		$data['has_data'] = 'first';
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$data['has_data'] = 'has';
			$student_id = $this->order->get_student_id($this->input->post('barcode'));
			$data['barcode'] = $this->input->post('barcode');
			if($student_id!=0){
				$data['student_id'] = $student_id;
				$data['student'] = $this->order->get_student_detail($student_id);
				$data['student_join'] = $this->order->get_student_join($student_id);
				foreach($data['student_join'] as $stu_join){
					$stu_join->schedule = $this->order->get_schedule($stu_join->group_id);
					foreach($stu_join->schedule as $grp_attend){
						$grp_attend->absolute_num = $this->order->get_absolute_number($stu_join->order,$grp_attend->attendance_order,$grp_attend->schedule_id);
						$filename = $this->order->get_place_filename($grp_attend->PLACE_place_id);
						$grp_attend->filename = $filename;
						$grp_attend->seat = $this->order->get_seat($grp_attend->absolute_num, $filename);
					}
					//$order_in_sch = 
				}
			}else{
				// NOT FOUND
				$data['has_data'] = 'notfound';
				$data['color'] = 'red';
			}
			
		}
		//$this->load->view('inc_header');
		$this->load->view('view_order/home',$data);
		//$this->load->view('inc_footer');
	}
	/*
	public function download(){
		$data = file_get_contents("floorplan/floorplan1.csv"); // Read the file's contents
		$name = 'floorplan.csv';

		force_download($name, $data);
	}*/
}