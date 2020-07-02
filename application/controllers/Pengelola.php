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
        $this->load->model('pengelola_model');
    }

    public function index()
    {
        redirect('transaksi/transaksiPembelianUser');
    }

    public function profil()
    {
        $data['profile'] = $this->pengelola_model->getDataById($this->session->userdata('id_pengelola'));
        $data['rekening'] = $this->pengelola_model->getRekeningById($this->session->userdata('id_pengelola'));
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/profil', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function rekening()
    {
        $data['rekening'] = $this->pengelola_model->getRekeningById($this->session->userdata('id_pengelola'));
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/rekening', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function tambahRekening()
    {
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'trim|required');
        $this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'trim|required');
        $this->form_validation->set_rules('no_rek', 'no_rek', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header-pengelola');
            $this->load->view('pengelola/tambah-rekening');
            $this->load->view('templates/footer-pengelola');
        } else {
            $this->pengelola_model->tambahRekening();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Rekening Telah Ditambahkan
          </div>');
            redirect('pengelola/rekening');
        }
    }

    public function hapusRekening($id)
    {
        $this->pengelola_model->hapusRekening($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Rekening Telah Dihapus
          </div>');
        redirect('pengelola/rekening');
    }
}
