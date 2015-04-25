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
}
