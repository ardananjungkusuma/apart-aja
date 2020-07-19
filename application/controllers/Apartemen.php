<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apartemen extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('apartemen_model');
        $this->load->model('user_model');
        $this->load->model('ruangan_model');
    }

    public function detailApartemen($id)
    {
        $data['apart'] = $this->apartemen_model->getAllApartemenById($id);
        $data['ruanganapart'] = $this->ruangan_model->getAllRuanganByIdApartemen($id);
        $level = $this->session->userdata('level');
        if ($level == 'user' or $level == 'admin') {
            $this->load->view('templates/header-user', $data);
        } else {
            $this->load->view('templates/header-guest', $data);
        }
        $this->load->view('apartemen/detail', $data);
        $this->load->view('templates/footer');
    }

    //Fitur User
    public function apartemenAnda()
    {
        $data['apartemen'] =  $this->user_model->getApartemenById($this->session->userdata('id_user'));
        $this->load->view('templates/header-user', $data);
        $this->load->view('templates/sidebar-menu');
        $this->load->view('user/apartemen-anda', $data);
        $this->load->view('templates/footer');
    }

    // Fitur Pengelola
    public function detailApartemenAnda($id)
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola');
        }
        $data['apartemendetail'] = $this->apartemen_model->getAllApartemenPengelolaById($id);
        $data['ruanganapartemen'] = $this->ruangan_model->getAllRuanganByIdApartemen($id);
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/detail-apartemen', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function editApartemenAnda($id)
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola');
        }
        $data['apartemenDetail'] = $this->apartemen_model->getAllApartemenPengelolaById($id);
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/edit-apartemen', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function prosesEditApartemenAnda()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola');
        }
        $this->form_validation->set_rules('nama_apartemen', 'nama_apartemen', 'trim|required');
        $this->form_validation->set_rules('alamat_apartemen', 'alamat_apartemen', 'trim|required');
        $this->form_validation->set_rules('kota_kabupaten', 'kota_kabupaten', 'trim|required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header-pengelola');
            $this->load->view('pengelola/list-apartemen');
            $this->load->view('templates/footer-pengelola');
        } else {
            $data = $this->apartemen_model->editApartemen();
            if ($data == "True") {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Apartemen Berhasil Diedit
          </div>');
            }
            redirect('apartemen/listApartemen');
        }
    }

    public function hapusApartemenAnda($id)
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola');
        }
        $this->apartemen_model->hapusApartemen($id);
        redirect('apartemen/listApartemen');
    }

    public function listApartemen()
    {
        if ($this->session->userdata('level') != "pengelola") {
            redirect('auth/loginPengelola');
        }
        $data['apartemen'] =  $this->apartemen_model->getApartemenByIdPengelola($this->session->userdata('id_pengelola'));
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/list-apartemen', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function tambahApartemen()
    {
        if ($this->session->userdata('status') != "Terverifikasi") {
            redirect('pengelola/profile');
        } else {
            $this->form_validation->set_rules('nama_apartemen', 'nama_apartemen', 'trim|required');
            $this->form_validation->set_rules('alamat_apartemen', 'alamat_apartemen', 'trim|required');
            $this->form_validation->set_rules('kota_kabupaten', 'kota_kabupaten', 'trim|required');
            $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                if ($this->session->userdata('level') != "pengelola") {
                    redirect('auth/loginPengelola');
                }
                $this->load->view('templates/header-pengelola');
                $this->load->view('pengelola/tambah-apartemen');
                $this->load->view('templates/footer-pengelola');
            } else {
                $data = $this->apartemen_model->tambahApartemen();
                if ($data == "True") {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Apartemen
                </div>');
                }
                redirect('apartemen/listApartemen');
            }
        }
    }
}
