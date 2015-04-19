<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_student extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_student(){
		return $this->db->get("student")->result();
	}
	public function addStudent($rs){
		$this->db->insert("student",$rs) ;
	}
	public function get_student($id){
		$sql = "SELECT * where id = $id";
		$rs = $this->db->query($sql) ;
	}
}


?>
