<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Apart Aja';
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');
	}
}
