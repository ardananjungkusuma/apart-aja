<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_pengelola = $_SESSION['id_pengelola'];
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
                <h3 style="margin-top:20px;margin-bottom: 20px">Detail Apartemen</h3>
                <a href="apartemen-anda.php" class="btn btn-primary">Kembali</a>
                <ul class="list-group">
                    <?php
                    $queryDetailApartemen = "select * from apartemen where id_apartemen = '$id_apartemen'";
                    $resultDetailApartemen = mysqli_query($connect, $queryDetailApartemen);
                    while ($apartemen = mysqli_fetch_array($resultDetailApartemen)) {
                        $idApartemen = $apartemen['id_apartemen'];
                    ?>
                        <div class="card-body">
                            <center>
                                <img style="width:286px;margin-bottom: 15px" src="<?= $apartemen['gambar_apartemen'] ?>" alt="Card image cap">
                            </center>
                            <center>
                                <h5 class="card-title">"<?= $apartemen['nama_apartemen'] ?> Apartement"</h5>
                            </center>
                            <p class="card-text">
                                <label for=""><b>Alamat Apartemen : </b></label>
                                <?= $apartemen['alamat_apartemen']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Kota / Kabupaten :</b></label>
                                <?= $apartemen['kota_kabupaten']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Provinsi :</b></label>
                                <?= $apartemen['provinsi']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Link GMaps :</b></label>
                                <a target="_blank" href="<?= $apartemen['maps_link']; ?>">Klik Disini</a>
                            </p>
                            <p class="card-text">
                                <label><b>
                                        <h4>
                                            <center>Kumpulan Ruangan dari Apartemen ini</center>
                                        </h4>
                                    </b></label>
                            </p><br>
                            <?php
                            $queryGetAllRuanganById = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.id_apartemen = '$idApartemen'";
                            $resultRuangan = mysqli_query($connect, $queryGetAllRuanganById);
                            while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
                            ?>
                                <div class="card" style="width: 18rem;display:inline-block">
                                    <img style="width:286px;height:180px" src="<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $ruanganApartemen['nama'] ?> Room</h5>
                                        <p class="card-text"><a href="detail-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a><br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
                                        <a href="detail-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
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