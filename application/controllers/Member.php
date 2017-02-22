<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
		{
			// Allow some methods?
			$allowed = array(
				'index',
				'pixel',
			);
			if ( in_array($this->router->fetch_method(), $allowed))
			{
				redirect('dashboard/index');
			}
		}

		$this->load->model('Member_model', 'member');
	}

	public function index()
	{

		$config = array();
		$config['base_url'] = site_url(). "/member/index";
		$config['total_rows'] = $this->member->record_count();
		$config['per_page'] = 10;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = floor($choice);

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active cyan"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['result'] = $this->member->getall($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();
		//$data['result'] = $this->members->getall();
		$data['title'] = 'User Manage';
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('user', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function pixel()
	{
		$data['pixel'] = $this->member->getpixel();
		$data['title'] = 'Pixel Manage';
		$data['result'] = $this->member->getall();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pixel', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function update_pixel()
	{
		$id = $this->input->post('id');
		$pixel = $this->input->post('pixel');
		$data = array(
			'pixel_title' => $pixel
		);
		$this->member->update_pixel($id, $data);
		$this->session->set_flashdata('alert',  '<p id="alert">Update Pixel Successfully.</p>');
		redirect('member/pixel');
	}

	public function insert()
	{
		$data = array(
			'mem_name' => $this->input->post('name'),
			'mem_tel' => $this->input->post('phone'),
			'mem_email' => $this->input->post('email')
		);
		$this->member->insert($data);
		$this->session->set_flashdata('alert', '<p id="alert">ส่งแบบฟอร์มเรียบร้อยแล้ว</p>');
		redirect('home/index');
	}

	public function delete($id)
	{
		$this->db->where('mem_id', $id)->delete('members');
		redirect('member/index');
	}

	public function export()
	{
		if($this->input->post("btn_export")){
			// โหลด excel library
			$this->load->library('excel');

			// เรียนกใช้ PHPExcel
			$objPHPExcel = new PHPExcel();
			// เราสามารถเรียกใช้เป็น  $this->excel แทนก็ได้

			// กำหนดค่าต่างๆ ของเอกสาร excel
			$objPHPExcel->getProperties()->setCreator("LungBlob")
			->setLastModifiedBy("LungBlob")
			->setTitle("User Document")
			->setSubject("User Document")
			->setDescription("User List Document.")
			->setKeywords("User")
			->setCategory("User result file");

			// กำหนดชื่อให้กับ worksheet ที่ใช้งาน
			$objPHPExcel->getActiveSheet()->setTitle('User Report');

			// กำหนด worksheet ที่ต้องการให้เปิดมาแล้วแสดง ค่าจะเริ่มจาก 0 , 1 , 2 , ......
			$objPHPExcel->setActiveSheetIndex(0);

			// การจัดรูปแบบของ cell
			$objPHPExcel->getDefaultStyle()
			->getAlignment()
			->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP)
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			//HORIZONTAL_CENTER //VERTICAL_CENTER

			// จัดความกว้างของคอลัมน์
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

			// กำหนดหัวข้อให้กับแถวแรก
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'ลำดับ')
			->setCellValue('B1', 'ชื่อ')
			->setCellValue('C1', 'เบอร์โทร')
			->setCellValue('D1', 'อีเมล์');

			// ดึงข้อมูลเริ่มเพิ่มแถวที่ 2 ของ excel
			$start_row=2;
			$sql = "
			SELECT *
			FROM members
			";

			$query = $this->db->query($sql);
			$result = $query->result_array();
			$i_num=0;
			if(count($result)>0){
				foreach($result as $row){
					$i_num++;


					// เพิ่มข้อมูลลงแต่ละเซลล์
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$start_row, $i_num)
					->setCellValue('B'.$start_row, $row['mem_name'])
					->setCellValue('C'.$start_row, $row['mem_tel'])
					->setCellValue('D'.$start_row, $row['mem_email']);

					// เพิ่มแถวข้อมูล
					$start_row++;
				}

				// กำหนดรูปแบบของไฟล์ที่ต้องการเขียนว่าเป็นไฟล์ excel แบบไหน ในที่นี้เป้นนามสกุล xlsx  ใช้คำว่า Excel2007
				// แต่หากต้องการกำหนดเป็นไฟล์ xls ใช้กับโปรแกรม excel รุ่นเก่าๆ ได้ ให้กำหนดเป็น  Excel5
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  // Excel2007 (xlsx) หรือ Excel5 (xls)

				$filename='UserList-'.date("d-m-Y/H:i").'.xlsx'; //  กำหนดชือ่ไฟล์ นามสกุล xls หรือ xlsx
				// บังคับให้ทำการดาวน์ดหลดไฟล์
				header('Content-Type: application/vnd.ms-excel'); //mime type
				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
				header('Cache-Control: max-age=0'); //no cache
				ob_end_clean();
				$objWriter->save('php://output'); // ดาวน์โหลดไฟล์รายงาน
				// หากต้องการบันทึกเป็นไฟล์ไว้ใน server  ใช้คำสั่งนี้ $this->excel->save("/path/".$filename);
				// แล้วตัด header ดัานบนทั้ง 3 อันออก
				exit;
			}

		}
	}
}
