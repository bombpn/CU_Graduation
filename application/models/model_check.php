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
		//$sql = "SELECT max(order) FROM (SELECT * from join AS STU_ORDER where GROUP_group_id = '$group_id') INNER JOIN (SELECT * from transaction AS TRANS where SCHEDULE_schedule_id = '$schedule_id') ON STU_ORDER.STUDENT_student_id = TRANS.STUDENT_student_id";
		$sql = "SELECT max(`STU_ORDER`.order)AS MAX_VAL FROM (SELECT * from `join` where GROUP_group_id = '$group_id') AS `STU_ORDER` INNER JOIN (SELECT * FROM `transaction` WHERE SCHEDULE_schedule_id = '$schedule_id')AS `TRANS` ON `STU_ORDER`.STUDENT_student_id = `TRANS`.STUDENT_student_id";
		$result = $this->db->query($sql)->result();
		if($result[0]->MAX_VAL==NULL) $returnval = 0;
		else $returnval = $result[0]->MAX_VAL;
		return $returnval;
	}
	public function inserted_transaction($student_id,$schedule_id){
		//$result = $this->db->where('STUDENT_student_id',$student_id)->where('SCHEDULE_schedule_id',$schedule_id)->from('transaction')->count_all_results();
		$sql = "SELECT count(*)AS COUNT from `transaction` where STUDENT_student_id = '$student_id' and SCHEDULE_schedule_id = '$schedule_id'";
		$result = $this->db->query($sql)->result();
		if($result[0]->COUNT > 0) return true;
		else return false;
	}
	public function create_transaction($student_id, $schedule_id){
		$time = date('Y-m-d H:i:s');
		$data = array(
				'STUDENT_student_id' => $student_id,
				'SCHEDULE_schedule_id' => $schedule_id,
				'transaction_time' => $time
			);
		$this->db->insert('transaction',$data);
	}
	public function attend_prev($student_id, $time_count){
		$result = $this->db->where('STUDENT_student_id', $student_id)->get('transaction')->result();
		if(count($result) < $time_count) return false;
		else return true;
	}
}
?>