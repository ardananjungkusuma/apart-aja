<?php
include 'connection.php';
include 'header-guest.php';
session_start();
$id_ruangan = $_GET['id_ruangan'];
?>
<div class="container" style="padding: 20px; margin: 10 px auto; margin:10 auto;margin-top:80px;">
    <div class="row">
        <?php
        $queryDetailRuangan = "select * from ruangan_apartemen where id_ruangan = '$id_ruangan'";
        $resultDetailRuangan = mysqli_query($connect, $queryDetailRuangan);
        while ($ruangan = mysqli_fetch_array($resultDetailRuangan)) {
        ?>
            <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
                <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px"><?= $ruangan['nama'] ?> Room</span>
                <ul class="list-group">
                    <div class="card-body" style="font-size: 18px">
                        <center>
                            <img style="width:350px;margin-bottom: 15px;border-radius: 20px;border:1px solid black" src="<?= $ruangan['gambar_utama'] ?>" alt="Card image cap">
                        </center>
                        <label for=""><b>Jenis Ruangan : </b></label>
                        <?= $ruangan['jenis_ruangan']; ?><br>

                        <label for=""><b>Harga Sewa per-bulan :</b></label>
                        Rp. <?= number_format($ruangan['harga_sewa'], 0, ',', '.');; ?><br>

                        <label for=""><b>Harga Beli :</b></label>
                        Rp. <?= number_format($ruangan['harga_beli'], 0, ',', '.');; ?><br>

                        <label for=""><b>Detail Ruangan :</b></label><br>
                        <span style="white-space: pre-line"><?= $ruangan['detail_ruangan']; ?></span>
                    </div>
                    <center style="margin-top: 20px">
                        <label>
                            <span style="font-size: 20px">
                                Kumpulan Ruangan dari Apartemen ini
                            </span>
                        </label>
                    </center>
                    <center>
                        <?php
                        $queryGetAllGambarRuanganById = "select * from gambar_apartemen where id_ruangan = $id_ruangan";
                        $resultGambarRuangan = mysqli_query($connect, $queryGetAllGambarRuanganById);
                        while ($gambarApartemen = mysqli_fetch_array($resultGambarRuangan)) {
                        ?>
                            <figure style="display: inline-block;margin-top:10px;margin-left:3px;margin-right:3px;">
                                <img class="card-img-top" style="width: 300px;border-radius: 10px" src="<?= $gambarApartemen['gambar'] ?>" alt="<?= $gambarApartemen['deskripsi_singkat'] ?>">
                                <figcaption style="text-align: center">Gambar <?= $gambarApartemen['deskripsi_singkat'] ?></figcaption>
                            </figure>
                        <?php
                        }
                        ?>
                    </center>
                <?php
            }
                ?>
                </ul>
            </div>
    </div>
</div>
<?php
include 'footer.php';
?>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>