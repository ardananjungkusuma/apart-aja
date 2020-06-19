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
    public function listApartemen()
    {
        if ($this->session->userdata('level') == "pengelola") {
            $data['apartemen'] =  $this->apartemen_model->getApartemenByIdPengelola($this->session->userdata('id_pengelola'));
        } else {
            redirect('home');
        }
    }
}
