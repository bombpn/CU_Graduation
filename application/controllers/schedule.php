<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("model_schedule","schedule");
	}

	public function showDate($year =null , $month = null , $day = null){

				$conf = array('start_day' =>'sunday' ,
				'show_next_prev' =>'true' ,
				'next_prev_url' => base_url(). 'schedule/showDate',

				'template'    => '{table_open}<div class="row" style="width: 70%;"><div class="col-md-12">{/table_open}
           {heading_row_start}<center>{/heading_row_start}
           {heading_previous_cell}<caption><a href="{previous_url}" class="btn btn-primary" title="Previous Month">&lt;&lt;Prev</a>{/heading_previous_cell}
           {heading_title_cell} <a class="btn btn-primary">{heading}</a>{/heading_title_cell}

           {heading_next_cell}<a href="{next_url}" class="btn btn-primary" title="Next Month">Next&gt;&gt;</a></caption>{/heading_next_cell}
           {heading_row_end}</center><col class="weekday" span="5"><col class="weekend_sat"><col class="weekend_sun">{/heading_row_end}
					 {week_row_start}<div class="cal-row-fluid cal-row-head">{/week_row_start}
           {week_day_cell}<div class="cal-cell1">{week_day}</div>{/week_day_cell}
           {week_row_end}</div><div class="cal-month-box">{/week_row_end}

           {cal_row_start}<div class="cal-row-fluid cal-before-eventlist">{/cal_row_start}
           {cal_cell_start}<div class="cal-cell1">{/cal_cell_start}
           {cal_cell_content}<div class="date_event detail" val="{day}"><span class="pull-right">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content}
           {cal_cell_content_today}<div class="date_content" val="{day}"><span class="pull-right" style="font-weight:bold; ">{day}</span><span class="event d{day}">{content}</span></div>{/cal_cell_content_today}
           {cal_cell_no_content}<div class="date_content" val="{day}"><span class="pull-right">{day}</span><span class="event d{day}"></span></div>{/cal_cell_no_content}
           {cal_cell_no_content_today}<div class="date_content" val="{day}"><span class="pull-right" style="font-weight:bold; font-size:x-large; ">{day}</span><span class="event d{day}"></span></div>{/cal_cell_no_content_today}
           {cal_cell_blank}&nbsp;{/cal_cell_blank}
           {cal_cell_end}</div>{/cal_cell_end}
           {cal_row_end}</div>{/cal_row_end}
           {table_close</div>}</div>{/table_close}'
				);
				// LOAD LIBRARY
				$this->load->library('calendar',$conf);

				// GENERATE CALENDAR BASED ON YEAR AND MONTH
				$data['calendars'] = $this->calendar->generate($year,$month);
				$data['year'] = $year;
				$data['month'] = $month;
				// FETCH ALL SCHEDULE FROM DATABASE
				$db_schedule['allschedule'] = $this->schedule->get_all_schedules();

				// VIEWS
				$this->load->view('inc_header');
				$this->load->view('schedule/schedule',$data);

				if($day==null){
					$this->load->view('schedule/list',$db_schedule);
				}else{
					$formattedDate = $year."-".$month."-".$day;
					echo $formattedDate;
					$db_schedule['formattedDate'] = $formattedDate;
					$db_schedule['datedSchedule'] = $this->schedule->getDatedSchedule($formattedDate);
					$this->load->view('schedule/listByDay',$db_schedule);
				}
				$this->load->view('inc_footer');
	}

	public function addSchedule(){

		$fetch['groups'] = $this->schedule->getAllGroups();
		$fetch['places'] = $this->schedule->getAllPlaces();

		$this->load->view('inc_header');
		$this->load->view('schedule/add',$fetch);
		$this->load->view('inc_footer');
	}

	public function editSchedule($schedule_id = null){

		$fetch['groups'] = $this->schedule->getAllGroups();
		$fetch['places'] = $this->schedule->getAllPlaces();
		$fetch['individual'] = $this->schedule->getSchedule($schedule_id);

		$this->load->view('inc_header');
		$this->load->view('schedule/edit',$fetch);
		$this->load->view('inc_footer');
	}

	public function getSchedule($date = null){
		$fetch['datedSchedule'] = $this->schedule->getDatedSchedule();
	}

	public function index($year =null , $month = null)
	{
			$year = date("Y");
			$month = date('m');
			$this->showDate($year,$month);
	}
}
