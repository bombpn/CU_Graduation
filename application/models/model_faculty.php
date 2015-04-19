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
		$this->db->insert($this->table, $data);
	}
	public function delete_faculty($data) {
		$this->db->where($this->id, $data[0]);
		$this->db->delete($this->table);
	}
	public function edit_faculty($data) {
		$this->db->where($this->id, $data[0]);
		$this->db->update($this->table, array_slice($data, 1));
	}
	public function search_faculty($data) {
		$this->db->where($this->id, $data[0]);
		$this->db->like($this->th, $data[1]);
		$this->db->like($this->en, $data[2]);
		return $this->db->get($this->table)->result();
	}
}
?>