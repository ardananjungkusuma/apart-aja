<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    include 'header-pengelola-dashboard.php';
    $id_ruangan = $_GET['id_ruangan'];
    $queryGetInfoUser = "select * from pengelola_apartemen where username = '$usernameOrEmailNow'";
    $resultProfile = mysqli_query($connect, $queryGetInfoUser);
    while ($user = mysqli_fetch_array($resultProfile)) {
        $id_username = $user['id_pengelola'];
    }
    $queryGetInfoRuangan = "select * from ruangan_apartemen where id_ruangan = '$id_ruangan'";
    $resultInfoRuangan = mysqli_query($connect, $queryGetInfoRuangan);
    while ($ruangan = mysqli_fetch_array($resultInfoRuangan)) {
        $nama_ruangan = $ruangan['nama'];
    }
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Masukan Gambar dan Deskripsi untuk Ruangan <?= $nama_ruangan ?></h3>
                <form method="POST" enctype="multipart/form-data">
                    <label for="nama">Deskripsi Singkat Gambar :</label>
                    <input type="text" class="form-control" name="deskripsi" placeholder="Gambar Toilet"><br>
                    <label for="nama">Gambar</label><br>
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm float-left">
                            <span>Choose Image</span>
                            <input type="file" name="gambar" id="gambar">
                        </div>
                    </div><br><br>
                    <button class="btn btn-success" type="submit" name="submit">Tambah Data</button>
                    <a href="ruangan-apartemen-anda.php" class="btn btn-primary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <?php
    if (isset($_POST['submit'])) {
        $id_ruangan = $_GET['id_ruangan'];
        $namafolder = "assets/img/gambar_apartemen/";
        $deskripsi = $_POST['deskripsi'];
        $image = $_FILES['gambar']['name'];
        $nama_file = $namafolder . date('dmYHis') . $image;
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $nama_file);
        $tambah_gambar = "INSERT INTO gambar_apartemen(id_ruangan,gambar,deskripsi_singkat) 
        VALUES ('$id_ruangan','$nama_file','$deskripsi')";
        if (mysqli_query($connect, $tambah_gambar)) {
    ?>
            <script>
                alert('Success Menambahkan Gambar');
                window.location = 'detail-ruang-apartemen-anda.php?id_ruangan=<?= $id_ruangan ?>';
            </script>
        <?php
        } else { ?>
            <script>
                alert('Error Connect MySQL');
                window.location = 'ruangan-apartemen-anda.php';
            </script>
    <?php

        }
    }

    ?>
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