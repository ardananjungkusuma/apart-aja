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

    public function getTransaksiBeliApartemen($id_ruangan)
    {
        $query = $this->db->query("SELECT * FROM transaksi_pembelian tp JOIN user u on tp.id_user = u.id_user where id_ruangan = $id_ruangan");
        return $query->result_array();
    }
}
