<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('auth/loginAdmin');
        }
    }

    public function index()
    {
        //load list tabel pengelola & user untuk verifikasi
        $this->load->view('admin/header');
        $this->load->view('admin/index');
    }
}
