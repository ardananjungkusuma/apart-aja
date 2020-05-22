<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('user', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$data['title'] = 'Login Page';
		$this->load->view('auth/header', $data);
		$this->load->view('auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('user', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$data['title'] = 'Login Page';
		$this->load->view('auth/header', $data);
		$this->load->view('auth/login');
	}

	public function register()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('user', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$data['title'] = 'User Register';
		$this->load->view('auth/header', $data);
		$this->load->view('auth/register');
	}

	public function prosesLogin()
	{
		if ($this->session->userdata('level') == "user") {
			redirect('user', 'refresh');
		} elseif ($this->session->userdata('level') == "admin") {
			redirect('admin', 'refresh');
		}
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars(MD5($this->input->post('password')));

		$cekLogin = $this->auth_model->login($username, $password);

		if ($cekLogin) {
			foreach ($cekLogin as $row);
			$this->session->set_userdata('id_user', $row->id_user);
			$this->session->set_userdata('username', $row->username);
			$this->session->set_userdata('level', $row->level);
			$this->session->set_userdata('status', $row->status);
			if ($this->session->userdata('level') == "admin") {
				redirect('admin');
			} elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
				$this->session->sess_destroy();
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Sorry, your account isn"t activated. Please Contact Admin.
          </div>');
				$data['title'] = 'Login Page';
				$this->load->view('auth/header', $data);
				$this->load->view('auth/login');
			} elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Aktif") {
				redirect('user/index');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong Username or Password!
          </div>');
			$data['title'] = 'Login Page';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login');
		}
	}

	public function prosesRegister()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email already taken'
		]);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
			'is_unique' => 'This username already taken'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[passwordConf]', [
			'matches' => 'Password Doesnt Match',
			'min_length' => 'Password minimum 6 character'
		]);
		$this->form_validation->set_rules('passwordConf', 'Password', 'required|trim|min_length[6]|matches[password]');


		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'User Register';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/register');
		} else {
			$this->auth_model->register();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations, your account has been created.
          </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth', 'refresh');
	}
}
