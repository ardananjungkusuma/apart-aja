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
        if ($this->session->userdata('status') == "Terverifikasi") {
            $data = [
                "email" => $this->input->post('email'),
                "no_telpon" => $this->input->post('no_telpon')
            ];
        } else {
            $data = [
                "nama" => $this->input->post('nama'),
                "email" => $this->input->post('email'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "no_telpon" => $this->input->post('no_telpon')
            ];
        }
        $this->db->where('id_pengelola', $id);
        $this->db->update('pengelola_apartemen', $data);
    }

    public function verifikasiIdentitas($id)
    {
        $path1 = "assets/img/identitas/kartu_identitas/";
        $path2 = "assets/img/identitas/kyc_identitas/";
        $getDataGambar = $this->db->query("SELECT * FROM pengelola_apartemen WHERE id_pengelola = $id");
        foreach ($getDataGambar->result_array() as $gambar) {
            $gambarIdentitas = $gambar['gambar_identitas'];
            $gambarKYC = $gambar['kyc_identitas'];
            $status_pengelola = $gambar['status_pengelola'];
        }

        $config['upload_path']          = './assets/img/identitas/kartu_identitas/';
        $config['allowed_types']        = 'jpg|png';
        $config['remove_spaces'] = TRUE;
        $newName1 = date('dmYHis') . $_FILES['identitas']['name'];
        $config['file_name']         = $newName1;
        $config['max_size']             = 3100;

        $this->load->library('upload', $config, 'identitas');
        $this->identitas->initialize($config);
        if ($this->identitas->do_upload('identitas')) {
            if ($gambarIdentitas != "None") {
                unlink($path1 . $gambarIdentitas);
            }
            $this->identitas->data('file_name');
            $upload_data = $this->identitas->data();
            if ($status_pengelola == "Verifikasi Ditolak") {
                $data = [
                    "gambar_identitas" => $upload_data['file_name'],
                    "status_pengelola" => "Belum Terverifikasi"
                ];
            } else {
                $data = [
                    "gambar_identitas" => $upload_data['file_name']
                ];
            }
            $this->db->where('id_pengelola', $id);
            $this->db->update('pengelola_apartemen', $data);

            $config2['upload_path']          = './assets/img/identitas/kyc_identitas/';
            $config2['allowed_types']        = 'jpg|png';
            $config2['remove_spaces'] = TRUE;
            $newName2 = date('dmYHis') . $_FILES['kyc']['name'];
            $config2['file_name']         = $newName2;
            $config2['max_size']             = 3100;

            $this->load->library('upload', $config2, 'kyc');
            $this->kyc->initialize($config2);
            if ($this->kyc->do_upload('kyc')) {
                if ($gambarKYC != "None") {
                    unlink($path2 . $gambarKYC);
                }
                $this->kyc->data('file_name');
                $upload_data2 = $this->kyc->data();
                $data = [
                    "kyc_identitas" => $upload_data2['file_name'],
                ];
                $this->db->where('id_pengelola', $id);
                $this->db->update('pengelola_apartemen', $data);
                return "True";
            } else {
                $error = array('error' => $this->upload->display_errors());
                return $this->session->set_flashdata('error', $error['error']);
            }
        } else {
            $error = array('error' => $this->upload->display_errors());
            return $this->session->set_flashdata('error', $error['error']);
        }
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

    public function changePassword()
    {
        $data = [
            "password" => MD5($this->input->post('password'))
        ];
        $this->db->where('id_pengelola', $this->session->userdata('id_pengelola'));
        $this->db->update('pengelola_apartemen', $data);
    }
}
