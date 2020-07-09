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

	public function verifikasi()
	{
		$cekData = $this->user_model->getUserById($this->session->userdata('id_user'));
		foreach ($cekData as $cd) {
			$status = $cd['status_user'];
		}
		if ($status == "Berhasil Verifikasi") {
			redirect('user/profile');
		} else {
			$this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('templates/header-user');
				$this->load->view('templates/sidebar-menu');
				$this->load->view('user/verifikasi-identitas');
				$this->load->view('templates/footer');
			} else {
				$data = $this->user_model->verifikasiIdentitas($this->session->userdata('id_user'));
				if ($data == "True") {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            			Berhasil upload data identitas, silahkan menunggu proses verifikasi.
		  			</div>');
					redirect('user/profile');
				} else {
					redirect('user/verifikasi');
				}
			}
		}
	}
}
