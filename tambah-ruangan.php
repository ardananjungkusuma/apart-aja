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
    $queryGetApartemen = "select * from apartemen where id_pengelola = '$id_username'";
    $resultApartemen = mysqli_query($connect, $queryGetApartemen);
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
                <br>
                <p class="h4" style="text-align: center">Tambah Ruangan Apartemen</p>
                <div class="card-body">
                    <style>
                        label {
                            margin-top: 10px;
                        }
                    </style>
                    <form method="POST">
                        <div class="form-group">
                            <label for="apartemen">Apartemen</label>
                            <select class="form-control" name="id_apartemen" id="id_apartemen">
                                <option selected>Pilih Apartemen</option>
                                <?php
                                while ($rowGetApartemen = mysqli_fetch_array($resultApartemen)) {
                                ?>
                                    <option value="<?= $rowGetApartemen['id_apartemen'] ?>"><?= $rowGetApartemen['nama_apartemen'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label for="nama">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Ruangan">
                            <label for="nama">Jenis Ruangan</label>
                            <select class="form-control" name="jenis_ruangan" id="jenis_ruangan">
                                <option selected>Pilih Jenis Ruangan</option>
                                <option value="Single Suite Apartement">Single Suite Apartement</option>
                                <option value="Mini Suite Apartement">Mini Suite Apartement</option>
                                <option value="Luxury Suite Apartement">Luxury Suite Apartement</option>
                            </select>
                            <small class="text-muted">Informasi Tentang Jenis Ruangan Baca <a href="">Disini</a></small><br>
                            <label for="harga_sewa">Harga Sewa Perbulan</label>
                            <input type="number" class="form-control" name="harga_sewa" placeholder="Masukan Harga Sewa">
                            <small class="text-muted">Untuk Harga Menggunakan Satuan Rupiah</small><br>
                            <label for="harga_beli">Harga Beli</label>
                            <input type="number" class="form-control" name="harga_beli" placeholder="Masukan Harga Beli">
                            <small class="text-muted">Untuk Harga Menggunakan Satuan Rupiah</small><br>
                            <label for="sisa_ruang_apartemen">Jumlah Ruangan yang Tersedia</label>
                            <input type="number" class="form-control" name="sisa_ruang_apartemen" placeholder="10">
                            <label for="deskripsi">Detail Ruangan</label>
                            <textarea class="form-control" name="detail_ruangan" rows="6" placeholder="Deskripsi isi ruangan, fasilitas"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Ruangan Apartemen</button><br><br>
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
        $id_apartemen = $_POST['id_apartemen'];
        $nama = $_POST['nama'];
        $jenis_ruangan = $_POST['jenis_ruangan'];
        $harga_sewa = $_POST['harga_sewa'];
        $harga_beli = $_POST['harga_beli'];
        $detail_ruangan = $_POST['detail_ruangan'];
        $sisa_ruang_apartemen = $_POST['sisa_ruang_apartemen'];
        $queryInsertApartement = "INSERT INTO ruangan_apartemen(id_apartemen,nama,jenis_ruangan,harga_sewa,harga_beli,detail_ruangan,sisa_ruang_apartemen) 
        VALUES ('$id_apartemen','$nama','$jenis_ruangan','$harga_sewa','$harga_beli','$detail_ruangan','$sisa_ruang_apartemen')";
        if (mysqli_query($connect, $queryInsertApartement)) {
    ?>
            <script>
                alert('Success Menambahkan Ruangan Apartemen');
                window.location = 'pengelola-dashboard.php';
            </script>
        <?php
        } else {

        ?>
            <h1><? echo $id_username . $usernameOrEmailNow ?></h1>
            <script>
                alert('Error Adding Apartement');

                // window.location = 'tambah-apartemen.php';
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