<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
	public function getUserById($id)
	{
		$query = $this->db->query("SELECT * FROM user WHERE id_user = $id");
		return $query->result_array();
	}

	public function getApartemenById($id)
	{
		$query = $this->db->query("SELECT * FROM pemilik_apartemen pa JOIN ruangan_apartemen r ON pa.id_ruangan = r.id_ruangan  where id_user = $id");
		return $query->result_array();
	}

	public function getTransaksiById($id)
	{
		$query = $this->db->query("SELECT * from transaksi_pembelian tp JOIN ruangan_apartemen ra ON tp.id_ruangan = ra.id_ruangan where tp.id_user = $id");
		return $query->result_array();
	}
}
