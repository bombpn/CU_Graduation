<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_place extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_all_place(){
		return $this->db->get("place")->result();
	}

}
?>