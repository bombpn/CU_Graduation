<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_group extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_group(){
		return $this->db->get("group")->result_array();
	}
	/*
	public function addStudent($data){
		$this->db->where('student_id',$data['student_id']);
		if($this->db->get("student")->num_rows() == 0){
		$this->db->insert('student',$data) ;
		return true ;
	}
		else{
			//Duplicate!
			return false ;
		}
	}*/
	public function get_group($id,$th_name,$en_name,$international,$degree){
		
		if($id) $this->db->where('group_id',$id);
		if($th_name) $this->db->like('th_group_name',$th_name);
		if($en_name) $this->db->like('en_group_name',$en_name);
		if($international) $this->db->where('international',$international);
		if($degree) $this->db->where('degree',$degree);
		$rs = $this->db->get('group');
		return $rs->result_array();
	}/*
	public function get_student_by_id($id){
		$this->db->where('student_id',$id);
		$rs = $this->db->get('student');
		return $rs->row();
	}
	public function removeStudent($id){
		$this->db->where('student_id',$id);
		if($this->db->get("student")->num_rows() == 0){
			$this->db->where('student_id', $id);
			$this->db->delete('student');
			return true ;
		}
		else{
			//Duplicate!
			return false ;
		}
	}
	public function updateStudent($id,$data){
		$this->db->where('student_id', $id);
		$this->db->update('student', $data);
	}*/
}


?>
