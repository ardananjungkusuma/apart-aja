<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{
    public function tambahTransaksi()
    {
        $id_user = $this->session->userdata('id_user');
        $id_ruangan = $this->input->post('id_ruangan');
        $randomNum = $this->input->post('randomNum');
        $priceCode = $this->input->post('priceCode');
        $getDateNOw = date("Y-m-d");

        $this->db->query("INSERT INTO transaksi_pembelian(id_user,id_ruangan,kode_transaksi,total_harga,tanggal_transaksi) VALUES ('$id_user','$id_ruangan','$randomNum','$priceCode','$getDateNOw')");
    }

    public function getTransaksiBeliApartemen($id_pengelola)
    {
        $query = $this->db->query("SELECT * FROM ruangan_apartemen ra JOIN transaksi_pembelian tp on ra.id_ruangan = tp.id_ruangan JOIN user u ON tp.id_user = u.id_user WHERE ra.id_pengelola = $id_pengelola");
        return $query->result_array();
    }
}
