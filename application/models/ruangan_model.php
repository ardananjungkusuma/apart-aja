<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ruangan_model extends CI_Model
{

	public function getAllRuangan()
	{
		$query = $this->db->query("SELECT * FROM ruangan_apartemen as ra JOIN apartemen a ON ra.id_apartemen = a.id_apartemen");
		return $query->result_array();
	}

	public function getAllRuanganByIdApartemen($id_apart)
	{
		$query = $this->db->query("SELECT * FROM ruangan_apartemen as ra JOIN apartemen a ON ra.id_apartemen = a.id_apartemen WHERE ra.id_apartemen = $id_apart");
		return $query->result_array();
	}

	public function getAllRuanganByKategori($kategori)
	{
		$query = $this->db->query("SELECT * FROM ruangan_apartemen as ra JOIN apartemen a ON ra.id_apartemen = a.id_apartemen WHERE ra.jenis_ruangan = '$kategori'");
		return $query->result_array();
	}

	public function getAllRuanganByNamaOrKota($keyword)
	{
		$query = $this->db->query("SELECT * FROM ruangan_apartemen as ra JOIN apartemen a ON ra.id_apartemen = a.id_apartemen WHERE ra.nama LIKE '%$keyword%' OR a.kota_kabupaten LIKE '%$keyword%'");
		return $query->result_array();
	}

	public function getDetailRuangan($id)
	{
		$query = $this->db->query("SELECT * FROM ruangan_apartemen as ra JOIN apartemen a ON ra.id_apartemen = a.id_apartemen WHERE ra.id_ruangan = $id");
		return $query->result_array();
	}

	public function getDetailGambarRuangan($id)
	{
		$query = $this->db->query("SELECT * FROM gambar_apartemen WHERE id_ruangan = $id");
		return $query->result_array();
	}
}
