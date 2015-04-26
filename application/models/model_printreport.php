<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_printreport extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function print_by_group($group_id){
		$this->db->from('student');
		$this->db->join('join', 'join.STUDENT_student_id=student.student_id', 'inner');
		$this->db->where('GROUP_group_id', $group);
		$this->db->order_by('order', 'ASC');
		return $this->db->get()->result();
	}

	public function print_all(){
		$this->db->select('group_id');
		$this->db->from('group');
		$this->db->order_by('group_id', 'ASC');
		$arr = $this->db->get()->result();
		$this->db->reset_query();
		$result_arr = array();

		foreach($arr as $key => $value){
			$result_arr[$value] = print_by_group($value);
		}
		return $result_arr;
	}

	public function print_by_id($student_id){
		$this->db->from('student');
		$this->db->where('student_id', $student_id);
		$this->db->join('join', 'join.STUDENT_student_id = student.student_id', 'inner');
		$this->db->join('group', 'group.group_id = join.GROUP_group_id', 'inner');
		return $this->db->get()->result();
	}

	public function print_multiple_id($student_id_arr){
		$result_arr = array();
		foreach($student_id_arr as $key => $value){
			$result_arr[$value] = print_by_id($value);
		}
		return $result_arr;
	}
}
?>