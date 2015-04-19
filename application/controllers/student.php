<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model("model_student","student");
	}

	public function index()
	{
				$this->load->view('inc_header');
				$this->load->view('student/main');
				$this->load->view('inc_footer');
	}
	public function search($id=0)
	{
				$data = array(
					"id" => $id 
				);
				$this->load->view('inc_header');
				$this->load->view('student/search',$data);
				$this->load->view('inc_footer');
	}
	public function edit($id =0)
	{
				$data = array(
					"id" => $id 
				);
				$this->load->view('inc_header');
				$this->load->view('student/edit',$data);
				$this->load->view('inc_footer');
	}
	public function import()
	{
		if($this->input->post("SaveButton")!=null)
		{
			$faculty = $this->input->post("FacultyInput");
			$group = $this->input->post("GroupInput");
			$degree = $this->input->post("DegreeInput");
			$honor = $this->input->post("HonorInput");
			$gender = "F" ;
			if($gender == "นาย") $gender = "M" ;
			$rs = array(
				"student_id" => $this->input->post("IDInput"),
				"th_prefix" => $this->input->post("THPrefixInput"),
				"th_firstname" => $this->input->post("THFirstnameInput"),
				"th_lastname" => $this->input->post("THLastnameInput"),
				"en_prefix" => $this->input->post("ENPrefixInput"),
				"en_firstname" => $this->input->post("ENFirstnameInput"),
				"en_lastname" => $this->input->post("ENLastnameInput"),
				"gender" => $gender ,
				/*"barcode" => $this->input->post("IDInput"),
				"picture_path" => $this->input->post("PicPathInput"),
				"degree" => $degree ,
				"faculty" => $faculty ,
				"group" => $group ,
				"honor" => $honor */
			);
			$this->model_student->addStudent($rs);
			redirect(base_url()."student/import","refresh");
			exit();
		}
		else if($this->input->post("CancelButton")!=null)
		{
			redirect(base_url()."student/import","refresh");
			exit();
		}
				$this->load->view('inc_header');
				$this->load->view('student/import');
				$this->load->view('inc_footer');
	}

	public function clearStudent()
	{
		echo "Clear";

	} 
}
