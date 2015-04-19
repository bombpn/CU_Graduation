<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class faculty extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_faculty","faculty");
	}
	public function index(){
		$data['allfaculty'] = $this->faculty->get_all_faculty();
		$this->load->view('inc_header');
		$this->load->view('faculty/home',$data);
		$this->load->view('inc_footer');
	}

	public function add_faculty($data){
		
	}
}
