<div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
    <div class="row">
        <?php
        foreach ($previewapart as $ruangan) {
        ?>
            <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
                <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px">Rincian Pembelian Apartement</span>
                <hr>
                <div class="card-body" style="font-size: 18px">
                    <center>
                        <img style="width:450px;margin-bottom: 15px;border-radius: 20px;border:1px solid black" src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $ruangan['gambar_utama'] ?>" alt="Desc">
                    </center>
                    <label for=""><b>Nama Ruangan : </b></label>
                    <?= $ruangan['nama_ruangan']; ?><br>
                    <label for=""><b>Apartemen : </b></label>
                    <?= $ruangan['nama_apartemen']; ?><br>
                    <label for=""><b>Lokasi Apartemen : </b></label>
                    <?= $ruangan['kota_kabupaten']; ?><br>
                    <label for=""><b>Jenis Ruangan : </b></label>
                    <?= $ruangan['jenis_ruangan']; ?><br>
                    <label for=""><b>Harga Beli :</b></label>
                    Rp. <?= number_format($ruangan['harga_beli'], 0, ',', '.');; ?><br>
                    <label for=""><b>Detail Ruangan :</b></label><br>
                    <span style="white-space: pre-line"><?= $ruangan['detail_ruangan']; ?></span><br>
                    <form action="<?= base_url() ?>transaksi/checkout" method="POST">
                        <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan'] ?>">
                        <input type="hidden" name="id_pengelola" value="<?= $ruangan['id_pengelola'] ?>">
                        <button class="btn btn-success" type="submit" style="margin-top:10px;width:230px" name="submit">Lanjutkan Pembayaran</button>
                    </form>
                    <a href="<?= base_url() ?>ruangan" class="btn btn-danger" style="width: 230px;margin-top:20px">Batalkan Pembayaran</a>
                </div>
            <?php
        }
            ?>
            </div>
    </div>
</div>