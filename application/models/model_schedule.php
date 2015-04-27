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

	public function getAllTeachers(){
		return $this->db->get("teacher")->result();
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

	public function addScheduleToDB($data,$attend,$teachers,$vipseats){
		 	$this->db->insert('schedule',$data);
			$this->db->select_max('schedule_id');
			$conditioned_schedule = $this->db->get('schedule');
			$resultRow = $conditioned_schedule->row_array();
			$schedule_id = $resultRow['schedule_id'];
			
			//ATTEND
			for($i = 0 ; $i < count($attend) ; $i++){
				$data_attend = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'GROUP_group_id'=>$attend[$i],
					'attendance_order'=>$i+1
				);
				$this->db->insert('attend',$data_attend);
			}

			//CONDUCT = > TEACHER 
			//ATTEND
			for($i = 0 ; $i < count($teachers) ; $i++){
				$teacher_conduct = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'TEACHER_teacher_id'=>$teachers[$i]
				);
				$this->db->insert('conduct',$teacher_conduct);
			}

			//VIPSEATS
			for($i = 0 ; $i < count($vipseats) ; $i++){
				$vip_seat_single = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'vip_seat'=>$vipseats[$i]
				);
				$this->db->insert('vip_seats',$vip_seat_single);
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

	public function getTeacherList($schedule_id){
		$teacherRows =$this->db->select('teacher.teacher_id,teacher.th_firstname')
		->from('conduct')->join('teacher','conduct.TEACHER_teacher_id = teacher.teacher_id','inner')
		->where('conduct.SCHEDULE_schedule_id',$schedule_id)->
		order_by('teacher.teacher_id','ASC')->get()->result();
		return $teacherRows;

	}


	public function editSchedule($data,$attend,$teachers,$vipseats,$schedule_id){

		$this->db->where('schedule_id', $schedule_id);
		$this->db->update('schedule', $data);

			//attend part
			//Delete All First
			$this->db->delete('attend', array('SCHEDULE_schedule_id' => $schedule_id));
			$this->db->delete('conduct', array('SCHEDULE_schedule_id' => $schedule_id));
			$this->db->delete('vip_seats', array('SCHEDULE_schedule_id' => $schedule_id));
			//Reinsert by Forms
			for($i = 0 ; $i < count($attend) ; $i++){
				$data_attend = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'GROUP_group_id'=>$attend[$i],
					'attendance_order'=>$i+1
				);
				$this->db->insert('attend',$data_attend);
			}

			//ATTEND
			for($i = 0 ; $i < count($teachers) ; $i++){
				$teacher_conduct = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'TEACHER_teacher_id'=>$teachers[$i]
				);
				$this->db->insert('conduct',$teacher_conduct);
			}

			//VIPSEATS
			for($i = 0 ; $i < count($vipseats) ; $i++){
				$vip_seat_single = array(
					'SCHEDULE_schedule_id' => $schedule_id,
					'vip_seat'=>$vipseats[$i]
				);
				$this->db->insert('vip_seats',$vip_seat_single);
			}

			return $data['date'];
	}

	public function dropSchedule($schedule_id){
		$this->db->delete('conduct', array('SCHEDULE_schedule_id' => $schedule_id));
		$this->db->delete('attend', array('SCHEDULE_schedule_id' => $schedule_id));
		$this->db->delete('schedule' , array('schedule_id'=>$schedule_id));
		
		echo "DROP ".$schedule_id." SUCCESSFULLY";
	}

	public function getVipSeats ($schedule_id){
		$results = $this->db->select('vip_seats.vip_seat')->from('vip_seats')
		->where('vip_seats.SCHEDULE_schedule_id',$schedule_id)->get()->result();

		return $results;
	}

	public function getTeacherList2($schedule_id){

		/*
			SELECT `teacher`.`teacher_id` , `teacher`.`th_firstname` , `conduct`.`SCHEDULE_schedule_id` 
			FROM `teacher` 
			LEFT JOIN `conduct` 
			ON `teacher`.`teacher_id` = `conduct`.`TEACHER_teacher_id` 
			WHERE `SCHEDULE_schedule_id` = 41 
			->where('conduct.SCHEDULE_schedule_id',$schedule_id)->or_where('SCHEDULE_schedule_id IS NULL')

			->where('conduct.SCHEDULE_schedule_id',$schedule_id)->or_where('conduct.SCHEDULE_schedule_id',NULL)
			OR `SCHEDULE_schedule_id` IS NULL
		*/

		$teacher = $this->db->select('teacher.teacher_id,teacher.th_firstname,teacher.th_lastname,conduct.SCHEDULE_schedule_id')
		->from('teacher')->join('conduct','teacher.teacher_id = conduct.TEACHER_teacher_id','left')
		->where('conduct.SCHEDULE_schedule_id',$schedule_id)->or_where('conduct.SCHEDULE_schedule_id IS NULL')
		->get()->result();

		return $teacher;
	}

}
?>
