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
                        <h2>Rekening Anda</h2>
                        <hr>
                    </center>
                    <?php
                    $idPengelola = $profile['id_pengelola'];
                    $queryGetRekening = "SELECT * FROM rekening_bank WHERE id_pengelola = $idPengelola";
                    $executeRekening = mysqli_query($connect, $queryGetRekening);
                    $checkRekening = mysqli_num_rows($executeRekening);
                    if ($checkRekening) {
                        $no = 1;
                    ?>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>No</td>
                                <td>No Rekening</td>
                                <td>Atas Nama</td>
                                <td>Nama Bank</td>
                                <td>Aksi</td>
                            </tr>

                            <?php
                            while ($rekening = mysqli_fetch_array($executeRekening)) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $rekening['no_rek'] ?></td>
                                    <td><?= $rekening['nama_pemilik'] ?></td>
                                    <td><?= $rekening['nama_bank'] ?></td>
                                    <td><a href="rekening-pengelola.php?id_hapos=<?= $rekening['id_rekening'] ?>" type="hapus" onclick="return confirm('Apakah anda ingin menghapus rekening ini?');" class="btn btn-danger" name="hapus" id="hapus">Hapus</a></td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </table>
                    <?php
                    } else {
                    ?>
                        Maaf Anda Belum Menambah Daftar Rekening.<br>
                    <?php
                    }

                    ?>
                    <a href="profil-pengelola.php" class="btn btn-info" style="margin-top: 20px;">Kembali ke Profil</a>
                    <a href="tambah-rekening-pengelola.php" class="btn btn-success" style="margin-top: 20px;margin-left:10px">Tambah Rekening</a>
                </div>
        </div>
        <?php
                if (!empty($_GET['id_hapos'])) {
                    $idhaposs = $_GET['id_hapos'];
                    $queryHapus = "DELETE FROM rekening_bank where id_rekening = '$idhaposs'";
                    if (mysqli_query($connect, $queryHapus)) {
        ?>
                <script>
                    alert('Success Hapus Rekening');
                    window.location = 'rekening-pengelola.php';
                </script>
            <?php
                    } ?>

    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
<?php
                }
            }
        } else { ?>

<script>
    window.location = 'login-pengelola.php';
</script>
<?php
        }
?>

</html>