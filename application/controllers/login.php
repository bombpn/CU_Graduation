<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
	}
	public function index(){

		$this->load->view('login');

	}
}
