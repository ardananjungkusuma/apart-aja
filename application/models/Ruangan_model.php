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

	public function getAllRuanganByIdPengelola($id_pengelola)
	{
		$query = $this->db->query("SELECT * FROM ruangan_apartemen WHERE id_pengelola=$id_pengelola");
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

	public function getRuanganByIdPengelola($id_pengelola)
	{
		$query = $this->db->query("SELECT * FROM ruangan_apartemen ra LEFT JOIN apartemen a ON ra.id_apartemen = a.id_apartemen WHERE ra.id_pengelola = $id_pengelola");
		return $query->result_array();
	}

	public function tambahRuangan()
	{
		$uploaded_image = $_FILES['gambar_utama']['name'];

		if ($uploaded_image) {
			$config['upload_path']          = './assets/img/gambar_ruangan/';
			$config['allowed_types']        = 'jpg|png';
			$config['remove_spaces'] = TRUE;
			$newName = date('dmYHis') . $_FILES['gambar_utama']['name'];
			$config['file_name']         = $newName;
			$config['max_size']             = 1024;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar_utama')) {
				$this->upload->data('file_name');
				$data = [
					"id_pengelola" => $this->session->userdata('id_pengelola'),
					"id_apartemen" => $this->input->post('id_apartemen', true),
					"nama_ruangan" => $this->input->post('nama_ruangan', true),
					"jenis_ruangan" => $this->input->post('jenis_ruangan', true),
					"harga_beli" => $this->input->post('harga_beli', true),
					"sisa_ruang_apartemen" => $this->input->post('sisa_ruang_apartemen', true),
					"detail_ruangan" => $this->input->post('detail_ruangan', true),
					"gambar_utama" => $newName
				];
				$this->db->insert('ruangan_apartemen', $data);
				return "True";
			} else {
				$error = array('error' => $this->upload->display_errors());
				return $this->session->set_flashdata('error', $error['error']);
			}
		}
	}

	public function editRuangan()
	{
		$id = $this->input->post('id_ruangan');
		$uploaded_image = $_FILES['gambar']['name'];

		if ($uploaded_image) {
			$path = "assets/img/gambar_ruangan/";
			$getDataGambar = $this->db->query("SELECT * FROM ruangan_apartemen WHERE id_ruangan = $id");
			foreach ($getDataGambar->result_array() as $gambar) {
				$namaFile = $gambar['gambar_utama'];
			}
			if ($namaFile != "no_img.jpg") {
				//hapus gambar
				unlink($path . $namaFile);
			}

			$config['upload_path']          = './assets/img/gambar_ruangan/';
			$config['allowed_types']        = 'jpg|png';
			$config['remove_spaces'] = TRUE;
			$newName = date('dmYHis') . $_FILES['gambar']['name'];
			$config['file_name']         = $newName;
			$config['max_size']             = 1024;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$this->upload->data('file_name');
				$data = [
					"id_pengelola" => $this->session->userdata('id_pengelola'),
					"nama_ruangan" => $this->input->post('nama_ruangan', true),
					"jenis_ruangan" => $this->input->post('jenis_ruangan', true),
					"harga_beli" => $this->input->post('harga_beli', true),
					"detail_ruangan" => $this->input->post('detail_ruangan', true),
					"sisa_ruang_apartemen" => $this->input->post('sisa_ruang_apartemen', true),
					"gambar_utama" => $newName
				];
				$this->db->where('id_ruangan', $id);
				$this->db->update('ruangan_apartemen', $data);
				return "True";
			} else {
				$error = array('error' => $this->upload->display_errors());
				return $this->session->set_flashdata('error', $error['error']);
			}
		} else {
			$data = [
				"id_pengelola" => $this->session->userdata('id_pengelola'),
				"nama_ruangan" => $this->input->post('nama_ruangan', true),
				"jenis_ruangan" => $this->input->post('jenis_ruangan', true),
				"harga_beli" => $this->input->post('harga_beli', true),
				"detail_ruangan" => $this->input->post('detail_ruangan', true),
				"sisa_ruang_apartemen" => $this->input->post('sisa_ruang_apartemen', true)
			];
			$this->db->where('id_ruangan', $id);
			$this->db->update('ruangan_apartemen', $data);
		}
	}

	public function hapusRuangan($id)
	{
		$path = "assets/img/gambar_ruangan/";
		$getDataGambarUtama = $this->db->query("SELECT * FROM ruangan_apartemen WHERE id_ruangan = $id");
		$getDataGambar = $this->db->query("SELECT * FROM gambar_apartemen WHERE id_ruangan = $id");
		foreach ($getDataGambar->result_array() as $gambar) {
			$namaFile = $gambar['gambar'];
			unlink($path . $namaFile);
		}
		foreach ($getDataGambarUtama->result_array() as $gambarUtama) {
			$fileGambar = $gambarUtama['gambar_utama'];
			unlink($path . $fileGambar);
		}
		//hapus gambar
		$this->db->where('id_ruangan', $id);
		$this->db->delete('ruangan_apartemen');
	}
}
