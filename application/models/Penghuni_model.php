<?php

defined('BASEPATH') or exit('No direct script access allowed');

class penghuni_model extends CI_Model
{
    public function getDaftarPenghuni()
    {
        $id = $this->session->userdata('id_pengelola');
        $query = $this->db->query("SELECT * FROM pemilik_apartemen pa JOIN user u ON pa.id_user = u.id_user JOIN ruangan_apartemen ra ON pa.id_ruangan = ra.id_ruangan WHERE pa.id_pengelola = $id");
        return $query->result_array();
    }

    public function getPemilikByIdUser($id)
    {
        $query = $this->db->query("SELECT * FROM pemilik_apartemen pa JOIN ruangan_apartemen ra ON pa.id_ruangan = ra.id_ruangan JOIN apartemen a ON ra.id_apartemen = a.id_apartemen WHERE pa.id_user = $id");
        return $query->result_array();
    }

    public function tambahPenghuni()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true),
            "id_ruangan" => $this->input->post('id_ruangan', true),
            "id_pengelola" => $this->session->userdata('id_pengelola'),
            "nama_nomer_ruangan" => $this->input->post('nama_nomer_ruangan', true),
            "lantai" => $this->input->post('lantai', true)
        ];
        $this->db->insert('pemilik_apartemen', $data);
    }
}
