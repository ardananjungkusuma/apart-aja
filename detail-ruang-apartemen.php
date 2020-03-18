<?php
include 'connection.php';
session_start();
$id_ruangan = $_GET['id_ruangan'];
if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php';
?>
    <div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
        <div class="row">
            <?php
            $queryDetailRuangan = "select * from ruangan_apartemen where id_ruangan = '$id_ruangan'";
            $resultDetailRuangan = mysqli_query($connect, $queryDetailRuangan);
            while ($ruangan = mysqli_fetch_array($resultDetailRuangan)) {
            ?>
                <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
                    <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px"><?= $ruangan['nama'] ?> Room</span>
                    <div class="card-body" style="font-size: 18px">
                        <center>
                            <img style="width:450px;margin-bottom: 15px;border-radius: 20px;border:1px solid black" src="<?= $ruangan['gambar_utama'] ?>" alt="Desc">
                        </center>
                        <label for=""><b>Apartemen : </b></label>
                        <?= $ruangan['jenis_ruangan']; ?><br>
                        <label for=""><b>Jenis Ruangan : </b></label>
                        <?= $ruangan['jenis_ruangan']; ?><br>
                        <div style="float: right;margin-right: 300px">
                            <div class="form-row">
                                <div class="col">
                                    <a href="preview-beli.php?id_ruangan=<?= $id_ruangan ?>" class="btn btn-success" style="float: right;width:200px;">Buy This Room</a><br><br>
                                    <form action="preview-sewa.php" method="POST">
                                        <input type="hidden" name="id_ruangan" value="<?php $id_ruangan ?>">
                                        <input type="number" placeholder="12" name="durasi_sewa" style="width: 50px;border: 2px solid #555;"> Bulan
                                        <button style="float:right;width:200px;margin-left:5px" name="submit" class="btn btn-warning">Rent This Room</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <label for=""><b>Harga Sewa per-bulan :</b></label>
                        Rp. <?= number_format($ruangan['harga_sewa'], 0, ',', '.');; ?><br>

                        <label for=""><b>Harga Beli :</b></label>
                        Rp. <?= number_format($ruangan['harga_beli'], 0, ',', '.');; ?><br>

                        <label for=""><b>Detail Ruangan :</b></label><br>
                        <span style="white-space: pre-line"><?= $ruangan['detail_ruangan']; ?></span>
                    </div>
                    <span style="font-size: 20px;font-weight: bold">
                        Kumpulan Ruangan dari Apartemen ini
                    </span><br>
                    <div class="col-md-8" style="margin-left:150px">
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
                    <?php
                }
                    ?>
                    </div>
                </div>
        </div>

    <?php
} else {
    include 'header-guest.php';
    ?>
        <div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
            <div class="row">
                <?php
                $queryDetailRuangan = "select * from ruangan_apartemen where id_ruangan = '$id_ruangan'";
                $resultDetailRuangan = mysqli_query($connect, $queryDetailRuangan);
                while ($ruangan = mysqli_fetch_array($resultDetailRuangan)) {
                ?>
                    <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
                        <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px"><?= $ruangan['nama'] ?> Room</span>
                        <div class="card-body" style="font-size: 18px">
                            <center>
                                <img style="width:450px;margin-bottom: 15px;border-radius: 20px;border:1px solid black" src="<?= $ruangan['gambar_utama'] ?>" alt="Desc">
                            </center>
                            <label for=""><b>Apartemen : </b></label>
                            <?= $ruangan['jenis_ruangan']; ?><br>
                            <label for=""><b>Jenis Ruangan : </b></label>
                            <?= $ruangan['jenis_ruangan']; ?><br>
                            <div style="float: right;margin-right: 300px">
                                <div class="form-row">
                                    <div class="col">
                                        <a href="login-user.php" class="btn btn-success" style="float: right;width:200px;">Buy This Room</a><br><br>
                                        <input type="hidden" name="id_ruangan" value="<?php $id_ruangan ?>">
                                        <input type="number" placeholder="4" name="durasi_sewa" style="width: 50px;border: 2px solid #555;"> Bulan
                                        <a style="float:right;width:200px;margin-left:5px" href="login-user.php" class="btn btn-warning">Rent This Room</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <label for=""><b>Harga Sewa per-bulan :</b></label>
                            Rp. <?= number_format($ruangan['harga_sewa'], 0, ',', '.');; ?><br>

                            <label for=""><b>Harga Beli :</b></label>
                            Rp. <?= number_format($ruangan['harga_beli'], 0, ',', '.');; ?><br>

                            <label for=""><b>Detail Ruangan :</b></label><br>
                            <span style="white-space: pre-line"><?= $ruangan['detail_ruangan']; ?></span>
                        </div>
                        <span style="font-size: 20px;font-weight: bold">
                            Kumpulan Ruangan dari Apartemen ini
                        </span><br>
                        <div class="col-md-8" style="margin-left:150px">
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
                        <?php
                    }
                        ?>
                        </div>
                    </div>
            </div>
        <?php
    }
    include 'footer.php';
        ?>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>