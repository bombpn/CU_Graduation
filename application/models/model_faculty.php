<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_faculty extends CI_Model {
	var $table = 'faculty';
	var $id = 'faculty_id';
	var $th = 'th_faculty_name';
	var $en = 'en_faculty_name';
	public function __construct(){
		parent::__construct();
	}
	public function get_all_faculty() {
		return $this->db->get($this->table)->result();
	}
	public function add_faculty($data) {
		$this->db->where($this->id, $data['faculty_id']);
		if($this->db->get($this->table)->num_rows() == 0){
			$this->db->insert($this->table, $data);
			return "success";
		}
		return "error";
	}
	public function delete_faculty($data) {
		$this->db->where($this->id, $data['faculty_id']);
		$this->db->delete($this->table);
		// console.log("[Model]delete success" + $data['faculty_id']);
	}
	public function edit_faculty($data) {
		$this->db->where($this->id, $data['faculty_id']);
		$this->db->update($this->table, array_slice($data, 1));
	}
	public function search_faculty($data) {
		$this->db->like($this->id, $data['faculty_id']);
		$this->db->like($this->th, $data['th_faculty_name']);
		$this->db->like($this->en, $data['en_faculty_name']);
		return $this->db->get($this->table)->result();
	}
}
?>