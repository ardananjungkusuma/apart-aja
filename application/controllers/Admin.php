<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('id_admin'))) {
            redirect('auth/loginAdmin');
        }
        $this->load->model('user_model');
    }

    public function index()
    {
        //load list tabel pengelola & user untuk verifikasi
        $data['user'] = $this->user_model->getAllUser();
        $this->load->view('templates/header-admin');
        $this->load->view('admin/data-user', $data);
        $this->load->view('templates/footer-admin');
    }
}
