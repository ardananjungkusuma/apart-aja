<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Detail Transaksi Pembelian</p>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <?php
                foreach ($transaksi as $transaksi) {
                    $tanggal_transaksi = $transaksi['tanggal_transaksi'];
                    $formatTanggalTransaksi = date("d-m-Y", strtotime($tanggal_transaksi));
                    $JatuhTempo = date('Y-m-d', strtotime($tanggal_transaksi . "+3 days"));
                    $formatJatuhTempo = date("d-m-Y", strtotime($JatuhTempo));
                ?>
                    <div class="form-group">
                        <label><b>Nama Ruangan yang Dibeli: </b></label> <?= $transaksi['nama_ruangan'] ?><br>
                        <label><b>Nama Pembeli: </b></label> <?= $transaksi['nama'] ?><br>
                        <label><b>Tanggal Transaksi: </b></label> <?= $formatTanggalTransaksi ?><br>
                        <label><b>Tanggal Jatuh Tempo: </b></label> <?= $formatJatuhTempo ?><br>
                        <label><b>Kode Transaksi :</b></label> <?= $transaksi['kode_transaksi'] ?><br>
                        <label><b>Total Harga :</b></label> Rp. <?= number_format($transaksi['total_harga'], 0, ',', '.');; ?><br>
                        <label><b>Gambar Bukti Transfer: </b></label><br>
                        <?php
                        $gambar = $transaksi['gambar_bukti_transfer'];
                        if ($gambar == "None") {
                        ?>
                            <span>Calon Pembeli Belum Mengupload Bukti Transfer</span><br>
                        <?php
                        } else {
                        ?>
                            <center>
                                <img class="zoom" src="<?= base_url() ?>assets/img/bukti_pembayaran/<?= $gambar ?>" style="height: 300px"><br>
                                <small>*Arahkan Cursor untuk Zoom</small>
                            </center>
                        <?php
                        }
                        ?>
                        <label><b>Status Transaksi Saat Ini : <span style="background-color: yellow"><?= $transaksi['status_pemesanan'] ?></span> </b></label><br>
                        <label><b>Pesan untuk Pembeli :</b></label><br>
                        <span><?= $transaksi['pesan_pengelola'] ?></span>
                    </div>
                    <a href="<?= base_url() ?>pengelola" class="btn btn-primary">Kembali</a>
            </div>
        <?php

                }
        ?>
        </div>
    </div>
</div>