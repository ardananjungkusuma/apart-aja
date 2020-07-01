<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kritiksaran_model extends CI_Model
{
    public function getKritikSaranByIdUser($id)
    {
        $query = $this->db->query("SELECT * FROM kritik_saran ks JOIN apartemen a on ks.id_apartemen = a.id_apartemen WHERE ks.id_user = $id");
        return $query->result_array();
    }

    public function tambahKritikSaran()
    {
        $data = [
            "id_apartemen" => $this->input->post('id_apartemen'),
            "id_user" => $this->session->userdata('id_user'),
            "kategori" => $this->input->post('kategori'),
            "isi_kritik_saran" => $this->input->post('isi_kritik_saran'),
            "tanggal_masuk" => date('d-m-Y'),
            "respon_pengelola" => "Belum ada respon dari pihak pengelola Apartemen."
        ];
        $this->db->insert('kritik_saran', $data);
    }
}
