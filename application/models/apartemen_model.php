<?php

defined('BASEPATH') or exit('No direct script access allowed');

class apartemen_model extends CI_Model
{

    public function getAllApartemen()
    {
        $query = $this->db->query("SELECT * FROM apartemen as a JOIN pengelola_apartemen pa ON a.id_pengelola = pa.id_pengelola");
        return $query->result_array();
    }

    public function getAllApartemenById($id_apart)
    {
        $query = $this->db->query("SELECT * FROM apartemen as a JOIN pengelola_apartemen pa ON a.id_pengelola = pa.id_pengelola WHERE a.id_apartemen = '$id_apart'");
        return $query->result_array();
    }

    public function getAllApartemenPengelolaById($id_apart)
    {
        $id_pengelola = $this->session->userdata('id_pengelola');
        $query = $this->db->query("SELECT * FROM apartemen as a JOIN pengelola_apartemen pa ON a.id_pengelola = pa.id_pengelola WHERE a.id_apartemen = $id_apart AND a.id_pengelola = $id_pengelola");
        return $query->result_array();
    }

    public function getApartemenByIdPengelola($id_pengelola)
    {
        $query = $this->db->query("SELECT * FROM apartemen WHERE id_pengelola = $id_pengelola");
        return $query->result_array();
    }

    public function tambahApartemen()
    {
        $uploaded_image = $_FILES['gambar']['name'];

        if ($uploaded_image) {
            $config['upload_path']          = './assets/img/gambar_apartemen/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $_FILES['gambar']['name'];
            $config['file_name']         = $newName;
            $config['max_size']             = 1024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
            $data = [
                "id_pengelola" => $this->session->userdata('id_pengelola'),
                "nama_apartemen" => $this->input->post('nama_apartemen', true),
                "alamat_apartemen" => $this->input->post('alamat_apartemen', true),
                "kota_kabupaten" => $this->input->post('kota_kabupaten', true),
                "provinsi" => $this->input->post('provinsi', true),
                "gambar_apartemen" => $newName,
                "maps_link" => $this->input->post('maps_link', true)
            ];
        } else {
            $data = [
                "id_pengelola" => $this->session->userdata('id_pengelola'),
                "nama_apartemen" => $this->input->post('nama_apartemen', true),
                "alamat_apartemen" => $this->input->post('alamat_apartemen', true),
                "kota_kabupaten" => $this->input->post('kota_kabupaten', true),
                "provinsi" => $this->input->post('provinsi', true),
                "gambar_apartemen" => "test.jpg",
                "maps_link" => $this->input->post('maps_link', true)
            ];
        }
        $this->db->insert('apartemen', $data);
    }

    public function editApartemen()
    {
        $id = $this->input->post('id_apartemen');
        $uploaded_image = $_FILES['gambar']['name'];

        if ($uploaded_image) {
            $path = "assets/img/gambar_apartemen/";
            $getDataGambar = $this->db->query("SELECT * FROM apartemen WHERE id_apartemen = $id");
            foreach ($getDataGambar->result_array() as $gambar) {
                $namaFile = $gambar['gambar_apartemen'];
            }
            if ($namaFile != "no_img.jpg") {
                //hapus gambar
                unlink($path . $namaFile);
            }

            $config['upload_path']          = './assets/img/gambar_apartemen/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $_FILES['gambar']['name'];
            $config['file_name']         = $newName;
            $config['max_size']             = 1024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
            $data = [
                "id_pengelola" => $this->session->userdata('id_pengelola'),
                "nama_apartemen" => $this->input->post('nama_apartemen', true),
                "alamat_apartemen" => $this->input->post('alamat_apartemen', true),
                "kota_kabupaten" => $this->input->post('kota_kabupaten', true),
                "provinsi" => $this->input->post('provinsi', true),
                "gambar_apartemen" => $newName,
                "maps_link" => $this->input->post('maps_link', true)
            ];
        } else {
            $data = [
                "id_pengelola" => $this->session->userdata('id_pengelola'),
                "nama_apartemen" => $this->input->post('nama_apartemen', true),
                "alamat_apartemen" => $this->input->post('alamat_apartemen', true),
                "kota_kabupaten" => $this->input->post('kota_kabupaten', true),
                "provinsi" => $this->input->post('provinsi', true),
                "maps_link" => $this->input->post('maps_link', true)
            ];
        }
        $this->db->where('id_apartemen', $id);
        $this->db->update('apartemen', $data);
    }

    public function hapusApartemen($id)
    {
        $id_pengelola = $this->session->userdata('id_pengelola');
        // Pengecekan Pengelola Sebelum Menghapus
        $getCheckPengelola = $this->db->query("SELECT * FROM apartemen WHERE id_apartemen = $id AND id_pengelola = $id_pengelola");
        if (!empty($getCheckPengelola->result_array())) {
            $path = "assets/img/gambar_apartemen/";
            $getDataGambar = $this->db->query("SELECT * FROM apartemen WHERE id_apartemen = $id");
            foreach ($getDataGambar->result_array() as $gambar) {
                $namaFile = $gambar['gambar_apartemen'];
            }
            if ($namaFile != "no_img.jpg") {
                //hapus gambar
                unlink($path . $namaFile);
            }

            $this->db->where('id_apartemen', $id);
            $this->db->delete('apartemen');
        }
    }
}
