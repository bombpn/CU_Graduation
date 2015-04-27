<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("model_teacher", "teacher");
	}
	public function index() {
		$data['allteacher'] = $this->teacher->get_all_teacher();
		/*$data['teacher_id_search'] = "";
		$data['th_prefix_search'] = "";
		$data['th_firstname_search'] = "";
		$data['th_lastname_search'] = "";
		$data['en_prefix_search'] = "";
		$data['en_firstname_search'] = "";
		$data['en_lastname_search'] = "";
		$data['tel_number_search'] = "";*/
		$data['search'] = '0';
		$this->load->view('inc_header');
		$this->load->view('teacher/home', $data);
		$this->load->view('inc_footer');
	}
	//
	public function add_teacher() {
		if($_POST){
			$this->teacher->add_teacher($_POST);
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
			$this->teacher->edit_teacher($_POST);
			$this->index();
		}
	}
	//
	public function search_teacher() {
		if($_POST){
			$data['allteacher'] = $this->teacher->search_teacher($_POST);
			/*$data['teacher_id_search'] = $_POST['teacher_id'];
			$data['th_prefix_search'] = $_POST['th_prefix'];
			$data['th_firstname_search'] = $_POST['th_firstname'];
			$data['th_lastname_search'] = $_POST['th_lastname'];
			$data['en_prefix_search'] = $_POST['en_prefix'];
			$data['en_firstname_search'] = $_POST['en_firstname'];
			$data['en_lastname_search'] = $_POST['en_lastname'];
			$data['tel_number_search'] = $_POST['tel_number'];*/
			$data['search'] = '1';
			$this->load->view('inc_header');
			$this->load->view('teacher/home', $data);
			$this->load->view('inc_footer');
		}
	}
	//
	public function load_add_teacher_page() {
			$this->load->view('inc_header');
			$this->load->view('teacher/add_teacher');
			$this->load->view('inc_footer');
	}
	//
	public function load_edit_teacher_page($teacher_id) {
			$data['edit_teacher_temp'] = $this->teacher->get_teacher($teacher_id);
			$this->load->view('inc_header');
			$this->load->view('teacher/edit_teacher', $data);
			$this->load->view('inc_footer');
	}
	//
	public function load_search_teacher_page() {
			$this->load->view('inc_header');
			$this->load->view('teacher/search_teacher');
			$this->load->view('inc_footer');
	}
	/*/
	public function pack($teacher_id, $th_faculty_name, $en_faculty_name) {
		$temp['faculty_id'] = $faculty_id;
		$temp['th_faculty_name'] = $th_faculty_name;
		$temp['en_faculty_name'] = $en_faculty_name;
		return $temp;
	}
	//*/
}
