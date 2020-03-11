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
            <div class="col-md-10" style="margin: 0 auto;">
                <?php
                $queryDetailApartemen = "select * from ruangan_apartemen where id_ruangan = '$id_ruangan'";
                $resultDetailApartemen = mysqli_query($connect, $queryDetailApartemen);
                while ($apartemen = mysqli_fetch_array($resultDetailApartemen)) {
                ?>
                    <h3 style="margin-top:20px;margin-bottom: 20px">Galeri <?= $apartemen['nama'] ?> Room</h3>
                    <a href="tambah-gambar-ruangan.php?id_ruangan=<?= $apartemen['id_ruangan'] ?>" class="btn btn-success">Tambah Gambar</a>
                    <a href="ruangan-apartemen-anda.php" class="btn btn-primary">Kembali</a>
                    <table class="table table-striped" style="margin-top: 10px">
                        <thead>
                            <tr>
                                <th scope="col">Nama Ruangan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $queryGambarRuangan = "select * from gambar_apartemen where id_ruangan = '$id_ruangan'";
                            $resultGambarRuangan = mysqli_query($connect, $queryGambarRuangan);
                            while ($gambar = mysqli_fetch_array($resultGambarRuangan)) {
                            ?>



                                <tr>
                                    <td><?= $gambar['deskripsi_singkat'] ?></td>
                                    <td><img style="width: 300px" src="<?= $gambar['gambar'] ?>"></td>
                                    <td><a href="hapus-gambar-ruangan.php?id_gambar=<?= $gambar['id_gambar'] ?>&id_ruangan=<?= $id_ruangan ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus Gambar ini?')">Hapus Gambar</a></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br><br>
            </div>

        <?php
                }
        ?>
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