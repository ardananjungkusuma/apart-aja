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
            <div class="col-md-8" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Apartemen Anda</h3>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Cras justo odio
                    </a>
                    <?php
                    $queryGetAllRuanganById = "select * from ruangan_apartemen where id_pengelola = '$id_username'";
                    $resultRuangan = mysqli_query($connect, $queryGetAllRuanganById);
                    while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
                    ?>
                        <a href="" class="list-group-item list-group-item-action"><?= $ruanganApartemen['nama'] ?></a>
                    <?php

                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
} else { ?>
    <script>
        window.location = 'login-pengelola.php';
    </script>
<?php
}
?>