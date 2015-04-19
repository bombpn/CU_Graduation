<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_faculty extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_all_faculty() {
		return $this->db->get("faculty")->result();
	}
	public function add_faculty($data) {
		$this->db->insert('faculty', $data);
	}
	public function delete_faculty() {
		
	}
}
?>