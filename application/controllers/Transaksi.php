<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $this->load->model('ruangan_model');
    }

    public function preview($id_apart)
    {
        //TODO LANJUTKAN PREVIEW
    }
}
