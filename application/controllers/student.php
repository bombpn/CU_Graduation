<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model("model_student","model_student");
	}

	public function index()
	{
				$this->load->view('inc_header');
				$this->load->view('student/main');
				$this->load->view('inc_footer');
	}
	public function search($id=0)
	{
				if ($_POST){
				$id = $_POST["SearchIDInput"] ;
				$th_firstname = $_POST["SearchTHFirstnameInput"] ;
				$th_lastname = $_POST["SearchTHLastnameInput"] ;
				$en_firstname = $_POST["SearchENFirstnameInput"] ;
				$en_lastname = $_POST["SearchENLastnameInput"] ;
				$data = $this->model_student->get_student($id,$th_firstname
					,$th_lastname,$en_firstname,$en_lastname);
						//$this->edit($data) ;
						$this->load->view('inc_header');
						$this->load->view('student/result',array("result"=>$data));
						$this->load->view('inc_footer');
				}
				else {
				$var = array ("opt" => "search") ;
				$this->load->view('inc_header');
				$this->load->view('student/search',$var);
				$this->load->view('inc_footer');
				}
	}
	public function edit($rs = "#")
	{		

			if(gettype($rs) == "string" && $rs != "#"){
				// Edit Student Info with ID
				// Prepare data for edit view
				$data = $this->getDataForEdit($rs);
				$data['facultyList'] = $this->model_student->get_faculty_for_import() ;
				$data['groupList'] = $this->model_student->get_group_for_import() ;
				$this->load->view('inc_header');
				$this->load->view('student/edit',$data);
				$this->load->view('inc_footer');
			}
			else if($_POST) {
				//GET Data from View
				$faculty = $_POST["FacultyInput"];
				$group = $_POST["GroupInput"];
				$honors = $_POST["HonorInput"];
				$gender = "F" ;
				if($_POST["THPrefixInput"] == "นาย") $gender = "M" ;
				$order =  $this->model_student->get_last_group_order($group) ;
				$data = array(
				"student_id" => $_POST["IDInput"],
				"th_prefix" => $_POST["THPrefixInput"],
				"th_firstname" => $_POST["THFirstnameInput"],
				"th_lastname" => $_POST["THLastnameInput"],
				"en_prefix" => $_POST["ENPrefixInput"],
				"en_firstname" => $_POST["ENFirstnameInput"],
				"en_lastname" => $_POST["ENLastnameInput"],
				"gender" => $gender ,
				"barcode" => $_POST["BarcodeInput"] ,
				"picture_path" => $_POST["IDInput"].'.'."jpg",
				"faculty_id" => $faculty ,
				"group_id" => $group ,
				"order" => $order ,
				"honors" => $honors
				);
				$id = $_POST["IDInput"] ;
				$this->model_student->updateStudent($id,$data)	;

				$this->load->view('inc_header');
				$this->load->view('student/successful',array("opt" => 'edit'));
				$this->load->view('inc_footer');
			}

	}
	public function import()
	{
		if($this->input->post('SaveButton')!=null)
		{
			if ($this->saveByForm($_POST)){
				$this->load->view('inc_header');
				$this->load->view('student/successful',array("opt"=>"import" , "student_id" <= $_POST["IDInput"] ));
				$this->load->view('inc_footer');
			}
			else{
				$this->load->view('inc_header');
				$this->load->view('student/fail',array("error" => "Import"));
				$this->load->view('inc_footer');
			}
		}
		else if($this->input->post('ResetButton')!=null)
		{
			redirect(base_url()."student/import","refresh");
			exit();
		}
		else {
			$facultyList = $this->model_student->get_faculty_for_import() ;
			$groupList = $this->model_student->get_group_for_import() ;
			$this->load->view('inc_header');
			$this->load->view('student/import', array('facultyList' => $facultyList , 'groupList' => $groupList));
			$this->load->view('inc_footer');
		}
	}

	public function del($id)
	{	
		if ($this->model_student->remove_student($id)){
				$this->load->view('inc_header');
				$this->load->view('student/successful',array("opt"=>"del" , "student_id" <= $id ));
				$this->load->view('inc_footer');
			}
			else{
				$this->load->view('inc_header');
				$this->load->view('student/fail',array("error" => "Delele"));
				$this->load->view('inc_footer');
			}
	} 

	public function saveByForm($POST){
			$faculty = $POST["FacultyInput"];
			$group = $POST["GroupInput"];
			$degree = $POST["DegreeInput"];
			$honors = $POST["HonorInput"];
			$gender = "F" ;
			//New student order is the last order in that group.
			$order = $this->model_student->get_last_group_order($group);
			if($POST["THPrefixInput"] == "นาย") $gender = "M" ;

			$data = array(
				"student_id" => $POST["IDInput"],
				"th_prefix" => $POST["THPrefixInput"],
				"th_firstname" => $POST["THFirstnameInput"],
				"th_lastname" => $POST["THLastnameInput"],
				"en_prefix" => $POST["ENPrefixInput"],
				"en_firstname" => $POST["ENFirstnameInput"],
				"en_lastname" => $POST["ENLastnameInput"],
				"gender" => $gender ,
				"barcode" => $POST["BarcodeInput"] ,
				"picture_path" => $POST["IDInput"].'.'."jpg",
				"degree" => $degree ,
				"faculty_id" => $faculty ,
				"group_id" => $group ,
				"order" => $order ,
				"honors" => $honors
			);			
			return $this->model_student->addStudent($data);
	}
	public function getDataForEdit($id){
				$r = $this->model_student->get_student_by_id($id);
				$select_fid = $this->model_student->get_faculty_id_by_student($id) ;
				$group = $this->model_student->get_group_by_student($id) ;
				$data['student_id'] = $r->student_id ;
				$data['th_firstname'] = $r->th_firstname ;
				$data['th_lastname'] = $r->th_lastname ;
				$data['en_firstname'] = $r->en_firstname ; 
				$data['en_lastname'] = $r->en_lastname ; 
				$data['barcode'] = $r->barcode ;
				$data['picture_path'] = $r->picture_path ;
				$ta = array('นาย' ,'นาง' ,'นางสาว');
				$ea = array('Mr.','Mrs.' ,'Miss');
				$data['ta'] = $ta ; 
				$data['ea'] = $ea ;
				$data['select_th_prefix'] = $r->th_prefix ; 
				$data['select_en_prefix'] = $r->en_prefix ;
				$data['select_fid'] = $select_fid;
				$data['select_gid'] = $group != NULL ? $group->GROUP_group_id : 0;
				$data['order'] = $group != NULL ?  $group->order : "-" ;
				$data['honors'] = $group != NULL ?  $group->honors : 0 ;
				return $data ;
	}
	
       public function genBarcode($id){
       	return $id ;
       }
}
