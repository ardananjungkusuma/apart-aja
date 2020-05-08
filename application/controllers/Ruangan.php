<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ruangan_model');
	}

	public function index()
	{
		$kategori = $this->input->post("kategori");
		if (!empty($kategori)) {
			$data['ruangan'] = $this->ruangan_model->getAllRuanganByKategori($kategori);
		} elseif (isset($_POST["cari"])) {
			$keyword = $this->input->post("keyword");
			$data['ruangan'] = $this->ruangan_model->getAllRuanganByNamaOrKota($keyword);
		} else {
			$data['ruangan'] = $this->ruangan_model->getAllRuangan();
		}
		$data['title'] = 'Apart Aja';
		$level = $this->session->userdata('level');
		if ($level == '1') {
			$this->load->view('templates/header-user', $data);
		} else {
			$this->load->view('templates/header-guest', $data);
		}
		$this->load->view('ruangan/index', $data);
		$this->load->view('templates/footer');
	}
}
