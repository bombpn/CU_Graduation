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
		return $this->db->get($this->table)->result();
	}
	public function get_teacher($teacher_id) {
		$this->db->where($this->id, $teacher_id);
		return $this->db->get($this->table)->result();
	}
	//
	public function add_teacher($data) {
		$this->db->where($this->id, $data['teacher_id']);
		if($this->db->get($this->table)->num_rows() == 0){
			$this->db->insert($this->table, $data);
		}
		echo 'Row succesfully inserted!';
	}
	//
	public function delete_teacher($teacher_id) {
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
		$this->db->like($this->id, $data['teacher_id']);
		$this->db->like($this->th_pre, $data['th_prefix']);
		$this->db->like($this->th_first, $data['th_firstname']);
		$this->db->like($this->th_last, $data['th_lastname']);
		$this->db->like($this->en_pre, $data['en_prefix']);
		$this->db->like($this->en_first, $data['en_firstname']);
		$this->db->like($this->en_last, $data['en_lastname']);
		//$this->db->like($this->tel, $data['tel_number']);
		return $this->db->get($this->table)->result();
	}
	//
}
?>