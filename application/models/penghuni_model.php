<?php

defined('BASEPATH') or exit('No direct script access allowed');

class penghuni_model extends CI_Model
{
    public function getDaftarPenghuni()
    {
        $id = $this->session->userdata('id_pengelola');
        $getDataRuangan = $this->db->query("SELECT * FROM ruangan_apartemen WHERE id_pengelola = $id");
        foreach ($getDataRuangan->result_array() as $ruangan) {
            $id_ruang = $ruangan['id_ruangan'];
            $query = $this->db->query("SELECT * FROM pemilik_apartemen pa JOIN user u ON pa.id_user = u.id_user JOIN ruangan_apartemen ra ON pa.id_ruangan = ra.id_ruangan WHERE pa.id_ruangan = $id_ruang");
        }
        return $query->result_array();
    }

    public function tambahPenghuni()
    {
        # code...
    }
}
