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

	public function profile($menu)
	{
		$data['title'] = 'Apart Aja';
		if ($menu == "transaksi") {
		} elseif ($menu == "apartemen") {
		} else {
			$this->load->view('templates/header-user', $data);
		}
	}
}
