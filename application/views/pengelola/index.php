<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto;">
            <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Transaksi Pembelian Apartemen</h3>
            <?php if ($this->session->flashdata('message')) { ?>
                <?= $this->session->flashdata('message') ?>
            <?php } ?>
            <table class="table table-hover" id="listTransaksiPembelian">
                <thead style="background-color: #343a40;color:white">
                    <tr>
                        <td>Nama Pembeli</td>
                        <td>Tanggal Transaksi</td>
                        <td>Tanggal Jatuh Tempo</td>
                        <td>Status Pembayaran</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pembelian as $tampil) {
                        $tanggal_transaksi = $tampil['tanggal_transaksi'];
                        $formatTanggalTransaksi = date("d-m-Y", strtotime($tanggal_transaksi));
                        $JatuhTempo = date('Y-m-d', strtotime($tanggal_transaksi . "+3 days"));
                        $formatJatuhTempo = date("d-m-Y", strtotime($JatuhTempo));
                        $status_pemesananan = $tampil['status_pemesanan'];
                    ?>
                        <tr>
                            <td><?= $tampil['nama'] ?></td>
                            <td><?= $formatTanggalTransaksi ?></td>
                            <td><?= $formatJatuhTempo ?></td>
                            <td><?= $status_pemesananan  ?></td>
                            <td>
                                <?php
                                if ($status_pemesananan != "Berhasil Verifikasi") {
                                ?>
                                    <a href="<?= base_url() ?>transaksi/editTransaksiBeliApart/<?= $tampil['id_transaksi_pembelian'] ?>" class="badge badge-success">Edit Transaksi</a>
                                    <a href="<?= base_url() ?>transaksi/detailTransaksiBeliApart/<?= $tampil['id_transaksi_pembelian'] ?>" class="badge badge-info">Detail Transaksi</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?= base_url() ?>transaksi/detailTransaksiBeliApart/<?= $tampil['id_transaksi_pembelian'] ?>" class="badge badge-info">Detail Transaksi</a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>