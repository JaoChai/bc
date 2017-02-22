<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slide_model', 'slide');
	}

	public function index()
	{
		$data['result'] = $this->slide->getall();
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('dashboard/silder', $data);
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function insert()
	{
		$config['upload_path'] =  "./uploads/slide/";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048000';
		$config['max_width'] = '';
		$config['max_height'] = '';
		$config['overwrite'] = 'TRUE';
		$config['remove_spaces'] = 'TRUE';
		$config['encrypt_name'] = 'TRUE';
		$new_name = time().$_FILES["userfile"]['name'];
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config);

		if($this->upload->do_upload())
		{
			$img = $_FILES['userfile']['name'];
			$url = $this->input->post('url');
			$this->slide->insert($this->upload->data(), $img, $url);
			redirect('Silder/index');
		}else
		{
			$error = array('error' => $this->upload->display_errors());
			$data['result'] = $this->slide->getall();
			$this->load->vars($data);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('dashboard/silder', $error);
			$this->load->view('layout/footer');
			$this->load->view('layout/javascript');
		}
	}

	public function delete()
	{
		$id = $this->input->post("id");
		$path = $this->input->post("path");
		$this->slide->delete($id, $path);
		redirect('Silder/index');
	}

}
