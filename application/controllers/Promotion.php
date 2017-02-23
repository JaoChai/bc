<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Promotion_model', 'promotion');
	}

	public function index()
	{
		$data['getcate'] = $this->promotion->getall();
		$data['result'] = $this->promotion->getall_promotion();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('dashboard/promotion', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}


	public function categorypromotion(){
		$data['result'] = $this->promotion->getall();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('dashboard/categorypromotion', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function insert_cate()
	{
		$this->form_validation->set_rules('cate', 'Category', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		$this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
		if($this->form_validation->run() == FALSE){
			$data['result'] = $this->promotion->getall();
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('dashboard/categorypromotion', $data);
			$this->load->view('layout/footer');
			$this->load->view('layout/javascript');
		}else{
			$data = array(
				'cate_name' => $this->input->post('cate'),
				'cate_link' => $this->input->post('linkcate')
			);
			$this->promotion->insert_cate($data);
			redirect('Promotion/categorypromotion');
		}
	}

	public function update_cate($id)
	{
		$this->form_validation->set_rules('cate', 'Category', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		$this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
		if($this->form_validation->run() == FALSE){
			$data['result'] = $this->promotion->getcate($id);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('dashboard/editcatepromotion', $data);
			$this->load->view('layout/footer');
			$this->load->view('layout/javascript');
		}else{
			$data = array(
				'cate_name' => $this->input->post('cate'),
				'cate_link' => $this->input->post('linkcate')
			);
			$this->promotion->update_cate($id, $data);
			redirect('Promotion/categorypromotion');
		}
	}

	public function delete_cate($id)
	{
		$this->db->where('cate_id', $id)->delete('category');
		redirect('Promotion/categorypromotion');
	}

	public function insert()
	{
		date_default_timezone_set('Asia/Bangkok');
		$this->form_validation->set_rules('cate', 'หมวดหมู่โปรโมชั่น', 'required');
		$this->form_validation->set_rules('title', 'ชื่อโปรโมชั่น', 'required');
		$this->form_validation->set_rules('sub_des', 'รายละเอียดย่อย', 'required');
		$this->form_validation->set_rules('editor1', 'รายละเอียด', 'required');
		$this->form_validation->set_rules('date', 'เวลานับถอยหลัง', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run() == FALSE){
			$data['getcate'] = $this->promotion->getall();
			$data['result'] = $this->promotion->getall_promotion();
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('dashboard/promotion', $data);
			$this->load->view('layout/footer');
			$this->load->view('layout/javascript');
		}else{
			if(isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])){
				$conf['upload_path'] = "./uploads/promotion/";
				$conf['allowed_types'] = 'gif|jpg|png';
				$conf['max_size'] = '2048000';
				$conf['max_width'] = '';
				$conf['max_height'] = '';
				$conf['overwrite'] = 'TRUE';
				$conf['remove_spaces'] = 'TRUE';
				$new_name = time().$_FILES["userfile"]['name'];
				$conf['file_name'] = $new_name;

				$this->load->library('upload', $conf);
				if(!$this->upload->do_upload()){

					$data['error'] = $this->upload->display_errors();
					$data['getcate'] = $this->promotion->getall();
					$data['result'] = $this->promotion->getall_promotion();
					$this->load->view('layout/header');
					$this->load->view('layout/sidebar');
					$this->load->view('layout/navbar');
					$this->load->view('dashboard/promotion', $data);
					$this->load->view('layout/footer');
					$this->load->view('layout/javascript');

				}else{
					//print_r($_FILES);
					$img = array();
					$img = $this->upload->data();
					$data = array(
						"pro_img" => $_FILES['userfile']['name'],
						"pro_newimg" => $img['file_name'],
						"pro_imgpath" => $img['full_path'],
						"cate_id" => $this->input->post("cate"),
						"pro_title" => $this->input->post("title"),
						"pro_sub_des" => $this->input->post("sub_des"),
						"pro_des" => $this->input->post("editor1"),
						"pro_date" => date('Y-m-d H:i:s', strtotime($this->input->post('date')))
					);

					$this->promotion->insert($data);
					redirect("promotion/index");
				}
			}
		}
	}

	public function update($id)
	{
		date_default_timezone_set('Asia/Bangkok');
		$img = $this->input->post('img');
		$this->form_validation->set_rules('cate', 'หมวดหมู่โปรโมชั่น', 'required');
		$this->form_validation->set_rules('title', 'ชื่อโปรโมชั่น', 'required');
		$this->form_validation->set_rules('sub_des', 'รายละเอียดย่อย', 'required');
		$this->form_validation->set_rules('editor1', 'รายละเอียด', 'required');
		$this->form_validation->set_rules('date', 'เวลานับถอยหลัง', 'required');
		$this->form_validation->set_message('required', 'กรุณากรอก %s');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run() == FALSE){
			$data['getcate'] = $this->promotion->getall();
			$data['result'] = $this->promotion->getpromotion($id);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('dashboard/editpromotion', $data);
			$this->load->view('layout/footer');
			$this->load->view('layout/javascript');
		}else{
			if(isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])){
				if(unlink('uploads/promotion/'.$img)){
					$conf['upload_path'] = "./uploads/promotion/";
					$conf['allowed_types'] = 'gif|jpg|png';
					$conf['max_size'] = '2048000';
					$conf['max_width'] = '';
					$conf['max_height'] = '';
					$conf['overwrite'] = 'TRUE';
					$conf['remove_spaces'] = 'TRUE';
					$new_name = time().$_FILES["userfile"]['name'];
					$conf['file_name'] = $new_name;

					$this->load->library('upload', $conf);
					if(!$this->upload->do_upload()){

						$data['error'] = $this->upload->display_errors();
						$data['getcate'] = $this->promotion->getall();
						$data['result'] = $this->promotion->getpromotion($id);
						$this->load->view('layout/header');
						$this->load->view('layout/sidebar');
						$this->load->view('layout/navbar');
						$this->load->view('dashboard/promotion', $data);
						$this->load->view('layout/footer');
						$this->load->view('layout/javascript');

					}else{
						$img = array();
						$img = $this->upload->data();
						$data = array(
							"pro_img" => $_FILES['userfile']['name'],
							"pro_newimg" => $img['file_name'],
							"pro_imgpath" => $img['full_path'],
							"cate_id" => $this->input->post("cate"),
							"pro_title" => $this->input->post("title"),
							"pro_sub_des" => $this->input->post("sub_des"),
							"pro_des" => $this->input->post("editor1"),
							"pro_date" => date('Y-m-d H:i:s', strtotime($this->input->post('date')))
						);

						$this->promotion->update($id, $data);
						redirect("Promotion/index");
					}
				}
			}else{
				$data = array(
					"cate_id" => $this->input->post("cate"),
					"pro_title" => $this->input->post("title"),
					"pro_sub_des" => $this->input->post("sub_des"),
					"pro_des" => $this->input->post("editor1"),
					"pro_date" => date('Y-m-d H:i:s', strtotime($this->input->post('date')))
				);
				$this->promotion->updatetext($id, $data);
				redirect("Promotion/index");
			}
		}
	}

	public function delete()
	{
		$id = $this->input->post("id");
    $path = $this->input->post("path");
    $this->promotion->delete($id, $path);
    redirect('Promotion/index');
	}

}
