<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengelola extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
    }

    public function index()
    {
        //TODO Lanjutkan crud ruangan.
        redirect('transaksi/transaksiPembelianUser');
    }
}
