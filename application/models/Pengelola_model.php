<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengelola_model extends CI_Model
{
    public function getRekeningById($id)
    {
        $query = $this->db->query("SELECT * FROM rekening_bank WHERE id_pengelola = $id");
        return $query->result_array();
    }

    public function getDataById($id_pengelola)
    {
        $query = $this->db->query("SELECT * FROM pengelola_apartemen WHERE id_pengelola = $id_pengelola");
        return $query->result_array();
    }

    public function editProfile($id)
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "no_telpon" => $this->input->post('no_telpon')
        ];
        $this->db->where('id_pengelola', $id);
        $this->db->update('pengelola_apartemen', $data);
    }

    public function tambahRekening()
    {
        $data = [
            "id_pengelola" => $this->session->userdata('id_pengelola'),
            "nama_bank" => $this->input->post('nama_bank'),
            "nama_pemilik" => $this->input->post('nama_pemilik'),
            "no_rek" => $this->input->post('no_rek')
        ];
        $this->db->insert('rekening_bank', $data);
    }

    public function hapusRekening($id)
    {
        $id_peng = $this->session->userdata('id_pengelola');
        $this->db->where('id_rekening', $id);
        $this->db->where('id_pengelola', $id_peng);
        $this->db->delete('rekening_bank');
    }

    public function getAllPengelola()
    {
        $query = $this->db->query("SELECT * FROM pengelola_apartemen");
        return $query->result_array();
    }
}
