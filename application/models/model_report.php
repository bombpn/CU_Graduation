<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_report extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_group(){
		$this->db->select('group_id');
		$this->db->select('th_group_name');
		$this->db->from('group');
		return $this->db->get()->result();
	}

	public function get_group_name($group_id){
		$this->db->select('group_id');
		$this->db->select('th_group_name');
		$this->db->from('group');
		$this->db->where('group_id', $group_id);
		return $this->db->get()->row()->th_group_name;
	}

	public function get_en_group_name($group_id){
		$this->db->select('group_id');
		$this->db->select('en_group_name');
		$this->db->from('group');
		$this->db->where('group_id', $group_id);
		return $this->db->get()->row()->en_group_name;
	}

	public function get_present_student($group_id, $round){
		$this->db->from('student');
		$this->db->join('join', 'join.STUDENT_student_id=student.student_id', 'inner');
		$this->db->where('join.GROUP_group_id', $group_id);
		$this->db->join('attend', 'attend.GROUP_group_id=join.GROUP_group_id', 'left');
		$this->db->join('schedule', 'schedule.schedule_id=attend.SCHEDULE_schedule_id', 'left');
		$this->db->join('transaction', 'transaction.STUDENT_student_id=student.student_id', 'inner');
		$this->db->order_by('order','ASC');
		if($round == 3){
			$this->db->where('schedule.type', 'Graduation');
			$this->db->where('schedule.round', $round);
		}
		else if($round == 1  || $round == 2){
			$this->db->where('schedule.type', 'Rehearsal');
			$this->db->where('schedule.round', $round);
		}
		else return NULL;
		return $this->db->get()->result_array();
	}

	public function get_absent_student($group_id, $round){
		// $this->db->select('student.student_id, student.th_prefix, 
		// 	student.th_firstname, student.th_lastname, join.GROUP_group_id');
		// $this->db->from('student');
		// $this->db->join('join', 'join.STUDENT_student_id=student.student_id', 'left');
		// $this->db->where('join.GROUP_group_id', $group_id);

		// $this->db->select('student.student_id, student.th_prefix, 
		// 	student.th_firstname, student.th_lastname, join.GROUP_group_id, transaction.SCHEDULE_schedule_id');
		// $this->db->join('transaction', 'transaction.STUDENT_student_id=student.student_id==', 'left');
		// $this->db->join('schedule', 'schedule.schedule_id=transaction.SCHEDULE_schedule_id', 'left');
		// if($round == 3){
		// 	$this->db->where('schedule.type', 'Graduation');
		// 	$this->db->where('schedule.round', $round);
		// }
		// else if($round == 1  || $round == 2){
		// 	$this->db->where('schedule.type', 'Rehearsal');
		// 	$this->db->where('schedule.round', $round);
		// }
		// else return NULL;
		// $this->db->where('transaction.STUDENT_student_id IS NULL');
		$this->db->from('student');
		$this->db->join('join', 'join.STUDENT_student_id=student.student_id', 'inner');
		$this->db->where('join.GROUP_group_id', $group_id);
		$this->db->join('attend', 'attend.GROUP_group_id=join.GROUP_group_id', 'left');
		$this->db->join('schedule', 'schedule.schedule_id=attend.SCHEDULE_schedule_id', 'left');
		$this->db->join('transaction', 'transaction.STUDENT_student_id=student.student_id', 'left');
		$this->db->order_by('order','ASC');
		if($round == 3){
			$this->db->where('schedule.type', 'Graduation');
			$this->db->where('schedule.round', $round);
		}
		else if($round == 1  || $round == 2){
			$this->db->where('schedule.type', 'Rehearsal');
			$this->db->where('schedule.round', $round);
		}
		else return NULL;
		$this->db->where('transaction.STUDENT_student_id IS NULL');
		return $this->db->get()->result_array();
	}

	public function get_all_student($group_id){
		$this->db->from('student');
		$this->db->join('join', 'join.STUDENT_student_id=student.student_id', 'inner');
		$this->db->where('join.GROUP_group_id', $group_id);
		$this->db->join('attend', 'attend.GROUP_group_id=join.GROUP_group_id', 'left');
		$this->db->join('schedule', 'schedule.schedule_id=attend.SCHEDULE_schedule_id', 'left');
		$this->db->order_by('order','ASC');
		$query = ("SELECT join.order, student.student_id, student.th_prefix,
			student.th_firstname, student.th_lastname,
			COUNT(CASE WHEN schedule.round = 1 THEN 1 ELSE NULL END) AS round1,
			COUNT(CASE WHEN schedule.round = 2 THEN 1 ELSE NULL END) AS round2,
			COUNT(CASE WHEN schedule.round = 3 THEN 1 ELSE NULL END) AS round3
			GROUP BY join.order, student.student_id, student.th_prefix,
			student.th_firstname, student.th_lastname
			ORDER BY join.order ASC
			");
		return $this->db->query($query)->get()->result();
	}
}
?>