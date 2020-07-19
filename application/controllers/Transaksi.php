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
        $this->load->model('rekening_model');
    }

    //Fitur User
    public function preview($id_ruangan)
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        } else if ($this->session->userdata('status') != "Terverifikasi") {
            redirect('user/profile');
        } else {
            $data['previewapart'] = $this->ruangan_model->getDetailRuangan($id_ruangan);
            $this->load->view('templates/header-user', $data);
            $this->load->view('transaksi/preview', $data);
            $this->load->view('templates/footer');
        }
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
        $this->form_validation->set_rules('id_pengelola', 'id_pengelola', 'trim|required');
        $this->form_validation->set_rules('priceCode', 'priceCode', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('home');
        } else {
            $this->transaksi_model->tambahTransaksi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Apartemen berhasil dibooking, silahkan bayar sebelum batas waktu
          </div>');
            redirect('transaksi/transaksiAnda');
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

    public function detailTransaksiAnda()
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $data['transaksi'] = $this->transaksi_model->getDetailTransaksiById($this->input->post('id_transaksi'));
        $data['rekening'] = $this->rekening_model->getRekeningByIdPengelola($this->input->post('id_pengelola'));
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-menu');
        $this->load->view('user/detail-transaksi-anda', $data);
        $this->load->view('templates/footer');
    }

    public function uploadBuktiTransfer($id)
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $data['transaksi'] = $this->transaksi_model->getDetailTransaksiById($id);
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-menu');
        $this->load->view('user/upload-bukti-bayar', $data);
        $this->load->view('templates/footer');
    }

    public function prosesUploadBuktiTransfer()
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('transaksi/transaksiAnda');
        } else {
            $data = $this->transaksi_model->tambahBuktiTransfer();
            if ($data == "True") {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Bukti Transfer Sukses Terupload, silahkan tunggu konfirmasi dari pihak pengelola apartemen.
                </div>');
            }
            redirect('transaksi/transaksiAnda');
        }
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

    public function detailTransaksiBeliApart($id)
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $data['transaksi'] =  $this->transaksi_model->getDetailTransaksiById($id);
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/detail-transaksi-apart', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function editTransaksiBeliApart($id)
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $data['transaksi'] =  $this->transaksi_model->getDetailTransaksiById($id);
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/edit-transaksi-apart', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function prosesEditTransaksiBeliApart()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $this->form_validation->set_rules('id_transaksi_pembelian', 'id_transaksi_pembelian', 'trim|required');
        $this->form_validation->set_rules('status_pemesanan', 'status_pemesanan', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('pengelola');
        } else {
            $this->transaksi_model->verifikasiTransferBeliApart();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data telah diverifikasi.
          </div>');
            redirect('transaksi/transaksiPembelianUser');
        }
    }
}
