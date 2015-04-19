<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_schedule extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_all_schedules(){
		//GET ALL SCHEDULE ENTRY
		return $this->db->get("schedule")->result();
	}

	public function get_rounds($date){
		$query = $this->db->query('SELECT * FROM schedule WHERE date = $date');
		foreach ($query->result() as $row)
		{
		    echo $row->title;
		    echo $row->name;
		    echo $row->email;
				echo $row->schedule_id;
				echo $row->date;
				echo $row->start_time;
				echo $row->end_time;
				echo $row->type;
				echo $row->round;
				echo $row->PLACE_place_id;
		}
		echo 'Total Results: ' . $query->num_rows();
	}
}


?>
