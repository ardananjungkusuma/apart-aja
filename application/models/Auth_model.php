<?php

defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{
    function loginUser($username, $password)
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

    function loginPengelola($username, $password)
    {
        $this->db->select('*');
        $this->db->from('pengelola_apartemen');
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

    function loginAdmin($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where("(username='$username' OR email='$username')");
        $this->db->where('password', $password);
        $level = array('kepala', 'hrd', 'staff');
        $this->db->where_in('level', $level);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function registerUser()
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

    function registerPengelola()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'no_telpon' => 'None',
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars(MD5($this->input->post('password'))),
            'gambar_identitas' => 'None',
            'kyc_identitas' => 'None',
            'status_pengelola' => 'Belum Terverifikasi'
        ];
        $this->db->insert('pengelola_apartemen', $data);
    }
}
