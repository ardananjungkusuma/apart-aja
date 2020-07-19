<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ruangan_model');
		$this->load->model('apartemen_model');
		$this->load->model('gambarruangan_model');
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
		if ($this->session->userdata('status') != "Terverifikasi") {
			redirect('pengelola/profile');
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
			$data = $this->ruangan_model->tambahRuangan();
			if ($data == "True") {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Ruangan Berhasil Ditambahkan
			  	</div>');
			}
			redirect('ruangan/listRuangan');
		}
	}

	public function detailRuanganAnda($id)
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$data['ruanganApartemen'] =  $this->ruangan_model->getDetailRuangan($id);
		$data['gambarRuangan'] =  $this->gambarruangan_model->getGambarByRuangan($id);
		$this->load->view('templates/header-pengelola');
		$this->load->view('pengelola/detail-ruangan', $data);
		$this->load->view('templates/footer-pengelola');
	}

	public function hapusRuanganAnda($id)
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$this->ruangan_model->hapusRuangan($id);
		redirect('ruangan/listRuangan');
	}

	public function tambahGambarRuangan($id)
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$data['ruanganApartemen'] =  $this->ruangan_model->getDetailRuangan($id);
		$this->load->view('templates/header-pengelola');
		$this->load->view('pengelola/tambah-gambar-interior', $data);
		$this->load->view('templates/footer-pengelola');
	}

	public function prosesTambahGambarRuangan()
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola');
		}
		$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			redirect('ruangan/listRuangan');
		} else {
			$data = $this->gambarruangan_model->tambahGambarRuangan();
			if ($data == "True") {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Gambar Berhasil Ditambah
				</div>');
			}
			redirect('ruangan/galeriGambarRuangan/' . $this->input->post('id_ruangan'));
		}
	}

	public function editRuangan($id)
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$data['ruanganApartemen'] =  $this->ruangan_model->getDetailRuangan($id);
		$this->load->view('templates/header-pengelola');
		$this->load->view('pengelola/edit-ruangan', $data);
		$this->load->view('templates/footer-pengelola');
	}

	public function prosesEditRuangan()
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola');
		}
		$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim|required');
		$this->form_validation->set_rules('nama_ruangan', 'nama_ruangan', 'trim|required');
		$this->form_validation->set_rules('jenis_ruangan', 'jenis_ruangan', 'trim|required');
		$this->form_validation->set_rules('harga_beli', 'harga_beli', 'trim|required');
		$this->form_validation->set_rules('sisa_ruang_apartemen', 'sisa_ruang_apartemen', 'trim|required');
		$this->form_validation->set_rules('detail_ruangan', 'detail_ruangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			redirect('ruangan/listRuangan');
		} else {
			$data = $this->ruangan_model->editRuangan();
			if ($data == "True") {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Ruangan Berhasil Diedit
			  	</div>');
			}
			redirect('ruangan/listRuangan');
		}
	}

	public function galeriGambarRuangan($id)
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$data['ruanganApartemen'] =  $this->ruangan_model->getDetailRuangan($id);
		$data['gambarInterior'] =  $this->gambarruangan_model->getGambarByRuangan($id);
		$this->load->view('templates/header-pengelola');
		$this->load->view('pengelola/gambar-interior', $data);
		$this->load->view('templates/footer-pengelola');
	}

	public function hapusGambarRuangan($id)
	{
		if ($this->session->userdata('level') != "pengelola") {
			redirect('auth/loginPengelola', 'refresh');
		}
		$this->gambarruangan_model->hapusGambarRuangan($id);
		redirect('ruangan/listRuangan');
	}
}
