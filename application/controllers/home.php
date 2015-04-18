<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('inc_header');
		$this->load->view('home');
		$this->load->view('inc_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */