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

    public function getApartemenByIdPengelola($id_pengelola)
    {
        $query = $this->db->query("SELECT * FROM apartemen WHERE id_pengelola = $id_pengelola");
        return $query->result_array();
    }
}
