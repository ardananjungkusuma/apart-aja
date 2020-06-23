<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ruangan_model');
		$this->load->model('apartemen_model');
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

	public function tambahRuangan()
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$data['apartemenList'] =  $this->apartemen_model->getApartemenByIdPengelola($this->session->userdata('id_pengelola'));
		$this->load->view('templates/header-pengelola');
		$this->load->view('pengelola/tambah-ruangan', $data);
		$this->load->view('templates/footer-pengelola');
	}

	public function prosesTambahRuangan()
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola');
		}
		$this->form_validation->set_rules('id_apartemen', 'id_apartemen', 'trim|required');
		$this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'trim|required');
		$this->form_validation->set_rules('jenis_ruangan', 'jenis_ruangan', 'trim|required');
		$this->form_validation->set_rules('harga_beli', 'harga_beli', 'trim|required');
		$this->form_validation->set_rules('sisa_ruang_apartemen', 'sisa_ruang_apartemen', 'trim|required');
		$this->form_validation->set_rules('detail_ruangan', 'detail_ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			redirect('ruangan/listRuangan');
		} else {
			$this->ruangan_model->tambahRuangan();
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('ruangan/listRuangan');
		}
	}
}
