<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_student extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_student(){
		return $this->db->get("student")->result();
	}
	public function addStudent($data){
		/*data = array(
				"student_id" => 10,
				"th_prefix" => "นาย",
				"th_firstname" => "Mma",
				"th_lastname" => "THLastnameInput",
				"en_prefix" => "นาย",
				"en_firstname" => "ENFirstnameInput",
				"en_lastname" => "ENLastnameInput",
				"gender" => "gender" ,
				"picture_path" => "10"."jpg"
		);*/
		$this->db->insert('student',$data) ;
	}
	public function get_student($id){
		/*$sql = "SELECT * from student where student_id = $id";
		$rs = $this->db->query($sql) ;*/
		$this->db->where('student_id',$id);
		$rs = $this->db->get('student');
		return $rs->row();
	}
}


?>
