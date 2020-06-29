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
}
