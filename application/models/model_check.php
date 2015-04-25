<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_check extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_schedules(){
		return $this->db->get("schedule")->result();
	}
}
?>