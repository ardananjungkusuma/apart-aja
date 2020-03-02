<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_ruangan = $_GET['id_ruangan'];
    include 'header-pengelola-dashboard.php';
    $queryGetInfoUser = "select * from pengelola_apartemen where username = '$usernameOrEmailNow'";
    $resultProfile = mysqli_query($connect, $queryGetInfoUser);
    while ($user = mysqli_fetch_array($resultProfile)) {
        $id_username = $user['id_pengelola'];
    }
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Detail Ruangan Apartemen</h3>
                <ul class="list-group">
                    <?php
                    $queryDetailApartemen = "select * from ruangan_apartemen where id_ruangan = '$id_ruangan'";
                    $resultDetailApartemen = mysqli_query($connect, $queryDetailApartemen);
                    while ($apartemen = mysqli_fetch_array($resultDetailApartemen)) {
                    ?>
                        <div class="card-body">
                            <h4 class="card-title"><?= $apartemen['nama'] ?> Room</h4>
                            <p class="card-text">
                                <label for=""><b>Jenis Ruangan : </b></label>
                                <?= $apartemen['jenis_ruangan']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Harga Sewa / Bulan :</b></label>
                                <?= $apartemen['harga_sewa']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Harga Beli :</b></label>
                                <?= $apartemen['harga_beli']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Detail Ruangan : </b></label>
                                <?= $apartemen['detail_ruangan']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Sisa Ruangan :</b></label>
                                <?= $apartemen['sisa_ruang_apartemen']; ?>
                            </p>
                            <label for=""><b>Kumpulan Gambar Ruangan :</b></label><br>

                            <?php
                            $queryGambarRuangan = "select * from gambar_apartemen where id_ruangan = '$id_ruangan'";
                            $resultGambarRuangan = mysqli_query($connect, $queryGambarRuangan);
                            while ($gambar = mysqli_fetch_array($resultGambarRuangan)) {
                            ?>
                                <figure>
                                    <img class="card-img-top" id="myImg" style="width: 300px" src="<?= $gambar['gambar'] ?>" alt="Card image cap">
                                    <figcaption><?= $gambar['deskripsi_singkat'] ?></figcaption>
                                </figure>
                            <?php
                            }
                            ?>
                            <br><br>
                            <a href="ruangan-apartemen-anda.php" class="btn btn-primary">Kembali</a>
                            <a href="tambah-gambar-ruangan.php?id_ruangan=<?= $apartemen['id_ruangan'] ?>" class="btn btn-success">Tambah Gambar</a>
                        </div>

                    <?php

                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
<?php
} else { ?>
    <script>
        window.location = 'login-pengelola.php';
    </script>
<?php
}
?>

</html>