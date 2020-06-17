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
        $this->load->model('pengelola_model');
    }

    public function preview($id_ruangan)
    {
        $data['previewapart'] = $this->ruangan_model->getDetailRuangan($id_ruangan);
        $this->load->view('templates/header-user', $data);
        $this->load->view('transaksi/preview', $data);
        $this->load->view('templates/footer');
    }

    public function checkout()
    {
        $this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim|required');
        $this->form_validation->set_rules('id_pengelola', 'id_pengelola', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header-user');
            $this->load->view('ruangan/index');
            $this->load->view('templates/footer');
        } else {
            $data['randomNum'] = rand(1000, 9999);
            $data['detailPembayaran'] = $this->ruangan_model->getDetailRuangan($this->input->post('id_ruangan'));
            $data['rekening'] = $this->pengelola_model->getRekeningById($this->input->post('id_pengelola'));
            $this->load->view('templates/header-user');
            $this->load->view('transaksi/checkout', $data);
            $this->load->view('templates/footer');
        }
    }
}
