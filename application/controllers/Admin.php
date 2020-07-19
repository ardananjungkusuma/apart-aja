<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == "user") {
            redirect('auth/loginAdmin');
        }
        $this->load->model('user_model');
        $this->load->model('pengelola_model');
        $this->load->model('admin_model');
    }

    public function index()
    {
        //load list tabel pengelola & user untuk verifikasi
        $data['user'] = $this->user_model->getAllUser();
        $this->load->view('templates/header-admin');
        $this->load->view('admin/data-user', $data);
        $this->load->view('templates/footer-admin');
    }

    public function dataPengelola()
    {
        $data['pengelola'] = $this->pengelola_model->getAllPengelola();
        $this->load->view('templates/header-admin');
        $this->load->view('admin/data-pengelola', $data);
        $this->load->view('templates/footer-admin');
    }

    public function verifikasiUser($id)
    {
        $check = $this->user_model->getUserById($id);
        $loginLevel = $this->session->userdata('level');
        foreach ($check as $c) {
            $status = $c['status_user'];
            $level = $c['level'];
        }
        if ($status == "Terverifikasi" or $status == "Verifikasi Ditolak") {
            redirect('admin');
        } else if ($level != "user" && $loginLevel != "kepala") {
            redirect('admin');
        } else {
            $data['usr'] = $this->user_model->getUserById($id);
            $this->load->view('templates/header-admin');
            $this->load->view('admin/verifikasi-user', $data);
            $this->load->view('templates/footer-admin');
        }
    }

    public function tambahStaff()
    {
        if ($this->session->userdata('level') != "hrd" && $this->session->userdata('level') != "kepala") {
            redirect('admin');
        } else {
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('no_telpon', 'no_telpon', 'trim|required|is_unique[user.no_telpon]');
            $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
            $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[user.username]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[user.email]');
            $this->form_validation->set_rules('level', 'level', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header-admin');
                $this->load->view('admin/tambah-staff');
                $this->load->view('templates/footer-admin');
            } else {
                $this->admin_model->tambahKaryawan();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Tambah Karyawan Berhasil
                </div>');
                redirect('admin');
            }
        }
    }

    public function prosesVerifikasiUser()
    {
        $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
        $this->form_validation->set_rules('status_user', 'status_user', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin');
        } else {
            $this->admin_model->verifikasiUser($this->input->post('id_user'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Proses Verifikasi Berhasil.
          </div>');
            redirect('admin');
        }
    }

    public function verifikasiPengelola($id)
    {
        $check = $this->pengelola_model->getDataById($id);
        $loginLevel = $this->session->userdata('level');
        foreach ($check as $c) {
            $status = $c['status_pengelola'];
        }
        if ($status == "Terverifikasi" or $status == "Verifikasi Ditolak") {
            redirect('admin');
        } else {
            $data['pengelola'] = $this->pengelola_model->getDataById($id);
            $this->load->view('templates/header-admin');
            $this->load->view('admin/verifikasi-pengelola', $data);
            $this->load->view('templates/footer-admin');
        }
    }

    public function prosesVerifikasiPengelola()
    {
        $this->form_validation->set_rules('id_pengelola', 'id_pengelola', 'trim|required');
        $this->form_validation->set_rules('status_pengelola', 'status_pengelola', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/dataPengelola');
        } else {
            $this->admin_model->verifikasiPengelola($this->input->post('id_pengelola'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Proses Verifikasi Berhasil.
          </div>');
            redirect('admin/dataPengelola');
        }
    }
}
