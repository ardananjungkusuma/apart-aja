<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kritiksaran_model extends CI_Model
{
    public function getKritikSaranByIdUser($id)
    {
        $query = $this->db->query("SELECT * FROM kritik_saran ks JOIN apartemen a on ks.id_apartemen = a.id_apartemen WHERE ks.id_user = $id");
        return $query->result_array();
    }

    public function getKritikSaranById($id)
    {
        $query = $this->db->query("SELECT * FROM kritik_saran ks JOIN apartemen a on ks.id_apartemen = a.id_apartemen JOIN user u ON ks.id_user = u.id_user WHERE ks.id_kritik_saran = $id");
        return $query->result_array();
    }

    public function getKritikSaranByIdPengelola($id)
    {
        $query = $this->db->query("SELECT * FROM kritik_saran ks JOIN apartemen a on ks.id_apartemen = a.id_apartemen JOIN user u ON ks.id_user = u.id_user WHERE a.id_pengelola = $id");
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

    public function responKritikSaran()
    {
        $data = [
            "respon_pengelola" => $this->input->post('respon_pengelola')
        ];
        $this->db->where('id_kritik_saran', $this->input->post('id_kritik_saran'));
        $this->db->update('kritik_saran', $data);
    }
}
