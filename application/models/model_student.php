<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_student extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_student(){
		return $this->db->get("student")->result();
	}
	public function addStudent($data){
		$this->db->insert('student',$data) ;
	}
	public function get_student($id,$th_firstname,$th_lastname,$en_firstname,$en_lastname){
		/*$sql = "SELECT * from student where student_id = $id";
		$rs = $this->db->query($sql) ;*/
		
		if($id) $this->db->where('student_id',$id);
		if($th_firstname) $this->db->where('th_firstname',$th_firstname);
		if($th_lastname) $this->db->where('th_lastname',$th_lastname);
		if($en_firstname) $this->db->where('en_firstname',$en_firstname);
		if($en_lastname) $this->db->where('en_lastname',$en_lastname);
		$rs = $this->db->get('student');
		return $rs->result_array();
	}
	public function get_student_by_id($id){
		$this->db->where('student_id',$id);
		$rs = $this->db->get('student');
		return $rs->row();
	}
	public function removeStudent($id){
		$this->db->where('student_id', $id);
		$this->db->delete('student');
	}
}


?>
