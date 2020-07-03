<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != "user") {
			redirect('auth/loginUser', 'refresh');
		}
		$this->load->model('user_model');
	}

	public function index()
	{
		redirect('user/profile');
	}

	public function profile()
	{
		$data['profile'] = $this->user_model->getUserById($this->session->userdata('id_user'));
		$this->load->view('templates/header-user', $data);
		$this->load->view('templates/sidebar-menu');
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
	}

	public function kritikSaranAnda()
	{
		$data['kritiksaran'] = $this->user_model->getKritikSaranById($this->session->userdata('id_user'));
		$this->load->view('templates/header-user', $data);
		$this->load->view('templates/sidebar-menu');
		$this->load->view('user/kritiksaran-anda', $data);
		$this->load->view('templates/footer');
	}
}
