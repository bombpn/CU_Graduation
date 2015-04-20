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
	public function barcode_check($schedule_id){
		$result = $this->check->get_all_group($schedule_id);
		foreach($result as $res){
			$res->th_group_name = $this->check->get_group_name($res->GROUP_group_id)->th_group_name;
		}
		$data['allgroup_in_schedule'] = $result;
		$data['schedule_detail'] = $this->check->get_schedule_detail($schedule_id);
		$data['first_faculty'] = $this->check->get_name_list($result[0]->GROUP_group_id);
		//$this->load->view('inc_header');
		$this->load->view('check/barcode_check',$data);
		//$this->load->view('inc_footer');
	}
}