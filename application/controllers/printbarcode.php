<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class printbarcode extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_printbarcode');
		date_default_timezone_set('Asia/Bangkok');
	}
	public function index(){
		$data = array( 'data' => $this->model_printbarcode->get_all_group());
		$this->load->view('inc_header');
		$this->load->view('printbarcode/index', $data);
		$this->load->view('inc_footer');
	}

	public function printt(){
		//============================================================+
	// Data Initialization
		$data = array();
		$data['type'] = (isset($_GET["type"]) ? $_GET["type"] : 0);
		$data['group_id'] = (isset($_GET["id"]) ? $_GET["id"] : 0);
		$data['sid'] = (isset($_GET["sid"]) ? $_GET["sid"] : 0);
		$data['batch'] = (isset($_POST["batch-data"]) ? $_POST["batch-data"] : "");
		$data['special_barcode'] = false;
		$data['batch_each'] = array();
		//var_dump($data);

		if ($data['type'] == 1) { // Faculties
			/*$query = "SELECT * FROM tb_groups WHERE id=$id";
			$rquery = $mysqli->query($query);
		  	if ($rquery->num_rows != 1) {
		    	exit();
		  	}
		  	$group_data = $rquery->fetch_array();
		  	$query = "SELECT * FROM tb_students WHERE group_id=$id ORDER BY ordinal";
		  	$rquery = $mysqli->query($query);*/
		  	$data['data'] = $this->model_printbarcode->print_by_group($data['group_id']);
		  	//var_dump($data['data']);
		  	if (count($data['data']) == 0) {
		  		exit();
		  	}
		  	if ($data['group_id'] == 23 || $data['group_id'] == 36) { //23 ศศินทร์, 36 พยาบาลกาชาด
		    	$data['special_barcode'] = true;
		  	}
		} else if ($data['type'] == 2) { // Individual
		  	/*$query = "SELECT tb_students.*,tb_groups.print_name FROM tb_students LEFT JOIN tb_groups ON tb_students.group_id=tb_groups.id WHERE tb_students.sid='$sid'";
		  	$rquery = $mysqli->query($query);*/
		  	$data['data'] = $this->model_printbarcode->print_by_id($data['sid']);
		  	//var_dump($data['data']);
		  	if (count($data['data']) == 0) {
		    	exit();
		  	}
		} else if ($data['type'] == 3) {
		  	$data['batch_each'] = explode(" ", $data['batch']);
		  	for ($i = 0; $i < count($data['batch_each']); $i++) {
		    	$data['batch_each'][$i] = explode("|", $data['batch_each'][$i]);
		  	}
		  	$data['data'] = array();
		  	foreach ($data['batch_each'] as $batch_arr) {
			    $b_group_id = $batch_arr[0];
			    $b_num = $batch_arr[1];

			    if (strlen($b_num) == 10) {
			    	//$query = "SELECT tb_students.*,tb_groups.print_name FROM tb_students LEFT JOIN tb_groups ON tb_students.group_id=tb_groups.id WHERE tb_students.group_id=$b_group_id AND tb_students.sid='$b_num'";
			    	$temp = $this->model_printbarcode->print_by_id($b_num)[0];
			    } else {
			    	//$query = "SELECT tb_students.*,tb_groups.print_name FROM tb_students LEFT JOIN tb_groups ON tb_students.group_id=tb_groups.id WHERE tb_students.group_id=$b_group_id AND tb_students.ordinal=$b_num";
			    	$temp = $this->model_printbarcode->print_by_order($b_num, $b_group_id)[0];
			    	$b_num = $temp['student_id'];
			    }
			    if ($b_group_id == 23 || $b_group_id == 36) {
        			$temp['special_barcode'] = true;
        			$data['data'][$b_num] = $temp;
      			}
      			else {
      				$temp['special_barcode'] = false;
        			$data['data'][$b_num] = $temp;
      			}
			    /*$rquery = $mysqli->query($query);

			    if ($rquery->num_rows != 0) {
			    	$data = $rquery->fetch_array();
			    }*/
		  	}
			    //var_dump($data['data']);
		} else {
			exit();
		}
		//var_dump($data);
		//echo "</br>";
		$this->load->view('printbarcode/print', $data);
	}

	public function ajax_student_check(){
		  $sid = (isset($_POST["sid"]) ? $_POST["sid"] : "");
		  if ($sid == "") {
		    exit();
		  }
		  $data = $this->model_printbarcode->print_by_id($sid);
		  $n = count($data);
		  if ($n == 1) {
		    echo "1|" . $data[0]["th_prefix"] . $data[0]["th_firstname"] . " " . $data[0]["th_lastname"];
		  } else {
		    echo "0|";
		  }
	}

	public function test(){
		 $data = $this->model_printbarcode->print_by_id('5230302021');
		 var_dump($data);
		 echo "<br>";
		 $n = count($data);
		 echo $n;
		 echo "<br>";
		 if ($n == 1) {
		   echo "1|" . $data[0]["th_prefix"] . $data[0]["th_firstname"] . " " . $data[0]["th_lastname"];
		 } else {
		   echo "0|";
		 }
	}
}
