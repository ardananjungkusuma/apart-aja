<div class="container">
    <div class="alert alert-primary" role="alert">
        <span style="font-size: 20px;font-weight:bold;margin-bottom: 10px">Persyaratan dan Ketentuan : </span><br>
        <b>1. Transfer sesuai nominal yang ada. Contoh : 500.008.912 (8912 adalah kode unik).<br>2. Pilih salah satu rekening yang tersedia untuk mentransfer Uang.<br>3. Pembayaran akan diverifikasi pengelola. <br>4. Lebih dari Jatuh Tempo tidak transfer dianggap hangus.</b></<b><br>
    </div>
    <div class="row">
        <?php
        foreach ($transaksi as $transaksi) {
            $id_pengelola = $transaksi['id_pengelola'];
            $tanggal_transaksi = $transaksi['tanggal_transaksi'];
            $formatTanggalTransaksi = date("d-m-Y", strtotime($tanggal_transaksi));
            $JatuhTempo = date('Y-m-d', strtotime($tanggal_transaksi . "+3 days"));
            $formatJatuhTempo = date("d-m-Y", strtotime($JatuhTempo));
        ?>
            <div class="col-lg-12" id="cetakLaporan">
                <span style="margin-top:20px;margin-bottom: 20px;font-size: 25px;font-weight: bold;text-align: center">Rincian Transaksi Pembayaran</span>
                <hr>
                <label for=""><b>Nama Pembeli : </b></label>
                <?= $transaksi['nama'] ?><br>
                <label for=""><b>Nama Ruangan : </b></label>
                <?= $transaksi['nama_ruangan'] ?><br>
                <label for=""><b>Jenis Ruangan : </b></label>
                <?= $transaksi['jenis_ruangan'] ?><br>
                <label for=""><b>Tanggal Transaksi : </b></label>
                <?= $formatTanggalTransaksi ?><br>
                <label for=""><b>Tanggal Jatuh Tempo : </b></label>
                <?= $formatJatuhTempo ?><br>
                <label for=""><b>Status Transaksi Pembelian : </b></label>
                <?= $transaksi['status_pemesanan'] ?><br>
                <label for=""><b>Transfer Sejumlah : </b></label>
                Rp. <?= number_format($transaksi['total_harga'], 0, ',', '.');; ?><br>
                <label for=""><b>Rekening Pengelola Apartemen : </b></label><br>
                <?php
                foreach ($rekening as $rek) {
                ?>
                    * <?= $rek['no_rek']; ?> - <?= $rek['nama_bank']; ?> - <?= $rek['nama_pemilik']; ?><br>
                <?php
                }
                ?>
                <label for=""><b>Pesan dari Pengelola Apartemen :</b></label><br>
                <span style="white-space: pre-line;background-color: red;color:white"><?= $transaksi['pesan_pengelola']; ?></span><br>
                <label for=""><b>Foto Bukti Transfer : </b></label><br>
                <?php
                if ($transaksi['gambar_bukti_transfer'] == "None") {
                ?>
                    <a href="<?= base_url() ?>transaksi/uploadBuktiTransfer/<?= $transaksi['id_transaksi_pembelian'] ?>" style="text-decoration: none;font-weight:bold">Klik Disini untuk Upload Gambar Bukti Transfer</a>
                <?php
                } elseif ($transaksi['status_pemesanan'] == "Verifikasi Ditolak") {
                ?>
                    <img src="<?= base_url() ?>assets/img/bukti_pembayaran/<?= $transaksi['gambar_bukti_transfer'] ?>" style="height: 300px"><br>
                    <a href="<?= base_url() ?>transaksi/uploadBuktiTransfer/<?= $transaksi['id_transaksi_pembelian'] ?>" style="text-decoration: none;">Reupload Gambar</a>
                <?php
                } else {
                ?>
                    <img src="<?= base_url() ?>assets/img/bukti_pembayaran/<?= $transaksi['gambar_bukti_transfer'] ?>" style="height: 300px"><br>
                <?php
                }
                ?>
            </div>
            <a href="<?= base_url() ?>transaksi/transaksiAnda" class="btn btn-primary" style="height:40px;margin-top:20px;margin-right:30px;">Back to Profile</a>
            <input type="button" style="margin-top:20px" class="btn btn-info" onclick="printDiv('cetakLaporan')" value="Cetak Laporan" />
            <script>
                function printDiv(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                }
            </script>
        <?php
        }
        ?>
    </div>
</div>