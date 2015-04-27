<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_teacher extends CI_Model {
	var $table = 'teacher';
	var $id = 'teacher_id';
	var $th_pre = 'th_prefix';
	var $th_first = 'th_firstname';
	var $th_last = 'th_lastname';
	var $en_pre = 'en_prefix';
	var $en_first = 'en_firstname';
	var $en_last = 'en_lastname';
	var $tel = 'tel_number';
	public function __construct(){
		parent::__construct();
	}
	public function get_all_teacher(){
		$this->db->join('teacher_belong_to', 'TEACHER_teacher_id = '.$this->id);
		$this->db->join('faculty', 'FACULTY_faculty_id = faculty_id');
		return $this->db->get($this->table)->result();
	}
	public function get_teacher($teacher_id) {
		$this->db->where($this->id, $teacher_id);
		$this->db->join('teacher_belong_to', 'TEACHER_teacher_id ='.$this->id);
		return $this->db->get($this->table)->result();
	}
	//
	public function add_teacher($data) {
		$this->db->where($this->id, $data['teacher_id']);
		if($this->db->get($this->table)->num_rows() == 0) {
			$this->db->insert($this->table, $data);
		}
		echo 'Row succesfully inserted!';
	}
	//
	public function delete_teacher($teacher_id) {
		// ------ other_table -------
		$this->db->where('TEACHER_teacher_id', $teacher_id);
		$this->db->delete('extra_attend');
		$this->db->where('TEACHER_teacher_id', $teacher_id);
		$this->db->delete('conduct');
		$this->db->where('TEACHER_teacher_id', $teacher_id);
		$this->db->delete('teacher_belong_to');
		// ------ teacher -------
		$this->db->where($this->id, $teacher_id);
		$this->db->delete($this->table);
	}
	//
	public function edit_teacher($data) {
		$this->db->where($this->id, $data['teacher_id']);
		$this->db->update($this->table, array_slice($data, 1));
	}
	//
	public function search_teacher($data) {
		$this->db->select('*');
		$this->db->from('teacher_belong_to');
		if ($data['faculty_id']) {
			$this->db->where('FACULTY_faculty_id', $data['faculty_id']);
		}
		$this->db->join($this->table, 'TEACHER_teacher_id = '.$this->id);
		$this->db->join('faculty', 'FACULTY_faculty_id = faculty_id');
		$this->db->like($this->id, $data['teacher_id']);
		$this->db->like($this->th_pre, $data['th_prefix']);
		$this->db->like($this->th_first, $data['th_firstname']);
		$this->db->like($this->th_last, $data['th_lastname']);
		$this->db->like($this->en_pre, $data['en_prefix']);
		$this->db->like($this->en_first, $data['en_firstname']);
		$this->db->like($this->en_last, $data['en_lastname']);
		return $this->db->get()->result();
	}
	//
	public function get_other_table($table_name) {
		return $this->db->get($table_name)->result();
	}
	//
	public function add_teacher_belong_to($data) {
		$table_name = 'teacher_belong_to';
		$this->db->where('TEACHER_teacher_id', $data['TEACHER_teacher_id']);
		if($this->db->get($table_name)->num_rows() == 0) {
			$this->db->insert($table_name, $data);
		}
	}
	public function edit_teacher_belong_to($data) {
		$table_name = 'teacher_belong_to';
		$this->db->where('TEACHER_teacher_id', $data['TEACHER_teacher_id']);
		$this->db->delete($table_name);
		$this->db->insert($table_name, $data);
	}
}
?>