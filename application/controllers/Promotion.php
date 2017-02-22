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
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('dashboard/promotion');
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function createpromotion(){
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('dashboard/createpromotion');
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
				'cate_name' => $this->input->post('cate')
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
				'cate_name' => $this->input->post('cate')
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

}
