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

				$data = $this->getDataForEdit($rs);
				echo "Let's Edit $rs" ;
				//$this->load->view('inc_header');
				$this->load->view('student/edit',$data);
				//$this->load->view('inc_footer');
			}
		    /*
			else if ($rs == "#") {
				$var = array ("opt" => "edit") ;
				$this->load->view('inc_header');
				$this->load->view('student/search',$var);
				$this->load->view('inc_footer');
			}*/
			else if($_POST) {
				// 
				$faculty = $_POST["FacultyInput"];
				$group = $_POST["GroupInput"];
				$degree = $_POST["DegreeInput"];
				$honor = $_POST["HonorInput"];
				$gender = "F" ;
				if($_POST["THPrefixInput"] == "นาย") $gender = "M" ;

				$data = array(
				"student_id" => $_POST["IDInput"],
				"th_prefix" => $_POST["THPrefixInput"],
				"th_firstname" => $_POST["THFirstnameInput"],
				"th_lastname" => $_POST["THLastnameInput"],
				"en_prefix" => $_POST["ENPrefixInput"],
				"en_firstname" => $_POST["ENFirstnameInput"],
				"en_lastname" => $_POST["ENLastnameInput"],
				"gender" => $gender ,
				"picture_path" => $_POST["IDInput"].'.'."jpg",
				"barcode" => $_POST["IDInput"]/*
				"picture_path" => $_POST[("PicPathInput"),
				"degree" => $degree ,
				"faculty" => $faculty ,
				"group" => $group ,
				"honor" => $honor */
				);
				$id = $_POST["IDInput"] ;
				$this->model_student->updateStudent($id,$data)	;		
				echo "Update" ;
				//$this->load->view('inc_header');
				$this->load->view('student/successful',array("opt" => 'edit'));
				//$this->load->view('inc_footer');
			}

	}
	public function update($opt = "edit"){
		if($_POST){
			$faculty = $_POST["FacultyInput"];
			$group = $_POST["GroupInput"];
			$degree = $_POST["DegreeInput"];
			$honor = $_POST["HonorInput"];
			$gender = "F" ;
			if($_POST["THPrefixInput"] == "นาย") $gender = "M" ;

			$data = array(
				"student_id" => $_POST["IDInput"],
				"th_prefix" => $_POST["THPrefixInput"],
				"th_firstname" => $_POST["THFirstnameInput"],
				"th_lastname" => $_POST["THLastnameInput"],
				"en_prefix" => $_POST["ENPrefixInput"],
				"en_firstname" => $_POST["ENFirstnameInput"],
				"en_lastname" => $_POST["ENLastnameInput"],
				"gender" => $gender ,
				"picture_path" => $_POST["IDInput"].'.'."jpg"
				/*"barcode" => $_POST[("IDInput"),
				"picture_path" => $_POST[("PicPathInput"),
				"degree" => $degree ,
				"faculty" => $faculty ,
				"group" => $group ,
				"honor" => $honor */
			);
		updateStudent($data['student_id'],$data);
		$array = array('opt' => $opt);
		$this->load->view('inc_header');
		$this->load->view('student/successful',$array);
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
			$this->load->view('inc_header');
			$this->load->view('student/import');
			$this->load->view('inc_footer');
		}
	}

	public function del($id)
	{	
		if ($this->model_student->removeStudent($id)){
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
			$group = $_POST["GroupInput"];
			$degree = $_POST["DegreeInput"];
			$honor = $_POST["HonorInput"];
			$gender = "F" ;
			if($_POST["THPrefixInput"] == "นาย") $gender = "M" ;

			$data = array(
				"student_id" => $_POST["IDInput"],
				"th_prefix" => $_POST["THPrefixInput"],
				"th_firstname" => $_POST["THFirstnameInput"],
				"th_lastname" => $_POST["THLastnameInput"],
				"en_prefix" => $_POST["ENPrefixInput"],
				"en_firstname" => $_POST["ENFirstnameInput"],
				"en_lastname" => $_POST["ENLastnameInput"],
				"gender" => $gender ,
				"barcode" => $_POST["IDInput"] ,
				"picture_path" => $_POST["IDInput"].'.'."jpg"
				/*"barcode" => $_POST[("IDInput"),
				"picture_path" => $_POST[("PicPathInput"),
				"degree" => $degree ,
				"faculty" => $faculty ,
				"group" => $group ,
				"honor" => $honor */
			);			
			return $this->model_student->addStudent($data);
	}
	public function getDataForEdit($id){
			$r = $this->model_student->get_student_by_id($id);
				$data['student_id'] = $r->student_id ;
				$data['th_firstname'] = $r->th_firstname ;
				$data['th_lastname'] = $r->th_lastname ;
				$data['en_firstname'] = $r->en_firstname ; 
				$data['en_lastname'] = $r->en_lastname ; 
				$data['picture_path'] = $r->picture_path ;
				$ta = array('นาย' ,'นาง' ,'นางสาว');
				if($r->th_prefix == "นาง")
				{
					$ta[0] = 'นาง' ;
					$ta[1] = 'นาย' ;
				}
				else if($r->th_prefix == "นางสาว")
				{
					$ta[0] = 'นางสาว' ;
					$ta[2] = 'นาย' ;
				}
				$ea = array('Mr.','Mrs.' ,'Miss');
				if($r->en_prefix == "Mrs.")
				{
					$ea[0] = 'Mrs.' ;
					$ea[1] = 'Mr.' ;
				}
				else if($r->en_prefix == "Miss")
				{
					$ea[0] = 'Miss' ;
					$ea[2] = 'Mr.' ;
				}
				$data['ta'] = $ta ; 
				$data['ea'] = $ea ;
				return $data ;
	}
	public function uploadCSV(){
		try
        {
            if($this->input->post("ImportInput")){
            	$path = dirname($_SERVER["SCRIPT_FILENAME"])."/files/" ;  
		 		$config =  array(
                  'upload_path'     => $path,
                  'upload_url'      => base_url()."files/",
                  //'allowed_types'   => "csv|csv|gif|jpg|png|jpeg|pdf|doc|xml",
                  'allowed_types'   => "csv",
                  'overwrite'       => TRUE,
                  'max_size'        => "1000KB" 
                );

                $this->load->library('upload', $config);

                if ( !$this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('inc_header');
                        $this->load->view('student/fail', $error);
                		$this->load->view('inc_footer');
                }
                else
                {
                		$upload = $this->upload->data() ;
                        $data = array(
                        	'upload_data' => $upload , 
                        	"opt" => "importcsv",
                        	"full_path" => $upload["full_path"] ,
                        	"file_name" => $upload["orig_name"]);
                        $data['num_records'] = $this->readCSV($upload['full_path']);
						$this->load->view('inc_header');
                        $this->load->view('student/successful', $data);
						$this->load->view('inc_footer');
                }
            }
	}
	catch(Exception $err)
        {
            log_message("error",$err->getMessage());
            return show_error($err->getMessage());
        }

}
	public function readCSV($filePath){
			$this->load->library('csvreader');
      		$count = 0 ;
           $csvData = $this->csvreader->parse_file($filePath);
 			foreach($csvData as $field){
 				//print_r($field) ;
                $data['student_id'] = $field['student_id'] ;
                $data['th_prefix'] = $field['th_prefix'] ;
				$data['th_firstname'] = $field['th_firstname'] ;
				$data['th_lastname'] =  $field['th_lastname'] ;
                $data['en_prefix'] = $field['en_prefix'] ;
				$data['en_firstname'] = $field['en_firstname'] ;
				$data['en_lastname'] =  $field['en_lastname'] ;
                $data['gender'] = 	$field['gender'] ;
				$data['picture_path'] = $field['student_id'].'.jpg' ;
                $data['barcode'] = 	genBarcode($data['student_id']) ;
                 if ($this->model_student->addStudent($data)) $count++;
                
               }
           return $count ;
               /*
          	$line = 1 ;
            $file = fopen($filePath,"r");

			while(! feof($file))
  			{

  				$field = fgetcsv($file) ;
  				//Skip First Line!
  					if( $line > 1) {
                	echo "$field[0]<br>" ;
                	$data['student_id'] = $field[0] ;
                	$data['th_prefix'] = $field[1] ;
					$data['th_firstname'] = $field[2] ;
					$data['th_lastname'] =  $field[3] ;
                	$data['en_prefix'] = $field[4] ;
					$data['en_firstname'] = $field[5] ;
					$data['en_lastname'] =  $field[6] ;
                	$data['gender'] = 	$field[7] ;
					$data['picture_path'] = $data['student_id'].'.jpg' ;
                	$data['barcode'] = 	$data['student_id'] ;
                	if ($this->model_student->addStudent($data)) 
                		{$count++;}
                }
                $line++;
  			}
			fclose($file);*/
       }
       public function genBarcode($id){
       	return $id ;
       }
}
