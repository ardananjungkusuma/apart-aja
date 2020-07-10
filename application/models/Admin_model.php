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
}
