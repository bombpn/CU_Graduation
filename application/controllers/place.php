<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class place extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("model_place", "place");
	}
	public function index() {
		$data['allplace'] = $this->place->get_all_place();
		/*$data['place_id_search'] = "";
		$data['th_prefix_search'] = "";
		$data['th_firstname_search'] = "";
		$data['th_lastname_search'] = "";
		$data['en_prefix_search'] = "";
		$data['en_firstname_search'] = "";
		$data['en_lastname_search'] = "";
		$data['tel_number_search'] = "";*/
		$data['search'] = '0';
		$this->load->view('inc_header');
		$this->load->view('place/home', $data);
		$this->load->view('inc_footer');
	}

	public function calculate_seat($data) {
		$total_seat = 0;
		if ($data['option'] == "basic") {
			$total_seat = intval($data['row']) * intval($data['col']);
		}
		return $total_seat;
	}

	public function create_file($data) {
		$fname = 'floorplanX.csv';
		return $fname;
	}
	//
	public function add_place() {
		if($_POST){
			foreach ($_POST as &$value) {
				$value = trim($value);
			}
			$data['th_building'] = $_POST['th_building'];
			$data['en_building'] = $_POST['en_building'];
			$data['floor'] = $_POST['floor'];
			$data['room'] = $_POST['room'];
			$data['total_seat'] = $this->calculate_seat($_POST);
			$data['floor_plan_file'] = $this->create_file($_POST);
			$this->place->add_place($data);
			$this->index();
		}
	}
	//
	public function delete_place($place_id) {
		$this->place->delete_place($place_id);
		$this->index();
	}
	//
	public function edit_place() {
		if($_POST){
			foreach ($_POST as &$value) {
				$value = trim($value);
			}
			$_POST['total_seat'] = $this->calculate_seat($_POST);
			$this->place->edit_place($_POST);
			$this->index();
		}
	}
	//
	public function search_place() {
		if($_POST){
			$data['allplace'] = $this->place->search_place($_POST);
			/*$data['place_id_search'] = $_POST['place_id'];
			$data['th_prefix_search'] = $_POST['th_prefix'];
			$data['th_firstname_search'] = $_POST['th_firstname'];
			$data['th_lastname_search'] = $_POST['th_lastname'];
			$data['en_prefix_search'] = $_POST['en_prefix'];
			$data['en_firstname_search'] = $_POST['en_firstname'];
			$data['en_lastname_search'] = $_POST['en_lastname'];
			$data['tel_number_search'] = $_POST['tel_number'];*/
			$data['search'] = '1';
			$this->load->view('inc_header');
			$this->load->view('place/home', $data);
			$this->load->view('inc_footer');
		}
	}
	//
	public function load_add_place_page() {
			$this->load->view('inc_header');
			$this->load->view('place/add_place');
			$this->load->view('inc_footer');
	}
	//
	public function load_edit_place_page($place_id) {
			$data['edit_place_temp'] = $this->place->get_place($place_id);
			$this->load->view('inc_header');
			$this->load->view('place/edit_place', $data);
			$this->load->view('inc_footer');
	}
	//
	public function load_search_place_page() {
			$this->load->view('inc_header');
			$this->load->view('place/search_place');
			$this->load->view('inc_footer');
	}
	/*/
	public function pack($place_id, $th_faculty_name, $en_faculty_name) {
		$temp['faculty_id'] = $faculty_id;
		$temp['th_faculty_name'] = $th_faculty_name;
		$temp['en_faculty_name'] = $en_faculty_name;
		return $temp;
	}
	//*/
}
