<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Upload Bukti Transfer
    </div>
    <div class="card-body">
        Contoh Gambar Bukti Transfer yang Benar : <br><br>
        <center>
            <img src="<?= base_url() ?>assets/img/bukti_pembayaran/example01.png" style="width: 200px">
            <img src="<?= base_url() ?>assets/img/bukti_pembayaran/example02.png" style="width: 200px">
        </center>
        <br><br>
        Upload Bukti Transfer : <br>
        <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>transaksi/prosesUploadBuktiTransfer">
            <?php foreach ($transaksi as $trans) { ?>
                <input type="hidden" name="id_transaksi" value="<?= $trans['id_transaksi_pembelian'] ?>" required><br>
            <?php } ?>
            <input type="file" name="gambar" style="margin-bottom: 20px" required><br>
            <button type="submit" class="btn btn-info" name="submit">Upload Gambar</button>
        </form>
    </div>
</div>