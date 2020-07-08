<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == "user") {
            redirect('auth/loginAdmin');
        }
        $this->load->model('user_model');
        $this->load->model('pengelola_model');
    }

    public function index()
    {
        //load list tabel pengelola & user untuk verifikasi
        $data['user'] = $this->user_model->getAllUser();
        $this->load->view('templates/header-admin');
        $this->load->view('admin/data-user', $data);
        $this->load->view('templates/footer-admin');
    }

    public function dataPengelola()
    {
        $data['pengelola'] = $this->pengelola_model->getAllPengelola();
        $this->load->view('templates/header-admin');
        $this->load->view('admin/data-pengelola', $data);
        $this->load->view('templates/footer-admin');
    }
}
