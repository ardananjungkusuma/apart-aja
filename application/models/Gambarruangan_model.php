<?php

defined('BASEPATH') or exit('No direct script access allowed');

class gambarruangan_model extends CI_Model
{
    public function getGambarByRuangan($id)
    {
        $query = $this->db->query("SELECT * FROM gambar_apartemen WHERE id_ruangan = $id");
        return $query->result_array();
    }

    public function tambahGambarRuangan()
    {
        $uploaded_image = $_FILES['gambar']['name'];

        if ($uploaded_image) {
            $config['upload_path']          = './assets/img/gambar_ruangan/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $_FILES['gambar']['name'];
            $config['file_name']         = $newName;
            $config['max_size']             = 1024;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $this->upload->data('file_name');
                $data = [
                    "id_ruangan" => $this->input->post('id_ruangan', true),
                    "deskripsi_singkat" => $this->input->post('deskripsi', true),
                    "gambar" => $newName
                ];
                $data = [
                    "id_ruangan" => $this->input->post('id_ruangan', true),
                    "deskripsi_singkat" => $this->input->post('deskripsi', true),
                    "gambar" => $newName
                ];
                $this->db->insert('gambar_apartemen', $data);
                return "True";
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        }
    }

    public function hapusGambarRuangan($id)
    {
        $path = "assets/img/gambar_ruangan/";
        $getDataGambar = $this->db->query("SELECT * FROM gambar_apartemen WHERE id_gambar = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $namaFile = $gambar['gambar'];
        }
        //hapus gambar
        unlink($path . $namaFile);
        $this->db->where('id_gambar', $id);
        $this->db->delete('gambar_apartemen');
    }
}
