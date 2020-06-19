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
		if ($level == 'user' or $level == 'admin') {
			$this->load->view('templates/header-user', $data);
		} else {
			$this->load->view('templates/header-guest', $data);
		}
		$this->load->view('ruangan/index', $data);
		$this->load->view('templates/footer');
	}

	public function detailRuangan($id)
	{
		$data['title'] = 'Apart Aja';
		$data['ruangan'] = $this->ruangan_model->getDetailRuangan($id);
		$data['gambar'] = $this->ruangan_model->getDetailGambarRuangan($id);
		$level = $this->session->userdata('level');
		if ($level == 'user' or $level == 'admin') {
			$this->load->view('templates/header-user', $data);
		} else {
			$this->load->view('templates/header-guest', $data);
		}
		$this->load->view('ruangan/detail', $data);
		$this->load->view('templates/footer');
	}

	//Fitur Pengelola
	public function listRuangan()
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$data['ruanganApartemen'] =  $this->ruangan_model->getRuanganByIdPengelola($this->session->userdata('id_pengelola'));
		$this->load->view('templates/header-pengelola');
		$this->load->view('pengelola/list-ruangan', $data);
		$this->load->view('templates/footer-pengelola');
	}
}
