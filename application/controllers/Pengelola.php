<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $this->load->model('user_model');
    }

    public function index()
    {
        //TODO Lanjutkan sampe sini urus daftar transaksi pembelian
        $data['pembelian'] =  $this->user_model->getApartemenById($this->session->userdata('id_user'));
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/index', $data);
        $this->load->view('templates/footer-pengelola');
    }
}
