<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $username = $_SESSION['usernameOrEmail'];
    include 'header-pengelola-dashboard.php';
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <?php
            $queryGetProfile = "select * from pengelola_apartemen where username = '$username' OR email = '$username'";
            $executeProfile = mysqli_query($connect, $queryGetProfile);
            while ($profile = mysqli_fetch_array($executeProfile)) {
            ?>
                <div class="col-md-8" style="margin: 0 auto;">
                    <center>
                        <h2>Profile Anda</h2>
                        <hr>
                    </center>
                    <span style="font-size: 20px">
                        <b>Nama</b> : <?= $profile['nama'] ?><br>
                        <b> Nomer Telepon</b> : +<?= $profile['no_telpon'] ?><br>
                        <b> Jenis Kelamin</b> : <?= $profile['jenis_kelamin'] ?><br>
                        <b> Email</b> : <?= $profile['email'] ?><br>
                        <b> Username</b> : <?= $profile['username'] ?><br>
                        <b> Rekening Anda</b> : <br>

                        <?php
                        $idPengelola = $profile['id_pengelola'];
                        $queryGetRekening = "SELECT * FROM rekening_bank WHERE id_pengelola = $idPengelola";
                        $executeRekening = mysqli_query($connect, $queryGetRekening);
                        $checkRekening = mysqli_num_rows($executeRekening);
                        if ($checkRekening) {
                            $no = 1;
                            while ($rekening = mysqli_fetch_array($executeRekening)) {
                        ?>
                                <h5><?= $no ?>. <?= $rekening['no_rek'] ?>-<?= $rekening['nama_bank'] ?></h5>
                            <?php
                                $no++;
                            }
                        } else {
                            ?>
                            Maaf Anda Belum Menambah Daftar Rekening.<br>
                        <?php
                        }

                        ?>
                        <b> Gambar Identitas Anda</b> :<br>
                        <img style="width:350px;margin:0 auto;border-radius: 20px;border:1px solid black" src="<?= $profile['gambar_identitas'] ?>" alt="Desc">

                    </span><br>
                    <a href="edit-profile-pengelola.php" class="btn btn-info" style="margin-top: 20px;">Edit Profile</a>
                    <a href="tambah-rekening-pengelola.php" class="btn btn-success" style="margin-top: 20px;margin-left:10px">Tambah Rekening</a>
                </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
<?php
            }
        } else { ?>
<script>
    window.location = 'login-pengelola.php';
</script>
<?php
        }
?>

</html>