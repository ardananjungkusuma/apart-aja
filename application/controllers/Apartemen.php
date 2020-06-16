<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apartemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('apartemen_model');
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
}
