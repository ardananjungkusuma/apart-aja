<?php
include 'connection.php';
session_start();
if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php';
    $id_ruangan = $_GET['id_ruangan'];
?>
    <div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
        <div class="row">
            <?php
            $queryDetailRuangan = "select * from ruangan_apartemen ra JOIN apartemen a ON ra.id_apartemen = a.id_apartemen where ra.id_ruangan = '$id_ruangan'";
            $resultDetailRuangan = mysqli_query($connect, $queryDetailRuangan);
            while ($ruangan = mysqli_fetch_array($resultDetailRuangan)) {
            ?>
                <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
                    <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px">Rincian Pembelian Apartement</span>
                    <hr>
                    <div class="card-body" style="font-size: 18px">
                        <center>
                            <img style="width:450px;margin-bottom: 15px;border-radius: 20px;border:1px solid black" src="<?= $ruangan['gambar_utama'] ?>" alt="Desc">
                        </center>
                        <label for=""><b>Nama Ruangan : </b></label>
                        <?= $ruangan['nama']; ?><br>
                        <label for=""><b>Apartemen : </b></label>
                        <?= $ruangan['nama_apartemen']; ?><br>
                        <label for=""><b>Jenis Ruangan : </b></label>
                        <?= $ruangan['jenis_ruangan']; ?><br>
                        <label for=""><b>Harga Beli :</b></label>
                        Rp. <?= number_format($ruangan['harga_beli'], 0, ',', '.');; ?><br>
                        <label for=""><b>Detail Ruangan :</b></label><br>
                        <span style="white-space: pre-line"><?= $ruangan['detail_ruangan']; ?></span><br>
                        <a href="daftar-ruangan.php" class="btn btn-danger" style="width: 230px;margin-top:20px">Batalkan Pembayaran</a>
                        <form action="" method="POST">
                            <input type="hidden" name="id_ruangan" value="<?php $id_ruangan ?>">
                            <input type="hidden" name="harga" value="<?php $ruangan['harga_beli'] ?>">
                            <a href="checkout-beli.php?id_ruangan=<?= $ruangan['id_ruangan'] ?>" class="btn btn-success" type="submit" style="margin-top:10px;width:230px" name="submit">Lanjutkan Pembayaran</a>
                        </form>
                    </div>
                <?php
            }
                ?>
                </div>
        </div>
    </div>
<?php
    include 'footer.php';
} else { ?>
    <script>
        window.location = 'login-user.php';
    </script>
<?php
}
?>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>