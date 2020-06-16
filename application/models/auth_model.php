<?php

defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{
    function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where("(username='$username' OR email='$username')");
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function register()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'alamat' => 'None',
            'no_telpon' => 'None',
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars(MD5($this->input->post('password'))),
            'gambar_kartu_identitas' => 'None',
            'status_user' => 'Belum Terverifikasi',
            'level' => 'user'
        ];
        $this->db->insert('user', $data);
    }
}
