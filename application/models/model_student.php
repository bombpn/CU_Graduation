<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_student extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_student(){
		return $this->db->get("student")->result();
	}
	public function addStudent($data){
	$this->db->where('student_id',$data['student_id']);
	if($this->db->get("student")->num_rows() == 0){
		//Clear old join/belong
		$this->db->where('STUDENT_student_id',$data['student_id']);
		$this->db->delete('join');
		$this->db->where('STUDENT_student_id',$data['student_id']);
		$this->db->delete('student_belong_to');
		//Relation Set Up
		$join = array('STUDENT_student_id' => $data['student_id'] ,
			'GROUP_group_id' => $data['group_id'] ,
			'order' => $data['order'] ,
			 'honors' => $data['honors']
			 );
		$this->db->insert('join',$join) ;

		$belong = array('STUDENT_student_id' => $data['student_id'] ,
			'FACULTY_faculty_id' => $data['faculty_id'] 
			 );
		$this->db->insert('student_belong_to',$belong) ;

		// Can insert new entry
		unset($data['degree']);
		unset($data['order']);
		unset($data['honors']);
		unset($data['group_id']);
		unset($data['faculty_id']);
		$this->db->insert('student',$data) ;
		return true ;
	}
		else{
			//Duplicate!
			return false ;
		}
	}
	public function get_student($id,$th_firstname,$th_lastname,$en_firstname,$en_lastname){
		/*$sql = "SELECT * from student where student_id = $id";
		$rs = $this->db->query($sql) ;*/
		
		if($id) $this->db->like('student_id',$id);
		if($th_firstname) $this->db->like('th_firstname',$th_firstname);
		if($th_lastname) $this->db->like('th_lastname',$th_lastname);
		if($en_firstname) $this->db->like('en_firstname',$en_firstname);
		if($en_lastname) $this->db->like('en_lastname',$en_lastname);
		$rs = $this->db->get('student');
		return $rs->result_array();
	}
	public function get_student_by_id($id){
		$this->db->where('student_id',$id);
		$rs = $this->db->get('student');
		return $rs->row();
	}
	public function remove_student($id){
		$this->db->where('student_id',$id);
		if($this->db->get("student")->num_rows() != 0){
			//Found!
			//Delete Relationship
			$this->db->where('STUDENT_student_id',$id) ;
			$this->db->delete('student_belong_to');
			$this->db->where('STUDENT_student_id',$id) ;
			$this->db->delete('join');
			//Delete Entity		
			$this->db->where('student_id', $id);
			$this->db->delete('student');
			return true ;
		}
		else{
			//No record!
			return false ;
		}
	}
	public function updateStudent($id,$data){
		$this->db->where('STUDENT_student_id',$id) ;
		$this->db->delete('student_belong_to') ;
		$belong = array('STUDENT_student_id' => $data['student_id'] ,
			'FACULTY_faculty_id' => $data['faculty_id'] 
			 );
		$this->db->insert('student_belong_to',$belong);

		$this->db->where('STUDENT_student_id',$id) ;
		$this->db->delete('join') ;
		$join = array('STUDENT_student_id' => $data['student_id'] ,
			'GROUP_group_id' => $data['group_id'] ,
			'order' => $data['order'] ,
			 'honors' => $data['honors']
			 );
		$this->db->insert('join',$join);
		
		unset($data['degree']);
		unset($data['order']);
		unset($data['honors']);
		unset($data['group_id']);
		unset($data['faculty_id']);		

		$this->db->where('student_id', $id);
		$this->db->update('student', $data);
	}
	public function get_faculty_for_import(){
		$rs = $this->db->get('faculty');
		$list = $rs->result_array() ;
		return $list ;
	}
	public function get_group_for_import(){
		$rs = $this->db->get('group');
		return $rs->result_array() ;
	}
	public function get_faculty_id_by_student($id){
		$this->db->where('STUDENT_student_id',$id) ;
		$rs = $this->db->get('student_belong_to');
		$fid = $rs->row();
		return $fid == NULL ? 0 : $fid->FACULTY_faculty_id ;
	}
	public function get_group_by_student($id){
		$this->db->where('STUDENT_student_id',$id) ;
		$rs = $this->db->get('join');
		$fid = $rs->row();
		return $fid == NULL ? NULL : $fid;
	}
	public function get_last_group_order($id){
		$this->db->order_by('order','DESC');
		$this->db->where('GROUP_group_id',$id);
		$r = $this->db->get('join');
		$last = $r->row_array() ;
		$order = 1 ;
		if(isset($last['order'])) {
			$order = $last['order']+1;
		}
		return  $order ; 
	}
	public function get_inter_degree_from_group($id){
		$this->db->select('degree,international');
		$this->db->where('group_id',$id);
		$r = $this->db->get('group');
		$result = $r->row_array() ;
		return  $result ; 
	}
}


?>
