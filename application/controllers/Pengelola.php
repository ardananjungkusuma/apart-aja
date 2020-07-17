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

    public function profile()
    {
        $data['profile'] = $this->pengelola_model->getDataById($this->session->userdata('id_pengelola'));
        $data['rekening'] = $this->pengelola_model->getRekeningById($this->session->userdata('id_pengelola'));
        $this->load->view('templates/header-pengelola');
        $this->load->view('pengelola/profile', $data);
        $this->load->view('templates/footer-pengelola');
    }

    public function editProfile()
    {
        if ($this->session->userdata('status') == "Belum Terverifikasi" or $this->session->userdata('status') == "Belum Terverifikasi") {
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
        }
        $this->form_validation->set_rules('no_telpon', 'no_telpon', 'trim|required|numeric|is_unique[pengelola_apartemen.no_telpon]', [
            'is_unique' => 'This Phone Number already taken'
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[pengelola_apartemen.email]', [
            'is_unique' => 'This Email already taken'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['profile'] = $this->pengelola_model->getDataById($this->session->userdata('id_pengelola'));
            $this->load->view('templates/header-pengelola');
            $this->load->view('pengelola/edit-profile', $data);
            $this->load->view('templates/footer-pengelola');
        } else {
            $data = $this->pengelola_model->editProfile($this->session->userdata('id_pengelola'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil Telah Berhasil Diubah.
          </div>');
            redirect('pengelola/profile');
        }
    }

    public function verifikasi()
    {
        $cekData = $this->pengelola_model->getDataById($this->session->userdata('id_pengelola'));
        foreach ($cekData as $cd) {
            $status = $cd['status_pengelola'];
        }
        if ($status == "Terverifikasi") {
            redirect('pengelola/profile');
        } else {
            $this->form_validation->set_rules('id_pengelola', 'id_pengelola', 'trim|required|numeric');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header-pengelola');
                $this->load->view('pengelola/verifikasi-identitas');
                $this->load->view('templates/footer-pengelola');
            } else {
                $data = $this->pengelola_model->verifikasiIdentitas($this->session->userdata('id_pengelola'));
                if ($data == "True") {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            			Berhasil upload data identitas, silahkan menunggu proses verifikasi 1-2 Hari Kerja.
		  			</div>');
                    redirect('pengelola/profile');
                } else {
                    redirect('pengelola/verifikasi');
                }
            }
        }
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

    public function changePassword()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[passwordConf]', [
            'matches' => 'Password Doesn"t match!',
            'min_length' => 'Password minimum 6 character'
        ]);
        $this->form_validation->set_rules('passwordConf', 'passwordConf', 'required|trim|min_length[6]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header-pengelola');
            $this->load->view('pengelola/change-password');
            $this->load->view('templates/footer-pengelola');
        } else {
            $this->pengelola_model->changePassword();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            	Password Berhasil Diganti
		  	</div>');
            redirect('pengelola/profile');
        }
    }
}
