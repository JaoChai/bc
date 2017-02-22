<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'home');
	}

	public function index()
	{
		$data['title'] = 'Login Admin';
    //$data['result'] = $this->month->getall($id);
    $this->load->view('layout/header', $data);
		$this->load->view('login');
		$this->load->view('layout/footer');
		$this->load->view('layout/javascript');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if($this->form_validation->run() == FALSE){
			if(isset($this->session->userdata['logged_in'])){
				redirect('silder/index');
			}else{
				$this->session->set_flashdata('error_mess', '<p class="text-danger"> Username or Password is Required. </p>');
				redirect('dashboard/index');
			}
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->home->login($username, $password);
			//login Successfully
			if($result == TRUE){
				$username = $this->input->post('username');
				$result = $this->home->get_data($username);
				if($result != FALSE){
					$session_data = array(
						'id' => $result[0]->admin_id,
						'username' => $result[0]->admin_username
					);
					//Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					redirect('silder/index');
				}
			}else{
				$this->session->set_flashdata('error_mess',  'Invalid login credentials.');
				redirect('dashboard/index');
			}
		}
	}

	public function logout()
{
	//Removing session data
	$sess_array = array(
		'id' => '',
		'username' => ''
	);
	$this->session->set_flashdata('error_mess', "Logout Successfully");
	$this->session->unset_userdata('logged_in', $sess_array);
	redirect('dashboard/index');
}
}
