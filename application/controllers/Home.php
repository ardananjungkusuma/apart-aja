<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Apart Aja';
		$level = $this->session->userdata('level');
		if ($level == '1') {
			$this->load->view('templates/header-user', $data);
		} else if ($level == '2') {
			redirect('admin');
		} else {
			$this->load->view('templates/header-guest', $data);
		}
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}
}
