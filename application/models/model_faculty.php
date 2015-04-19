<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_faculty extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_all_faculties(){
		return $this->db->get("faculty")->result();
	}
}
?>