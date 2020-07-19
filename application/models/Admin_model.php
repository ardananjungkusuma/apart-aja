<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function verifikasiUser($id)
    {
        $data = [
            "status_user" => $this->input->post('status_user')
        ];
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function verifikasiPengelola($id)
    {
        $data = [
            "status_pengelola" => $this->input->post('status_pengelola')
        ];
        $this->db->where('id_pengelola', $id);
        $this->db->update('pengelola_apartemen', $data);
    }

    public function tambahKaryawan()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars(MD5($this->input->post('password'))),
            'gambar_kartu_identitas' => 'None',
            'status_user' => 'Terverifikasi',
            'level' => htmlspecialchars($this->input->post('level', true))
        ];
        $this->db->insert('user', $data);
    }
}
