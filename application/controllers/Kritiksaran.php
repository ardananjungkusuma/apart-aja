<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kritiksaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kritiksaran_model');
        $this->load->model('penghuni_model');
    }

    //Fitur User

    public function kritikSaranAnda()
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $data['kritiksaran'] = $this->kritiksaran_model->getKritikSaranByIdUser($this->session->userdata('id_user'));
        $data['userCheck'] = $this->penghuni_model->getPemilikByIdUser($this->session->userdata('id_user'));
        $this->load->view('templates/header-user', $data);
        $this->load->view('templates/sidebar-menu');
        $this->load->view('user/kritiksaran-anda', $data);
        $this->load->view('templates/footer');
    }

    public function kirimKritikSaran()
    {
        if ($this->session->userdata('level') != "user") {
            redirect('auth/loginUser', 'refresh');
        }
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('id_apartemen', 'id_apartemen', 'required');
        $this->form_validation->set_rules('isi_kritik_saran', 'isi_kritik_saran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['apartemen'] = $this->penghuni_model->getPemilikByIdUser($this->session->userdata('id_user'));
            $this->load->view('templates/header-user', $data);
            $this->load->view('templates/sidebar-menu');
            $this->load->view('user/kirim-kritiksaran', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kritiksaran_model->tambahKritikSaran();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Terimakasih Telah Mengirim Kritik & Saran, Anda Akan Mendapat Tanggapan Secepatnya.
          </div>');
            redirect('kritiksaran/kritikSaranAnda');
        }
    }

    //Fitur Pengelola
    public function listKritikSaran()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $data['kritiksaran'] = $this->kritiksaran_model->getKritikSaranByIdPengelola($this->session->userdata('id_pengelola'));
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/kritik-saran', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function kirimResponKritikSaran($id)
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $data['kritiksaran'] = $this->kritiksaran_model->getKritikSaranById($id);
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/respon-kritik-saran', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function prosesKirimResponKritikSaran()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola', 'refresh');
        }
        $this->form_validation->set_rules('id_kritik_saran', 'id_kritik_saran', 'trim|required');
        $this->form_validation->set_rules('respon_pengelola', 'respon_pengelola', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('kritiksaran/listKritikSaran');
        } else {
            $this->kritiksaran_model->responKritikSaran();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Respon Telah Dikirim ke Penghuni Apartemen.
          </div>');
            redirect('kritiksaran/listKritikSaran');
        }
    }
}
