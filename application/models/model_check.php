<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_check extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_schedules(){
		return $this->db->get("schedule")->result();
	}
	public function get_schedule_detail($schedule_id){
		return $this->db->where('schedule_id',$schedule_id)->get("schedule")->row();
	}
	public function get_all_group($schedule_id){
		return $this->db->where("SCHEDULE_schedule_id",$schedule_id)->order_by("attendance_order","asc")->get("attend")->result();
	}
	public function get_group_name($group_id){
		return $this->db->where("group_id",$group_id)->get("group")->row();
	}
	public function get_name_list($group_id){
		return $this->db->select('*')->from('JOIN')->where('GROUP_group_id',$group_id)->join('STUDENT','STUDENT.student_id = JOIN.STUDENT_student_id','inner')->order_by('order','asc')->get()->result();
	}
	public function get_student_id($barcode,$group_id){
		$find_by_barcode = $this->db->where('barcode',$barcode)->get('student')->result();
		$find_by_student_id = $this->db->where('student_id',$barcode)->get('student')->result();
		$find_by_number = $this->db->where('order',$barcode)->where('GROUP_group_id',$group_id)->get('join')->result();
		echo "<script> alert(" . count($find_by_barcode) . " " . count($find_by_number) . " " . count($find_by_student_id) . ")</script>";
		if(count($find_by_number) > 0) return $find_by_number[0]->STUDENT_student_id;
		else if(count($find_by_barcode) > 0) return $find_by_number[0]->student_id;
		else if(count($find_by_student_id) > 0) return $find_by_student_id[0]->student_id;
		return 0;
	}
	public function get_student_detail($student_id, $group_id){
		return $this->db->select('*')->from('student')->where('student_id',$student_id)->join('join','student.student_id = join.STUDENT_student_id and join.GROUP_group_id = ' . $group_id,'inner')->get()->row();
	}
	public function get_max_student_no($schedule_id, $group_id){
		return 100;
	}
	public function inserted_transaction($student_id,$schedule_id){
		return true;
	}
	public function create_transaction($student_id, $schedule_id){
		
	}
}
?>