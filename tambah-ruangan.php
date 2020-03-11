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
                    <form method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" name="id_pengelola" value="<?= $id_username ?>">
                            <label for="nama">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Ruangan">
                            <label for="nama">Jenis Ruangan</label>
                            <select class="form-control" name="jenis_ruangan" id="jenis_ruangan">
                                <option selected>Pilih Jenis Ruangan</option>
                                <option value="Single Suite">Single Suite</option>
                                <option value="Mini Suite">Mini Suite</option>
                                <option value="Luxury Suite">Luxury Suite</option>
                            </select>
                            <label>Upload Foto Utama Ruangan Apartemen</label>
                            <input required type="file" class="form-control-file" name="gambar_utama">
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
                            <textarea id="txtArea" onkeypress="onTestChange();" class="form-control" name="detail_ruangan" rows="6" placeholder="Deskripsi isi ruangan, fasilitas"></textarea>
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
        $folder = "assets/img/gambar_apartemen/";
        $image = $_FILES['gambar_utama']['name'];
        $nama_file = $folder . date('dmYHis') . $image;
        move_uploaded_file($_FILES["gambar_utama"]["tmp_name"], $nama_file);
        $id_apartemen = $_POST['id_apartemen'];
        $nama = $_POST['nama'];
        $id_pengelola = $_POST['id_pengelola'];
        $jenis_ruangan = $_POST['jenis_ruangan'];
        $harga_sewa = $_POST['harga_sewa'];
        $harga_beli = $_POST['harga_beli'];
        $detail_ruangan = $_POST['detail_ruangan'];
        $sisa_ruang_apartemen = $_POST['sisa_ruang_apartemen'];
        $queryInsertApartement = "INSERT INTO ruangan_apartemen(id_apartemen,id_pengelola,nama,jenis_ruangan,harga_sewa,harga_beli,detail_ruangan,sisa_ruang_apartemen,gambar_utama) 
        VALUES ('$id_apartemen','$id_pengelola','$nama','$jenis_ruangan','$harga_sewa','$harga_beli','$detail_ruangan','$sisa_ruang_apartemen','$nama_file')";
        if (mysqli_query($connect, $queryInsertApartement)) {
    ?>
            <script>
                alert('Success Menambahkan Ruangan Apartemen');
                window.location = 'ruangan-apartemen-anda.php';
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