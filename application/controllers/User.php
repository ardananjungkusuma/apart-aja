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

	public function editProfile()
	{
		if ($this->session->userdata('status') == "Belum Terverifikasi" or $this->session->userdata('status') == "Belum Terverifikasi") {
			$this->form_validation->set_rules('nama', 'nama', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		}
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]', [
			'is_unique' => 'This Email already taken'
		]);
		$this->form_validation->set_rules('no_telpon', 'no_telpon', 'trim|required|numeric|is_unique[user.no_telpon]', [
			'is_unique' => 'This Phone Number already taken'
		]);
		if ($this->form_validation->run() == FALSE) {
			$data['profile'] = $this->user_model->getUserById($this->session->userdata('id_user'));
			$this->load->view('templates/header-user', $data);
			$this->load->view('templates/sidebar-menu');
			$this->load->view('user/edit-profile', $data);
			$this->load->view('templates/footer');
		} else {
			$this->user_model->editProfile($this->session->userdata('id_user'));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            	Profile Telah Berhasil Diubah.
		  	</div>');
			redirect('user/profile');
		}
	}

	public function verifikasi()
	{
		if ($this->session->userdata('status') == "Terverifikasi") {
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

	public function changePassword()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[passwordConf]', [
			'matches' => 'Password Doesn"t match!',
			'min_length' => 'Password minimum 6 character'
		]);
		$this->form_validation->set_rules('passwordConf', 'passwordConf', 'required|trim|min_length[6]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header-user');
			$this->load->view('templates/sidebar-menu');
			$this->load->view('user/change-password');
			$this->load->view('templates/footer');
		} else {
			$this->user_model->changePassword();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            	Password Berhasil Diganti
		  	</div>');
			redirect('user/profile');
		}
	}
}
