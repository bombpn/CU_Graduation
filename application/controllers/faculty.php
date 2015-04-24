<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class faculty extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_faculty","faculty");
	}
	public function index(){
		$data['allfaculty'] = $this->faculty->get_all_faculty();
		$data['faculty_id_search'] = "";
		$data['th_faculty_name_search'] = "";
		$data['en_faculty_name_search'] = "";
		$this->load->view('inc_header');
		$this->load->view('faculty/home',$data);
		$this->load->view('inc_footer');
	}
	public function add_faculty(){
		if($_POST){
			$this->faculty->add_faculty($_POST);
			$this->index();
		}
	}
	public function delete_faculty($faculty_id){
		$this->faculty->delete_faculty($faculty_id);
		$this->index();
	}
	public function edit_faculty(){
		if($_POST){
			$this->faculty->edit_faculty($_POST);
			$this->index();
		}
	}
	public function search_faculty(){
		if($_POST){
			$data['allfaculty'] = $this->faculty->search_faculty($_POST);
			$data['faculty_id_search'] = $_POST['faculty_id'];
			$data['th_faculty_name_search'] = $_POST['th_faculty_name'];
			$data['en_faculty_name_search'] = $_POST['en_faculty_name'];
			$this->load->view('inc_header');
			$this->load->view('faculty/home',$data);
			$this->load->view('inc_footer');
		}
	}
	public function load_add_faculty_page(){
			$this->load->view('inc_header');
			$this->load->view('faculty/add_faculty');
			$this->load->view('inc_footer');
	}
	public function load_edit_faculty_page(){
			$data['edit_faculty_temp'] = $_POST;
			$this->load->view('inc_header');
			$this->load->view('faculty/edit_faculty', $data);
			$this->load->view('inc_footer');
	}
	public function pack($faculty_id,$th_faculty_name,$en_faculty_name){
		$temp['faculty_id'] = $faculty_id;
		$temp['th_faculty_name'] = $th_faculty_name;
		$temp['en_faculty_name'] = $en_faculty_name;
		return $temp;
	}
}
