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

			for($i = 0 ; $i < count($attend) ; $i++){
				$data_attend = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'GROUP_group_id'=>$attend[$i],
					'attendance_order'=>$i+1
				);
				$this->db->insert('attend',$data_attend);
			}
			return $data['date'];
	}

	public function getAttendList($schedule_id){

		/*
		SELECT `attend`.`attendance_order`,`attend`.`GROUP_group_id`,`group`.`th_group_name`
		FROM `attend`
		INNER JOIN `group`
		ON `attend`.`GROUP_group_id` = `group`.`group_id`
		WHERE `attend`.`SCHEDULE_schedule_id` = @@@@@$schedule_id@@@@@@
		ORDER BY `attend`.`attendance_order` ASC
		*/

		$attendRows = $this->db->select('attend.attendance_order, attend.GROUP_group_id,group.th_group_name')
		->from('attend')->join('group', 'group.group_id = attend.GROUP_group_id', 'inner')
		->where('attend.SCHEDULE_schedule_id', $schedule_id)->
		order_by('attend.attendance_order','ASC')->get()->result();

		return $attendRows;

	}


	public function editSchedule($data,$attend,$schedule_id){

		$this->db->where('schedule_id', $schedule_id);
		$this->db->update('schedule', $data);

			//attend part
			//Delete All First
			$this->db->delete('attend', array('SCHEDULE_schedule_id' => $schedule_id));
			//Reinsert by Forms
			for($i = 0 ; $i < count($attend) ; $i++){
				$data_attend = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'GROUP_group_id'=>$attend[$i],
					'attendance_order'=>$i+1
				);
				$this->db->insert('attend',$data_attend);
			}
			return $data['date'];
	}

}
?>
