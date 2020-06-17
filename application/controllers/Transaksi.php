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
        $data['previewapart'] = $this->ruangan_model->getDetailRuangan($id_apart);
        $this->load->view('templates/header-user', $data);
        $this->load->view('transaksi/preview', $data);
        $this->load->view('templates/footer');
    }
}
