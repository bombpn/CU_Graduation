<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model("model_group","model_group");
		$this->load->model("model_student","model_student");
	}

	public function index()
	{			

				$data = $this->model_group->get_all_group() ;
				$this->load->view('inc_header');
				$this->load->view('group/main',array("result" => $data));
				$this->load->view('inc_footer');
	}
	public function search($id=0)
	{
				if ($_POST){
				//print_r($_POST);
				$id = $_POST["SearchIDInput"] ;
				$th_name = $_POST["SearchTHNameInput"] ;
				$en_name = $_POST["SearchENNameInput"] ;
				$international = array() ;
				$degree = array() ;
				if(isset($_POST['InternationalCheck-0']))$international['InterBox0'] = $_POST['InternationalCheck-0'] ;
				if(isset($_POST['InternationalCheck-1']))$international['InterBox1'] = $_POST['InternationalCheck-1'];
				if(isset($_POST['DegreeCheck-0']))	$degree['DegreeBox0'] = $_POST['DegreeCheck-0'] ;
				if(isset($_POST['DegreeCheck-1']))	$degree['DegreeBox1'] = $_POST['DegreeCheck-1'] ;
				if(isset($_POST['DegreeCheck-2']))	$degree['DegreeBox2'] = $_POST['DegreeCheck-2'] ;
				$data = array();
				//if($international != NULL AND $degree != NULL)
				$data = $this->model_group->get_group($id,$th_name,$en_name,$international,$degree);
				//print_r($data);
				$this->load->view('inc_header');
				$this->load->view('group/result',array("result"=>$data));
				$this->load->view('inc_footer');
				}
				else {
				$var = array ("opt" => "search") ;
				$this->load->view('inc_header');
				$this->load->view('group/search',$var);
				$this->load->view('inc_footer');
				}
	}
	public function edit($rs = "#")
	{		

			if(gettype($rs) == "string" && $rs != "#"){
				//Call for edit
				$data = $this->getDataForEdit($rs);
				$this->load->view('inc_header');
				$this->load->view('group/edit',$data);
				$this->load->view('inc_footer');
			}
			else if($_POST) {
				print_r($_POST);
				$group_id = $_POST["IDInput"];
				$th_name = $_POST["THNameInput"];
				$en_name = $_POST["ENNameInput"];
				$international = $_POST["InternationalInput"];
				$degree = $_POST["DegreeInput"];

				$data = array(
				"group_id" => $group_id,
				"th_group_name" => $th_name,
				"en_group_name" => $en_name,
				"international" => $international,
				"degree" => $degree
				);
				$this->model_group->updateGroup($group_id,$data) ;
				$this->load->view('inc_header');
				$this->load->view('group/successful',array("opt" => 'edit'));
				$this->load->view('inc_footer');
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
		$this->load->view('group/successful',$array);
		$this->load->view('inc_footer');
		}
	}
	public function create()
	{
		if($this->input->post('SaveButton')!=null)
		{
			if ($this->save($_POST)){
				$name = $_POST["THNameInput"] ;
				$this->load->view('inc_header');
				$this->load->view('group/successful',array("opt"=>"create" , 'Gname' => $name ));
				$this->load->view('inc_footer');
			}
			else{
				$this->load->view('inc_header');
				$this->load->view('group/fail',array("error" => "Import"));
				$this->load->view('inc_footer');
			}
		}
		else if($this->input->post('ResetButton')!=null)
		{
			redirect(base_url()."group/create","refresh");
			exit();
		}
		else {
			$newID = $this->model_group->getLastID()+1;
			$this->load->view('inc_header');
			$this->load->view('group/create',array('group_id'=>$newID));
			$this->load->view('inc_footer');
		}
	}
	public function del($id)
	{	
		if ($this->model_group->removeGroup($id)){
				$this->load->view('inc_header');
				$this->load->view('group/successful',array("opt"=>"del" , "group_id" <= $id ));
				$this->load->view('inc_footer');
			}
			else{
				$this->load->view('inc_header');
				$this->load->view('group/fail',array("error" => "Delele"));
				$this->load->view('inc_footer');
			}
	} 

	public function save($POST){
				$id = $_POST["IDInput"] ;
				$th_name = $_POST["THNameInput"] ;
				$en_name = $_POST["ENNameInput"] ;
				$international = $_POST["InternationalInput"] ; ;
				$degree = $_POST["DegreeInput"] ; ;
			$data = array(
				"group_id" => $id,
				"th_group_name" => $th_name,
				"en_group_name" => $en_name,
				"international" => $international,
				"degree" =>$degree
			);			
			return $this->model_group->addGroup($data);
	}
	public function getDataForEdit($id){
			$r = $this->model_group->get_group_by_id($id);
				$data['group_id'] = $r['group_id'] ;
				$data['th_name'] = $r['th_group_name'] ;
				$data['en_name'] = $r['en_group_name'] ;
				$ia = array('International','ปกติ');
				$da = array('ตรี','โท' ,'เอก');
				$data['select_international'] = $r['international'] ; 
				$data['select_degree'] = $r['degree'] ; 
				$data['ia'] = $ia ;
				$data['da'] = $da ;
				return $data ;
	}
	public function addStudent($id){
				$ra = $this->model_group->get_group_by_id($id) ;
				$this->load->view('inc_header');
				$this->load->view('group/upload',array(
					"id" => $id , 
					"th_name" => $ra['th_group_name'],
					"en_name" => $ra['en_group_name'] ,
					"international" => $ra['international'] ,
					"degree" => $ra['degree']  ));
				$this->load->view('inc_footer');
	}
	public function uploadCSV(){
		try
        {
            if($this->input->post("UploadInput")){
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
                       // $this->load->view('inc_header');
                        $this->load->view('group/fail', $error);
                		//$this->load->view('inc_footer');
                }
                else
                {
                		$upload = $this->upload->data() ;
                        $data = array(
                        	'upload_data' => $upload , 
                        	"opt" => "importcsv",
                        	"full_path" => $upload["full_path"] ,
                        	"file_name" => $upload["orig_name"]);
                        $data['num_records'] = $this->readCSV($upload['full_path'],$_POST['IDInput']);
						$this->load->view('inc_header');
                        $this->load->view('group/successful', $data);
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
	public function readCSV($filePath,$group_id){
			$this->load->library('csvreader');
      		$count = 1 ;
           	$csvData = $this->csvreader->parse_file($filePath);
 			/*print_r($csvData) ;
 			echo "<br>";*/
 			if(count($csvData > 0)) $this->model_group->clearJoin($group_id) ;
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
                $data['barcode'] = 	$field['barcode'] ;
                $data['faculty_id'] = $field['faculty_id'] ;
                $data['group_id'] = $group_id ;
                $data['honors'] = $field['honors'] ;
                $data['order'] = $count ;
                // Add new student
                $this->model_student->addStudent($data) ;
                
                $count++;
               }
           return $count-1 ;
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
                	if ($this->model_group->addStudent($data)) 
                		{$count++;}
                }
                $line++;
  			}
			fclose($file);*/
       }
       public function viewStudent($id,$name){
       		$data = $this->model_group->get_student_from_group_id($id);
       		$this->load->view('inc_header');
            $this->load->view('group/student_result', array('result' => $data));
			$this->load->view('inc_footer');    
       }
}
