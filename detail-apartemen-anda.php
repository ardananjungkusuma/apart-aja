<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_apartemen = $_GET['id_apartemen'];
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
                <ul class="list-group">
                    <?php
                    $queryDetailApartemen = "select * from apartemen where id_apartemen = '$id_apartemen'";
                    $resultDetailApartemen = mysqli_query($connect, $queryDetailApartemen);
                    while ($apartemen = mysqli_fetch_array($resultDetailApartemen)) {
                    ?>
                        <div class="card-header">
                            Detail Apartemen
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $apartemen['nama_apartemen'] ?></h5>
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
                            <a href="apartemen-anda.php" class="btn btn-primary">Kembali</a>
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