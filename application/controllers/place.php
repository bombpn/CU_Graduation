<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class place extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("model_place", "place");
		$this->load->helper('download');
	}
	public function index() {
		$data['allplace'] = $this->place->get_all_place();
		$data['search'] = '0';
		$this->load->view('inc_header');
		$this->load->view('place/home', $data);
		$this->load->view('inc_footer');
	}
	public function calculate_seat() {
		if ($_POST['option'] == 'nochange')
			return $_POST['total_seat'];
		else if ($_POST['option'] == 'basic') {
			// ------------------------------------------------------------------> make file
			$myfile = fopen('./floorplan/floorplan'.$_POST['place_id'].'.csv', "w");
			$row = intval($_POST['row']);
			$col = intval($_POST['col']);
			for ($i = 1; $i <= $row; $i++) {
				$row_num = '';
				$j = $i;
				do {
					$row_num = chr(65 + ($j - 1) % 26).$row_num;
					$j = intval(($j - 1) / 26);
				} while ($j > 0);
				$seats = '';
				for ($j = 1; $j <= $col; $j++) {
					$seats = $seats.$row_num.$j;
					if ($j == $col) $seats = $seats.chr(10);
					else $seats = $seats.',';
				}
				fwrite($myfile, $seats);
			}
			fclose($myfile);
			return $row * $col;
		}
		else {   	
			$path = dirname($_SERVER["SCRIPT_FILENAME"])."/floorplan/" ;  
	 		$config =  array(
	          'upload_path'     => $path,
	          'file_name'		=> 'floorplan'.$_POST['place_id'].'.csv',
	          'allowed_types'   => "csv",
	          'overwrite'       => TRUE,
	          'max_size'        => "1024KB"
	        );
	        $this->load->library('upload', $config);
	        $total_seat = 0;
	        if ($this->upload->do_upload('import_file')) {
	    		$upload = $this->upload->data() ;
		        $lines = file($upload['full_path']);
		        foreach ($lines as $line) {
		        	$elements = explode(',', $line);
		        	$total_seat += count($elements);
		        }
	        }
	        return $total_seat;
		}
	}
	//
	public function get_place_data() {
		$data['place_id'] = $_POST['place_id'];
		$data['th_building'] = $_POST['th_building'];
		$data['en_building'] = $_POST['en_building'];
		$data['floor'] = $_POST['floor'];
		$data['room'] = $_POST['room'];
		$data['floor_plan_file'] = 'floorplan'.$_POST['place_id'].'.csv';
		$data['total_seat'] = $this->calculate_seat();
		return $data;
	}
	public function add_place() {
		if($_POST){
			foreach ($_POST as &$value) {
				$value = trim($value);
			}
			$_POST['place_id'] = $this->place->get_next_id();
			$this->place->add_place($this->get_place_data());
			$this->index();
		}
	}
	//
	public function delete_place($place_id) {
		unlink('./floorplan/floorplan'.$place_id.'.csv');
		$this->place->delete_place($place_id);
		$this->index();
	}
	//
	public function edit_place() {
		if($_POST){
			foreach ($_POST as &$value) {
				$value = trim($value);
			}
			$this->place->edit_place($this->get_place_data());
			$this->index();
		}
	}
	//
	public function search_place() {
		if($_POST){
			$data['allplace'] = $this->place->search_place($_POST);
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
	public function download_floor_plan_file($file_name) {
		$data = file_get_contents('./floorplan/'.$file_name); // Read the file's contents
		force_download($file_name, $data);
	}
}
