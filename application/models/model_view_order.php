<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_view_order extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_student_id($barcode){
		$find_by_barcode = $this->db->where('barcode',$barcode)->get('student')->result();
		$find_by_student_id = $this->db->where('student_id',$barcode)->get('student')->result();
		$student_id = 0;
		if(count($find_by_barcode) == 1) $student_id = $find_by_barcode[0]->student_id;
		else if(count($find_by_student_id) == 1) $student_id = $find_by_student_id[0]->student_id;

		return $student_id;
	}

	public function get_student_detail($student_id){
		return $this->db->select('*')->from('student')->where('student_id',$student_id)->get()->row();
		//->join('join','student.student_id = join.STUDENT_student_id','inner')->join('group','join.GROUP_group_id = group.group_id','inner')
	}

	public function get_student_join($student_id){
		return $this->db->select('*')->from('join')->where('STUDENT_student_id',$student_id)->join('group','join.GROUP_group_id = group.group_id','inner')->get()->result();
		//->join('attend','group.group_id = attend.GROUP_group_id','inner')->join('schedule','attend.SCHEDULE_schedule_id = schedule.schedule_id','inner')
	}

	public function get_schedule($group_id){
		return $this->db->select('*')->from('attend')->where('GROUP_group_id', $group_id)->join('schedule','attend.SCHEDULE_schedule_id = schedule.schedule_id','inner')->order_by('round','asc')->get()->result();
	}

	public function get_absolute_number($num_in_group, $group_attendance_order, $schedule_id){
		$before_grp = $this->db->select('*')->from('attend')->where('SCHEDULE_schedule_id',$schedule_id)->where('attendance_order <',$group_attendance_order)->join('join','join.GROUP_group_id = attend.GROUP_group_id','inner')->count_all_results();
		return $before_grp + $num_in_group;
	}
	public function get_place_filename($place_id){
		$result = $this->db->where('place_id',$place_id)->get('place')->row();
		return $result->floor_plan_file;
	}
	public function get_seat($order, $filename){
		$myfile = fopen("floorplan/".$filename, "r") or die("Unable to open file!");
		// Output one line until end-of-file
		$out = "";
		$count = 0;
		while(!feof($myfile)) {
		  	$in = fgets($myfile);
		  	$arr = explode(",",$in);
		  	$arrsize = count($arr);
		  	if($arrsize + $count >= $order){
		  		$out = $arr[$order - $count-1];
		  		break;
		  	}else{
		  		$count += $arrsize;
		  	}
		}
		fclose($myfile);
		return $out;
	}
}
?>