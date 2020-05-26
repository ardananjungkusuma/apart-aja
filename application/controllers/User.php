<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == "user") {
			redirect('home', 'refresh');
		} else {
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
		# code...
	}
}
