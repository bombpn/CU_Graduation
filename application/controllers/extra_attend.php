<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class extra_attend extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("model_extra_attend", "extra_attend");
	}
	public function index() {
		$data['allschedule'] = $this->extra_attend->get_schedule();
		$this->load->view('inc_header');
		$this->load->view('extra_attend/home', $data);
		$this->load->view('inc_footer');
	}
	public function manage_schedule($schedule_id) {
		$data['allthisstudent'] = $this->extra_attend->get_student($schedule_id);
		$data['allthisteacher'] = $this->extra_attend->get_teacher($schedule_id);
		$data['allteacher'] = $this->extra_attend->get_other_table('teacher');
		$data['thisplace'] = $this->extra_attend->get_place($schedule_id);
		$this->load->view('inc_header');
		$this->load->view('extra_attend/manage_schedule', $data);
		$this->load->view('inc_footer');
	}
	public function add_student() {
		if ($_POST) {
			$this->extra_attend->add_student($_POST);
			$this->manage_schedule($_POST['SCHEDULE_schedule_id']);
		}
	}
	public function delete_student($student_id, $schedule_id, $page) {
		$this->extra_attend->delete_student($student_id, $schedule_id);
		if ($page == 'search') {
			$_POST['student_id'] = $student_id;
			$this->search_student();
		}
		else 
			$this->manage_schedule($schedule_id);
	}
	public function search_student() {
		$data['allschedule'] = $this->extra_attend->search_schedule($_POST['student_id']);
		$data['thisstudent'] = $this->extra_attend->search_student($_POST['student_id']);
		$this->load->view('inc_header');
		$this->load->view('extra_attend/search_student', $data);
		$this->load->view('inc_footer');
	}
}
