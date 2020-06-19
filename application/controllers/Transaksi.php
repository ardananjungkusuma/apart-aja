<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ruangan_model');
        $this->load->model('pengelola_model');
        $this->load->model('user_model');
        $this->load->model('transaksi_model');
    }

    //Fitur User
    public function preview($id_ruangan)
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $data['previewapart'] = $this->ruangan_model->getDetailRuangan($id_ruangan);
        $this->load->view('templates/header-user', $data);
        $this->load->view('transaksi/preview', $data);
        $this->load->view('templates/footer');
    }

    public function checkout()
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim|required');
        $this->form_validation->set_rules('id_pengelola', 'id_pengelola', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('home');
        } else {
            $data['randomNum'] = rand(1000, 9999);
            $data['detailPembayaran'] = $this->ruangan_model->getDetailRuangan($this->input->post('id_ruangan'));
            $data['rekening'] = $this->pengelola_model->getRekeningById($this->input->post('id_pengelola'));
            $this->load->view('templates/header-user');
            $this->load->view('transaksi/checkout', $data);
            $this->load->view('templates/footer');
        }
    }

    public function checkoutProses()
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim|required');
        $this->form_validation->set_rules('randomNum', 'randomNum', 'trim|required');
        $this->form_validation->set_rules('priceCode', 'priceCode', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('home');
        } else {
            $this->transaksi_model->tambahTransaksi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Apartemen berhasil dibooking, silahkan bayar sebelum batas waktu
          </div>');
            redirect('user/transaksiAnda');
        }
    }

    public function transaksiAnda()
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $data['transaksi'] = $this->user_model->getTransaksiById($this->session->userdata('id_user'));
        $this->load->view('templates/header-user', $data);
        $this->load->view('templates/sidebar-menu');
        $this->load->view('user/transaksi-anda', $data);
        $this->load->view('templates/footer');
    }

    public function detailTransaksiAnda($id)
    {
        # code...
    }

    // FITUR Pengelola
    public function transaksiPembelianUser()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $data['pembelian'] =  $this->transaksi_model->getTransaksiBeliApartemen($this->session->userdata('id_pengelola'));
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/index', $data);
        $this->load->view('templates/footer-pengelola');
    }
}
