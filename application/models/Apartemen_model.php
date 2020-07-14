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
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $this->upload->data('file_name');
                $data = [
                    "id_pengelola" => $this->session->userdata('id_pengelola'),
                    "nama_apartemen" => $this->input->post('nama_apartemen', true),
                    "alamat_apartemen" => $this->input->post('alamat_apartemen', true),
                    "kota_kabupaten" => $this->input->post('kota_kabupaten', true),
                    "provinsi" => $this->input->post('provinsi', true),
                    "gambar_apartemen" => $newName,
                    "maps_link" => $this->input->post('maps_link', true)
                ];
                $this->db->insert('apartemen', $data);
                return "True";
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        }
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


            $config['upload_path']          = './assets/img/gambar_apartemen/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $_FILES['gambar']['name'];
            $config['file_name']         = $newName;
            $config['max_size']             = 1024;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                if ($namaFile != "no_img.jpg") {
                    //hapus gambar
                    unlink($path . $namaFile);
                }
                $this->upload->data('file_name');
                $data = [
                    "id_pengelola" => $this->session->userdata('id_pengelola'),
                    "nama_apartemen" => $this->input->post('nama_apartemen', true),
                    "alamat_apartemen" => $this->input->post('alamat_apartemen', true),
                    "kota_kabupaten" => $this->input->post('kota_kabupaten', true),
                    "provinsi" => $this->input->post('provinsi', true),
                    "gambar_apartemen" => $newName,
                    "maps_link" => $this->input->post('maps_link', true)
                ];
                $this->db->where('id_apartemen', $id);
                $this->db->update('apartemen', $data);
                return "True";
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        } else {
            $data = [
                "id_pengelola" => $this->session->userdata('id_pengelola'),
                "nama_apartemen" => $this->input->post('nama_apartemen', true),
                "alamat_apartemen" => $this->input->post('alamat_apartemen', true),
                "kota_kabupaten" => $this->input->post('kota_kabupaten', true),
                "provinsi" => $this->input->post('provinsi', true),
                "maps_link" => $this->input->post('maps_link', true)
            ];
            $this->db->where('id_apartemen', $id);
            $this->db->update('apartemen', $data);
        }
    }

    public function hapusApartemen($id)
    {
        $id_pengelola = $this->session->userdata('id_pengelola');
        // Pengecekan Pengelola Sebelum Menghapus
        $getCheckPengelola = $this->db->query("SELECT * FROM apartemen WHERE id_apartemen = $id AND id_pengelola = $id_pengelola");
        if (!empty($getCheckPengelola->result_array())) {
            $pathRuangan = "assets/img/gambar_ruangan/";
            $getDataGambar = $this->db->query("SELECT * FROM apartemen WHERE id_apartemen = $id");
            $getDataRuangan = $this->db->query("SELECT * FROM ruangan_apartemen WHERE id_apartemen = $id");
            $path = "assets/img/gambar_apartemen/";
            foreach ($getDataGambar->result_array() as $gambar) {
                $namaFileApart = $gambar['gambar_apartemen'];
                unlink($path . $namaFileApart);
            }
            foreach ($getDataRuangan->result_array() as $ruangan) {
                $namaFile = $ruangan['gambar_utama'];
                unlink($pathRuangan . $namaFile);
                $id_ruangan = $ruangan['id_ruangan'];
                $getDataGambar = $this->db->query("SELECT * FROM gambar_apartemen WHERE id_ruangan = $id_ruangan");
                foreach ($getDataGambar->result_array() as $gambar) {
                    $namaFileRuangan = $gambar['gambar'];
                    unlink($pathRuangan . $namaFileRuangan);
                }
            }

            $this->db->where('id_apartemen', $id);
            $this->db->delete('apartemen');
        }
    }
}
