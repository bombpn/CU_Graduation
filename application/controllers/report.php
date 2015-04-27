<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_report');
	}
	public function index(){
		$data['group'] = $this->model_report->get_group();
		//var_dump($data['group']);
		$this->load->view('inc_header');
		$this->load->view('report/index',$data);
		$this->load->view('inc_footer');
	}

	public function printt(){
		$this->load->library('excel');
		if($_POST){
			$group_id = $_POST['group'];
  			$round = $_POST['round'];
  			$printtype = $_POST['printtype'];
		}
		else{
			redirect('report');
		}
		$data['group_name'] = $this->model_report->get_group_name($group_id);
		$data['round'] = $round;
		if($round==1) $roundname = "[ซ้อม1]";
		else if($round==2) $roundname = "[ซ้อม2]";
		else $roundname = "[วันจริง]";
		if($printtype==1){
			$data['data'] = $this->model_report->get_present_student($group_id,$round);
			$data['title'] = $roundname."[รายชื่อคนมา]".$data['group_name'];
			$data['filename'] = $roundname."[รายชื่อคนมา]".$data['group_name']."(".date('Y-m-d H:i:s').").xlsx";
			$this->load->view('report/print',$data);
		}
		else if($printtype==2){
			$data['data'] = $this->model_report->get_absent_student($group_id,$round);
			$data['title'] = $roundname."[รายชื่อคนขาด]".$data['group_name'];
			$data['filename'] = $roundname."[รายชื่อคนขาด]".$data['group_name']."(".date('Y-m-d H:i:s').").xlsx";
			$this->load->view('report/print',$data);
		}
		else if($printtype==3){
			$data['data'] = $this->model_report->get_all_student($group_id);
			$data['title'] = $roundname."[รายชื่อทั้งหมด]".$data['group_name'];
			$data['filename'] = $roundname."[รายชื่อทั้งหมด]".$data['group_name']."(".date('Y-m-d H:i:s').").xlsx";
			$this->load->view('report/printall',$data);
		}
		else {
			redirect('report');
		}
	}

	public function template(){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//$this->excel->createSheet(NULL, 1);
		$this->excel->getActiveSheet()->setTitle('report');
		$this->excel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$this->excel->getActiveSheet()->getPageSetup()->setFitToPage(false);

		$this->excel->getDefaultStyle()->getFont()->setName('TH Sarabun New');
		$this->excel->getDefaultStyle()->getFont()->setSize(14);
		$this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(14);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(21);
		$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(21);
		$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);

		$this->excel->getActiveSheet()->getStyle('B1:G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$this->excel->getActiveSheet()->setCellValue('A2', 'Order');

		$this->excel->getActiveSheet()->setCellValue('B2', 'ID');

		$this->excel->getActiveSheet()->setCellValue('C2', 'prefix');

		$this->excel->getActiveSheet()->setCellValue('D2', 'Firstname');

		$this->excel->getActiveSheet()->setCellValue('E2', 'Lastname');

		$this->excel->getActiveSheet()->setCellValue('F2', 'Practice1');

		$this->excel->getActiveSheet()->setCellValue('G2', 'Practice2');

		$filename='just_some_random_name.xlsx'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}
