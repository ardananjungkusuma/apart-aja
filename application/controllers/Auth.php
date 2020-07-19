<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		// $this->load->model('admin_model'); TODO Implement this soon!
	}

	public function index()
	{
		redirect('auth/loginUser', 'refresh');
	}

	public function loginAdmin()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('home', 'refresh');
		} elseif ($this->session->userdata('level') == "pengelola") {
			redirect('pengelola', 'refresh');
		} elseif ($this->session->userdata('level') == "kepala" or $this->session->userdata('level') == "staff") {
			redirect('admin', 'refresh');
		}

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header-admin');
			$this->load->view('auth/admin/index');
		} else {
			$cekLogin = $this->auth_model->loginAdmin($this->input->post('username'), MD5($this->input->post('password')));
			if (!empty($cekLogin)) {
				foreach ($cekLogin as $row);
				$this->session->set_userdata('id_user', $row->id_user);
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('level', $row->level);
				$this->session->set_userdata('status', $row->status);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
				redirect('auth/loginAdmin');
			}
		}
	}

	public function loginUser()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('home', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$data['title'] = 'Login';
		$this->load->view('auth/user/header', $data);
		$this->load->view('auth/user/login');
	}

	public function loginPengelola()
	{
		if ($this->session->userdata('level') == "pengelola") {
			redirect('pengelola', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$data['title'] = 'Login';
		$this->load->view('auth/pengelola/header', $data);
		$this->load->view('auth/pengelola/login');
	}

	public function registerUser()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('home', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$data['title'] = 'Register User';
		$this->load->view('auth/user/header', $data);
		$this->load->view('auth/user/register');
	}

	public function registerPengelola()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('home', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$data['title'] = 'Register Pengelola';
		$this->load->view('auth/pengelola/header', $data);
		$this->load->view('auth/pengelola/register');
	}

	public function prosesLoginUser()
	{
		$username = htmlspecialchars($this->input->post('usernameOrEmail'));
		$password = htmlspecialchars(MD5($this->input->post('password')));

		$cekLogin = $this->auth_model->loginUser($username, $password);

		if ($cekLogin) {
			foreach ($cekLogin as $row);
			$this->session->set_userdata('id_user', $row->id_user);
			$this->session->set_userdata('username', $row->username);
			$this->session->set_userdata('status', $row->status_user);
			$this->session->set_userdata('level', $row->level);
			if ($this->session->userdata('level') == "admin") {
				redirect('admin');
				// TODO FITUR VERIFIKASI (FIX !=)
			} elseif ($this->session->userdata('level') != "user" and $this->session->userdata('status') == "Tidak Aktif") {
				$this->session->sess_destroy();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Sorry, your account isn"t activated. Please Contact Admin.
          </div>');
				$data['title'] = 'Login';
				$this->load->view('auth/header', $data);
				$this->load->view('auth/login');
			} elseif ($this->session->userdata('level') == "user") {

				redirect('home');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
			$data['title'] = 'Login';
			$this->load->view('auth/user/header', $data);
			$this->load->view('auth/user/login');
		}
	}

	public function prosesLoginPengelola()
	{
		$username = htmlspecialchars($this->input->post('usernameOrEmail'));
		$password = htmlspecialchars(MD5($this->input->post('password')));

		$cekLogin = $this->auth_model->loginPengelola($username, $password);

		if ($cekLogin) {
			foreach ($cekLogin as $row);
			$this->session->set_userdata('id_pengelola', $row->id_pengelola);
			$this->session->set_userdata('username', $row->username);
			$this->session->set_userdata('status', $row->status_pengelola);
			$this->session->set_userdata('level', "pengelola");
			if ($this->session->userdata('level') == "admin") {
				redirect('admin');
			} elseif ($this->session->userdata('level') != "pengelola" and $this->session->userdata('status') == "Tidak Aktif") {
				$this->session->sess_destroy();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Sorry, your account isn"t activated. Please Contact Admin.
          </div>');
				$data['title'] = 'Login';
				$this->load->view('auth/header', $data);
				$this->load->view('auth/login');
			} elseif ($this->session->userdata('level') == "pengelola") {
				redirect('pengelola');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
			$data['title'] = 'Login';
			$this->load->view('auth/pengelola/header', $data);
			$this->load->view('auth/pengelola/login');
		}
	}

	public function prosesRegisterUser()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email already taken'
		]);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
			'is_unique' => 'This username already taken'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
			'min_length' => 'Password minimum 6 character'
		]);


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Register User';
			$this->load->view('auth/user/header', $data);
			$this->load->view('auth/user/register');
		} else {
			$this->auth_model->registerUser();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations, your account has been created.
          </div>');
			redirect('auth');
		}
	}

	public function prosesRegisterPengelola()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pengelola_apartemen.email]', [
			'is_unique' => 'This email already taken'
		]);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[pengelola_apartemen.username]', [
			'is_unique' => 'This username already taken'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
			'min_length' => 'Password minimum 6 character'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Register Pengelola';
			$this->load->view('auth/pengelola/header', $data);
			$this->load->view('auth/pengelola/register');
		} else {
			$this->auth_model->registerPengelola();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations, your account has been created.
          </div>');
			redirect('auth/loginUser');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		if ($this->session->userdata('id_pengelola')) {
			redirect('auth/loginPengelola', 'refresh');
		} else if ($this->session->userdata('level') != "user") {
			redirect('auth/loginAdmin', 'refresh');
		} else {
			redirect('auth/loginUser', 'refresh');
		}
	}
}
