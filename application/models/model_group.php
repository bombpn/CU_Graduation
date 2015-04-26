<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_group extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_group(){
		return $this->db->get("group")->result_array();
	}
	public function addGroup($data){
		$this->db->where('group_id',$data['group_id']);
		if($this->db->get("group")->num_rows() == 0){
			//Not have this ID
			$this->db->insert('group',$data) ;
			return true ;
		}
		else{
			//Duplicate!
			return false ;
		}
	}
	public function get_group($id,$th_name,$en_name,$international,$degree){
		
		if($id) $this->db->where('group_id',$id);
		if($th_name) $this->db->like('th_group_name',$th_name);
		if($en_name) $this->db->like('en_group_name',$en_name);
		$ia = array() ;
		$da = array() ;
		foreach($international as $i){
		 	if ($i != NULL ) array_push($ia,$i) ;
		 }
		 if (count($ia) >0 ) $this->db->where_in('international',$ia);
		foreach($degree as $d){ 

		 	if ($d != NULL ) array_push($da,$d) ;
		}
		if (count($da) >0 )  $this->db->where_in('degree',$da);
		$rs = $this->db->get('group');
		//echo $this->db->last_query() ;
		return $rs->result_array();
	}
	public function get_group_by_id($id){
		$this->db->where('group_id',$id);
		$rs = $this->db->get('group');
		return $rs->row_array();
	}
	public function get_student_from_group_id($id){
		$this->db->select('student_id,th_prefix,th_firstname,th_lastname,en_prefix,en_firstname,en_lastname');
		$this->db->from('student');
		$this->db->join('join', 'student.student_id = join.STUDENT_student_id');
		$this->db->where('join.GROUP_group_id', $id) ;
		$rs = $this->db->get();
		/*
		$this->db->select('STUDENT_student_id') ;
		$this->db->where('GROUP_group_id',$id);
		foreach ($rs->result_array() as $student_id) {
			$this->db->where_in('student_id',$student_id['STUDENT_student_id']);
		}
		$result_student = $this->db->get('student');*/
		return $rs->result_array();
	}
	public function removeGroup($id){
		$this->db->where('group_id',$id);
		if($this->db->get("group")->num_rows() != 0){
			$this->db->where('GROUP_group_id', $id);
			$this->db->delete('join');
			$this->db->where('group_id', $id);
			$this->db->delete('group');
			return true ;
		}
		else{
			//No Record!
			return false ;
		}
	}
	public function updateGroup($id,$data){
		$this->db->where('group_id', $id);
		$this->db->update('group', $data);
	}
	public function getLastID(){
		$this->db->select('group_id');
		$this->db->select_max('group_id');
		$r = $this->db->get('group');
		return $r->row()->group_id ; 
	}
	public function clearJoin($Group_group_id){
		$this->db->where('GROUP_group_id',$Group_group_id);
		$this->db->delete('join');	
	}/*
	public function addJoin($data){
		// Clear old relation
		$this->db->insert('join',$data);
	}
	public function addBelong($belong){
		$this->db->where('STUDENT_student_id',$belong['STUDENT_student_id']) ;
		$this->db->delete('student_belong_to');	
		$this->db->insert('student_belong_to',$belong);
		
	}*/
}


?>
