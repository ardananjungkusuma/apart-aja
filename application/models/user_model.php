<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
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
	// TODO FIX AUTH USER (REGISTER)
	function register()
	{
		$data = [
			'username' => htmlspecialchars($this->input->post('username', true)),
			'password' => htmlspecialchars(MD5($this->input->post('password'))),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'nama' => htmlspecialchars($this->input->post('nama', true)),
			'level' => 'user',
			'status' => 'Tidak Aktif'
		];
		$this->db->insert('user', $data);
	}

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

	public function getKritikSaranById($id)
	{
		$query = $this->db->query("SELECT * FROM kritik_saran ks JOIN apartemen a on ks.id_apartemen = a.id_apartemen WHERE ks.id_user = $id");
		return $query->result_array();
	}
}
