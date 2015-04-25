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

	public function getDate($schedule_id){
		//GET DATE FROM SCHEDULE_ID
		$returnObject = array();
		$query = $this->db->from("schedule")->where('schedule_id',$schedule_id)->get()->result();
			foreach ($query as $row)
			{
			    $returnObject['schedule_id'] = $row->schedule_id;
					$returnObject['date'] = $row->date;
					$returnObject['start_time'] = $row->start_time;
					$returnObject['end_time'] = $row->end_time;
					$returnObject['type'] = $row->type;
					$returnObject['round'] = $row->round;
					$returnObject['PLACE_place_id'] = $row->PLACE_place_id;
			}
			return $returnObject;
	}

	public function getAllGroups(){
		return $this->db->get("group")->result();
	}

	public function getDatedSchedule($formattedDate){
		return $this->db->from("schedule")->where('date',$formattedDate)->get()->result();
	}

	public function getAllPlaces(){
		return $this->db->get("place")->result();
	}

	//SETTERS

	public function addScheduleToDB($data,$attend){
		  $this->db->insert('schedule',$data);
			$this->db->select_max('schedule_id');
			$conditioned_schedule = $this->db->get('schedule');
			$resultRow = $conditioned_schedule->row_array();

			$schedule_id = $resultRow['schedule_id'];
			//attend[0] = ENG
			//attend[1] =
			for(int i = 0 ; i < $attend.length ; i++){
				$data_attend = array(
					'schedule' =>
				);
				$this->db->insert('attend',$data_attend);
			}
			//SELECT MAX
			//GET IT SCHEDULT ID
			//INSERT ATTEND SCHEDULE ID AND $data[StudentGroup][i]
			//$this
			return $data['date'];

	}

}
?>
