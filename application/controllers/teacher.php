<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("model_teacher", "teacher");
		date_default_timezone_set('Asia/Bangkok');
	}
	public function index() {
		$data['allteacher'] = $this->teacher->get_all_teacher();
		$data['search'] = '0';
		$this->load->view('inc_header');
		$this->load->view('teacher/home', $data);
		$this->load->view('inc_footer');
	}
	//
	public function get_teacher_data() {
		$data['teacher_id'] = $_POST['teacher_id'];
		$data['th_prefix'] = $_POST['th_prefix'];
		$data['th_firstname'] = $_POST['th_firstname'];
		$data['th_lastname'] =$_POST['th_lastname'];
		$data['en_prefix'] = $_POST['en_prefix'];
		$data['en_firstname'] = $_POST['en_firstname'];
		$data['en_lastname'] = $_POST['en_lastname'];
		$data['tel_number'] = $_POST['tel_number'];
		return $data;
	}
	public function get_teacher_belong_to_data() {
		$data['TEACHER_teacher_id'] = $_POST['teacher_id'];
		$data['FACULTY_faculty_id'] = $_POST['faculty_id'];
		return $data;
	}
	public function add_teacher() {
		if($_POST){
			foreach ($_POST as &$value) {
				$value = trim($value);
			}
			$this->teacher->add_teacher($this->get_teacher_data());
			$this->teacher->add_teacher_belong_to($this->get_teacher_belong_to_data());
			$this->index();
		}
	}
	//
	public function delete_teacher($teacher_id) {
		$this->teacher->delete_teacher($teacher_id);
		$this->index();
	}
	//
	public function edit_teacher() {
		if($_POST){
			foreach ($_POST as &$value) {
				$value = trim($value);
			}
			$this->teacher->edit_teacher($this->get_teacher_data());
			$this->teacher->edit_teacher_belong_to($this->get_teacher_belong_to_data());
			$this->index();
		}
	}
	//
	public function search_teacher() {
		if($_POST){
			$data['allteacher'] = $this->teacher->search_teacher($_POST);
			$data['search'] = '1';
			$this->load->view('inc_header');
			$this->load->view('teacher/home', $data);
			$this->load->view('inc_footer');
		}
	}
	//
	public function load_add_teacher_page() {
			$data['allfaculty'] = $this->teacher->get_other_table('faculty');
			$this->load->view('inc_header');
			$this->load->view('teacher/add_teacher', $data);
			$this->load->view('inc_footer');
	}
	//
	public function load_edit_teacher_page($teacher_id) {
			$data['edit_teacher_temp'] = $this->teacher->get_teacher($teacher_id);
			$data['allfaculty'] = $this->teacher->get_other_table('faculty');
			$this->load->view('inc_header');
			$this->load->view('teacher/add_teacher', $data);
			$this->load->view('inc_footer');
	}
	//
	public function load_search_teacher_page() {
			$data['allfaculty'] = $this->teacher->get_other_table('faculty');
			$this->load->view('inc_header');
			$this->load->view('teacher/search_teacher', $data);
			$this->load->view('inc_footer');
	}
	//
	public function has_key_in_teacher(){
		$has_key = $this->teacher->has_key_in_teacher($_POST);
		$this->output->set_content_type('application/json')->set_output(json_encode($has_key));
	}
}
