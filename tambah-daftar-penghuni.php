<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_pengelola = $_SESSION['id_pengelola'];
    include 'header-pengelola-dashboard.php';
    $queryGetRuangan = "SELECT * FROM ruangan_apartemen where id_pengelola= $id_pengelola";
    $executeGetRuangan = mysqli_query($connect, $queryGetRuangan);
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
                <br>
                <p class="h4" style="text-align: center">Tambah Penghuni Apartemen</p>
                <div class="card-body">
                    <style>
                        label {
                            margin-top: 10px;
                        }
                    </style>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><b>Nama Pemilik Apartemen: </b></label><br>
                            <select name="id_user" class="form-control" required>
                                <?php
                                while ($ruangan = mysqli_fetch_array($executeGetRuangan)) {
                                    $idruangan = $ruangan['id_ruangan'];
                                    $queryGetTransaksi = "SELECT * FROM transaksi_pembelian tp JOIN user u ON tp.id_user = u.id_user where tp.id_ruangan = $idruangan AND tp.status_pemesanan = 'Berhasil Verifikasi'";
                                    $executeQueryTransaksi = mysqli_query($connect, $queryGetTransaksi);
                                    while ($transaksi = mysqli_fetch_array($executeQueryTransaksi)) {
                                ?>
                                        <option value="<?= $transaksi['id_user'] ?>"><?= $transaksi['nama'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <label><b>Ruangan Apartemen: </b></label><br>
                            <select name="id_ruangan" class="form-control" required>
                                <?php
                                $queryGetRuangan = "SELECT * FROM ruangan_apartemen WHERE id_pengelola = $id_pengelola";
                                $executeQueryRuangan = mysqli_query($connect, $queryGetRuangan);
                                while ($ruang = mysqli_fetch_array($executeQueryRuangan)) {
                                ?>
                                    <option value="<?= $ruang['id_ruangan'] ?>"><?= $ruang['nama'] ?> Room - <?= $ruang['jenis_ruangan'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label><b>Nama Ruangan & Nomor: </b></label>
                            <input type="text" class="form-control" name="nama_nomer_ruangan" placeholder="Seville 01">
                            <label><b>Letak Lantai Ruangan: </b></label>
                            <input type="number" class="form-control" name="lantai" placeholder="2">
                        </div>
                        <a href="daftar-penghuni.php" class="btn btn-primary">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-success float-right">Tambah Penghuni Apartemen</button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
    <?php
    if (isset($_POST['submit'])) {
        $iduser = $_POST['id_user'];
        $idruangan = $_POST['id_ruangan'];
        $nama_nomer_ruangan = $_POST['nama_nomer_ruangan'];
        $lantai = $_POST['lantai'];
        $queryInsertPenghuni = "INSERT INTO pemilik_apartemen (id_user,id_ruangan,nama_nomer_ruangan,lantai) 
        VALUES ('$iduser','$idruangan','$nama_nomer_ruangan','$lantai')";
        if (mysqli_query($connect, $queryInsertPenghuni)) {
    ?>
            <script>
                alert('Success Menambah Penghuni Apartemen');
                window.location = 'daftar-penghuni.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Error Tambah Data');
            </script>
    <?php
        }
        mysqli_close($connect);
    }
} else { ?>
    <script>
        window.location = 'login-pengelola.php';
    </script>
<?php
}
?>

</html>