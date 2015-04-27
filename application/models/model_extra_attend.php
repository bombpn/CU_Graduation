<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_extra_attend extends CI_Model {
	var $table = 'extra_attend';
	var $student_table = 'student';
	var $schedule_table = 'schedule';
	var $teacher_table = 'teacher';
	var $student_id = 'STUDENT_student_id';
	var $schedule_id = 'SCHEDULE_schedule_id';
	var $teacher_id = 'TEACHER_teacher_id';
	public function __construct(){
		parent::__construct();
	}
	public function add_student($data) {
		$this->db->where($this->student_id, $data[$this->student_id]);
		$this->db->where($this->schedule_id, $data[$this->schedule_id]);
		$this->db->where($this->teacher_id, $data[$this->teacher_id]);
		if($this->db->get($this->table)->num_rows() == 0) {
			$this->db->insert($this->table, $data);
		}
		echo 'Row succesfully inserted!';
	}
	//
	public function delete_student($student_id, $schedule_id) {
		$this->db->where($this->student_id, $student_id);
		$this->db->where($this->schedule_id, $schedule_id);
		$this->db->delete($this->table);
	}
	public function get_other_table($table_name) {
		return $this->db->get($table_name)->result();
	}
	public function get_student($schedule_id) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->schedule_id, $schedule_id);
		$this->db->join($this->student_table, $this->student_id.' = student_id');
		$this->db->order_by('STUDENT_student_id asc');
		return $this->db->get()->result();
	}
	public function get_teacher($schedule_id) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->schedule_id, $schedule_id);
		$this->db->join($this->teacher_table, $this->teacher_id.' = teacher_id');
		$this->db->order_by('STUDENT_student_id asc');
		return $this->db->get()->result();
	}
	public function get_place($schedule_id) {
		$this->db->select('*');
		$this->db->from($this->schedule_table);
		$this->db->where('schedule_id', $schedule_id);
		$this->db->join('place', 'place_id = PLACE_place_id');
		return $this->db->get()->result();
	}
	public function get_schedule() {
		$this->db->select('*');
		$this->db->from($this->schedule_table);
		$this->db->join('place', 'place_id = PLACE_place_id');
		return $this->db->get()->result();
	}
	public function search_schedule($student_id) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->student_id, $student_id);
		$this->db->join($this->schedule_table, $this->schedule_id.' = schedule_id');
		$this->db->join($this->teacher_table, $this->teacher_id.' = teacher_id');
		$this->db->join('place', 'place_id = PLACE_place_id');
		return $this->db->get()->result();
	}
	public function search_student($student_id) {
		$this->db->select('*');
		$this->db->from($this->student_table);
		$this->db->where('student_id', $student_id);
		return $this->db->get()->result();
	}
}
?>