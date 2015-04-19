<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_schedule extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_schedules(){
		//GET ALL SCHEDULE ENTRY
		return $this->db->get("schedule")->result();
	}

	public function getSchedule($schedule_id){
		//GET ALL SCHEDULE ENTRY
		return $this->db->from("schedule")->where('schedule_id',$schedule_id)->get()->result();
	}

	public function getAllGroups(){
		//$query = $this->db->query("SELECT * FROM group ");
		//return $query->result();
		return $this->db->get("group")->result();
	}

	public function getDatedSchedule($formattedDate){
		return $this->db->from("schedule")->where('date',$formattedDate)->get()->result();
	}

	public function getAllPlaces(){
		//$query = $this->db->query("SELECT * FROM place ");
		//return $query->result();
		return $this->db->get("place")->result();
	}

}
?>
