<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
	public function getAllUser()
	{
		$query = $this->db->query("SELECT * FROM user");
		return $query->result_array();
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

	public function editProfile($id)
	{
		$data = [
			"nama" => $this->input->post('nama'),
			"email" => $this->input->post('email'),
			"alamat" => $this->input->post('alamat'),
			"jenis_kelamin" => $this->input->post('jenis_kelamin'),
			"no_telpon" => $this->input->post('no_telpon')
		];
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

	public function verifikasiIdentitas($id)
	{
		$path = "assets/img/identitas/kartu_identitas/";
		$getDataGambar = $this->db->query("SELECT * FROM user WHERE id_user = $id");
		foreach ($getDataGambar->result_array() as $gambar) {
			$namaFile = $gambar['gambar_kartu_identitas'];
			$status_user = $gambar['status_user'];
		}

		$config['upload_path']          = './assets/img/identitas/kartu_identitas/';
		$config['allowed_types']        = 'jpg|png';
		$config['remove_spaces'] = TRUE;
		$newName = date('dmYHis') . $_FILES['gambar']['name'];
		$config['file_name']         = $newName;
		$config['max_size']             = 3100;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('gambar')) {
			if ($namaFile != "None") {
				unlink($path . $namaFile);
			}
			$this->upload->data('file_name');
			if ($status_user == "Verifikasi Ditolak") {
				$data = [
					"gambar_kartu_identitas" => $newName,
					"status_user" => "Belum Terverifikasi"
				];
			} else {
				$data = [
					"gambar_kartu_identitas" => $newName
				];
			}
			$this->db->where('id_user', $id);
			$this->db->update('user', $data);
			return "True";
		} else {
			$error = array('error' => $this->upload->display_errors());
			return $this->session->set_flashdata('error', $error['error']);
		}
	}
	public function changePassword()
	{
		$data = [
			"password" => MD5($this->input->post('password'))
		];
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->update('user', $data);
	}
}
