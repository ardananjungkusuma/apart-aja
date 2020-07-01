<div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
    <div class="row">
        <?php
        foreach ($detailPembayaran as $pembayaran) {
        ?>
            <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
                <div class="alert alert-primary" role="alert">
                    <span style="font-size: 20px;font-weight:bold;margin-bottom: 10px">Persyaratan dan Ketentuan : </span><br>
                    <b>1. Transfer sesuai nominal yang ada. Contoh : 500.008.912 (8912 adalah kode unik).<br>2. Pilih salah satu rekening yang tersedia untuk mentransfer Uang.<br>3. Pembayaran akan diverifikasi pengelola. <br>4. Lebih dari Jatuh Tempo tidak transfer dianggap hangus.</b></<b><br>
                </div>
                <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px">Rincian Pembayaran Apartemen</span>
                <hr>
                <div class="card-body" style="font-size: 18px">

                    <?php
                    $harga = $pembayaran['harga_beli'];
                    $priceCode = substr_replace($harga, $randomNum, -4);
                    ?>
                    <label for=""><b>Transfer Sejumlah : </b></label>
                    <span style="background-color: red;color:white">Rp. <?= number_format($priceCode, 0, ',', '.');; ?></span><br>
                    <small>*Nominal Wajib Sesuai (Untuk Verifikasi)</small><br>
                    <label><b>Rekening Pengelola Apartemen : </b></label><br>
                    <?php
                    $no = 1;
                    foreach ($rekening as $rek) {
                    ?>
                        <?= $no ?>. <?= $rek['no_rek']; ?> - <?= $rek['nama_bank']; ?> - <?= $rek['nama_pemilik']; ?><br>
                    <?php
                        $no++;
                        $idPengelola = $rek['id_pengelola'];
                    }
                    ?>
                    <br>
                    <form action="<?= base_url() ?>transaksi/checkoutProses" method="POST">
                        <input type="hidden" name="id_pengelola" value="<?= $idPengelola ?>">
                        <input type="hidden" name="id_ruangan" value="<?= $pembayaran['id_ruangan'] ?>">
                        <input type="hidden" name="randomNum" value="<?= $randomNum ?>">
                        <input type="hidden" name="priceCode" value="<?= $priceCode ?>">
                        <button class="btn btn-success" type="submit" style="margin-top:10px;width:230px" name="submit">Lanjutkan Pembayaran</button>
                    </form>
                    <a href="<?= base_url() ?>ruangan" class="btn btn-danger" style="width: 230px;margin-top:20px">Batalkan Pembayaran</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>