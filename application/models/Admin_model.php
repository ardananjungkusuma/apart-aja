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
}
