<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengelola_model extends CI_Model
{
    public function getRekeningById($id)
    {
        $query = $this->db->query("SELECT * FROM rekening_bank WHERE id_pengelola = $id");
        return $query->result_array();
    }
}
