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
}
?>