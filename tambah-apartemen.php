<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    include 'header-pengelola-dashboard.php';
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
                <br>
                <p class="h4" style="text-align: center">Tambah Apartemen</p>
                <div class="card-body">
                    <style>
                        label {
                            margin-top: 10px;
                        }
                    </style>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Apartemen</label>
                            <input type="text" id="nama_apartemen" name="nama_apartemen" class="form-control mb-2" placeholder="Nama" required>
                            <label>Alamat Apartemen</label>
                            <input type="text" id="alamat_apartemen" name="alamat_apartemen" class="form-control mb-2" placeholder="Alamat" required>
                            <label>Kabupaten / Kota Apartemen </label>
                            <input type="text" id="kota" name="kota" class="form-control mb-2" placeholder="Kab/Kota" required>
                            <label>Provinsi</label>
                            <input type="text" id="provinsi" name="provinsi" class="form-control mb-2" placeholder="Provinsi" required>
                            <label>Gambar Depan Apartement</label>
                            <div class="file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Image</span>
                                    <input type="file" name="gambar" id="gambar">
                                </div>
                            </div>
                            <label style="margin-top: 15px">Link Google Maps</label><br>
                            <input type="text" id="maps_link" name="maps_link" class="form-control mb-2" placeholder="https://goo.gl/maps/oY8TDJzL5JcQvgu17">
                            <small>*Tidak Wajib Diisi</small>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Ruangan Apartemen</button><br><br>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        </body>
        <?php
        if (isset($_POST['submit'])) {
            $namafolder = "assets/img/gambar_apartemen/";
            $image = $_FILES['gambar']['name'];
            $nama_file = $namafolder . date('dmYHis') . $image;
            move_uploaded_file($_FILES["gambar"]["tmp_name"], $nama_file);
            $nama_apartemen = $_POST['nama_apartemen'];
            $alamat_apartemen = $_POST['alamat_apartemen'];
            $kota = $_POST['kota'];
            $provinsi = $_POST['provinsi'];
            $googleLink = $_POST['maps_link'];
            $queryGetInfoUser = "select * from pengelola_apartemen where username = '$usernameOrEmailNow'";
            $resultProfile = mysqli_query($connect, $queryGetInfoUser);
            while ($user = mysqli_fetch_array($resultProfile)) {
                $id_username = $user['id_pengelola'];
                $queryInsertApartement = "INSERT INTO apartemen(id_pengelola,nama_apartemen,alamat_apartemen,kota_kabupaten,provinsi,gambar_apartemen,maps_link)
                 VALUES ('$id_username','$nama_apartemen','$alamat_apartemen','$kota','$provinsi','$nama_file','$googleLink')";
            }
            if (mysqli_query($connect, $queryInsertApartement)) {
        ?>
                <script>
                    alert('Success Menambahkan Apartemen');
                    window.location = 'apartemen-anda.php';
                </script>
            <?php
            } else {

            ?>
                <h1><? echo $id_username . $usernameOrEmailNow ?></h1>
                <script>
                    alert('Error Adding Apartement');
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