<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghuniapart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $this->load->model('penghuni_model');
        $this->load->model('transaksi_model');
        $this->load->model('ruangan_model');
    }

    public function index()
    {
        redirect('transaksi/transaksiPembelianUser');
    }

    public function listPenghuni()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $data['penghuni'] =  $this->penghuni_model->getDaftarPenghuni();
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/daftar-penghuni', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function tambahPenghuni()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola');
        }
        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
        $this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim|required');
        $this->form_validation->set_rules('nama_nomer_ruangan', 'nama_nomer_ruangan', 'trim|required');
        $this->form_validation->set_rules('lantai', 'lantai', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['penghuni'] =  $this->transaksi_model->getPembeli();
            $data['ruangan'] =  $this->ruangan_model->getAllRuanganByIdPengelola($this->session->userdata('id_pengelola'));
            $this->load->view('templates/header-pengelola');
            $this->load->view('pengelola/tambah-penghuni', $data);
            $this->load->view('templates/footer-pengelola');
        } else {
            $this->penghuni_model->tambahPenghuni();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Penghuni Berhasil Ditambahkan
          </div>');
            redirect('penghuniapart/listPenghuni');
        }
    }
}
