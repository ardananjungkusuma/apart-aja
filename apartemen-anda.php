<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    include 'header-pengelola-dashboard.php';
    $queryGetInfoUser = "select * from pengelola_apartemen where username = '$usernameOrEmailNow'";
    $resultProfile = mysqli_query($connect, $queryGetInfoUser);
    while ($user = mysqli_fetch_array($resultProfile)) {
        $id_username = $user['id_pengelola'];
    }
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-lg-11" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Apartemen Anda</h3>
                <?php
                $queryGetAllRuanganById = "select * from apartemen where id_pengelola = '$id_username'";
                $resultRuangan = mysqli_query($connect, $queryGetAllRuanganById);
                while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
                ?>
                    <div class="card" onclick="location.href='detail-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>'" style="width: 18rem;display:inline-block">
                        <img style="width:286px;" src="<?= $ruanganApartemen['gambar_apartemen'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</h5>
                            <p class="card-text"><?= $ruanganApartemen['kota_kabupaten'] ?>-<?= $ruanganApartemen['provinsi'] ?><br>
                                <a href="detail-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>" style="margin-top: 10px" class="btn btn-primary">Detail</a>
                                <a href="edit-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>" style="margin-top: 10px" class="btn btn-success">Edit</a>
                                <a href="hapus-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>" style="margin-top: 10px" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus Apartemen ini?')">Hapus</a>
                            </p>
                        </div>
                    </div>
                <?php

                }

                ?>
            </div>
        </div>
    </div>
    <script src=" assets/js/jquery-3.4.1.min.js"> </script>
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