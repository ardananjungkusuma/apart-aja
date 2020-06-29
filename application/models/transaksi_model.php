<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{
    public function tambahTransaksi()
    {
        $id_user = $this->session->userdata('id_user');
        $id_ruangan = $this->input->post('id_ruangan');
        $id_pengelola = $this->input->post('id_pengelola');
        $randomNum = $this->input->post('randomNum');
        $priceCode = $this->input->post('priceCode');
        $getDateNOw = date("Y-m-d");

        $this->db->query("INSERT INTO transaksi_pembelian(id_user,id_ruangan,id_pengelola,kode_transaksi,total_harga,tanggal_transaksi) VALUES ('$id_user','$id_ruangan','$id_pengelola','$randomNum','$priceCode','$getDateNOw')");
    }

    public function getTransaksiBeliApartemen($id_pengelola)
    {
        $query = $this->db->query("SELECT * FROM ruangan_apartemen ra JOIN transaksi_pembelian tp on ra.id_ruangan = tp.id_ruangan JOIN user u ON tp.id_user = u.id_user WHERE ra.id_pengelola = $id_pengelola");
        return $query->result_array();
    }

    public function getDetailTransaksiById($id)
    {
        $query = $this->db->query("SELECT * FROM transaksi_pembelian tp JOIN ruangan_apartemen ra ON tp.id_ruangan = ra.id_ruangan JOIN pengelola_apartemen pa ON tp.id_pengelola = pa.id_pengelola JOIN user u ON tp.id_user = u.id_user where tp.id_transaksi_pembelian = $id");
        return $query->result_array();
    }

    public function tambahBuktiTransfer()
    {
        $id_trans = $this->input->post('id_transaksi');
        $getDataGambar = $this->db->query("SELECT * FROM transaksi_pembelian WHERE id_transaksi_pembelian = $id_trans");
        foreach ($getDataGambar->result_array() as $gambar) {
            $namaFile = $gambar['gambar_bukti_transfer'];
        }
        if ($namaFile === "None") {
            $config['upload_path']          = './assets/img/bukti_pembayaran/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $_FILES['gambar']['name'];
            $config['file_name']         = $newName;
            $config['max_size']             = 1024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
            $data = [
                "gambar_bukti_transfer" => $newName
            ];
            $this->db->where('id_transaksi_pembelian', $id_trans);
            $this->db->update('transaksi_pembelian', $data);
        } else {
            $path = "assets/img/bukti_pembayaran/";
            unlink($path . $namaFile);
            $config['upload_path']          = './assets/img/bukti_pembayaran/';
            $config['allowed_types']        = 'jpg|png';
            $newName = date('dmYHis') . $_FILES['gambar']['name'];
            $config['file_name']         = $newName;
            $config['max_size']             = 1024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
            $data = [
                "gambar_bukti_transfer" => $newName
            ];
            $this->db->where('id_transaksi_pembelian', $id_trans);
            $this->db->update('transaksi_pembelian', $data);
        }
    }
}
