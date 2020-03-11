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
                <p class="h4" style="text-align: center">Edit Apartemen</p>
                <div class="card-body">
                    <style>
                        label {
                            margin-top: 10px;
                        }
                    </style>
                    <?php
                    $idApartemen = $_GET['id_apartemen'];
                    $getApartemen = "SELECT * FROM apartemen where id_apartemen = $idApartemen";
                    $executeGetApart = mysqli_query($connect, $getApartemen);
                    while ($row = mysqli_fetch_array($executeGetApart)) {
                        $gambar = $row['gambar_apartemen'];

                    ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Apartemen</label>
                                <input type="text" id="nama_apartemen" name="nama_apartemen" class="form-control mb-2" placeholder="Nama" value="<?= $row['nama_apartemen'] ?>" required>
                                <label>Alamat Apartemen</label>
                                <input type="text" id="alamat_apartemen" name="alamat_apartemen" class="form-control mb-2" placeholder="Alamat" value="<?= $row['alamat_apartemen'] ?>" required>
                                <label>Kabupaten / Kota Apartemen </label>
                                <input type=" text" id="kota" name="kota" class="form-control mb-2" placeholder="Kab/Kota" value="<?= $row['kota_kabupaten'] ?>" required>
                                <label>Provinsi</label>
                                <input type=" text" id="provinsi" name="provinsi" class="form-control mb-2" placeholder="Provinsi" value="<?= $row['provinsi'] ?>" required>
                                <label>Gambar Depan Apartement</label><br>
                                <img src="<?= $row['gambar_apartemen'] ?>" width="150px;">
                                <div class=" file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose Image</span>
                                        <input type="file" name="gambar" id="gambar">
                                    </div>
                                </div>
                                <label style="margin-top: 15px">Link Google Maps</label><br>
                                <input type="text" id="maps_link" value="<?= $row['maps_link'] ?>" name="maps_link" class="form-control mb-2" placeholder="https://goo.gl/maps/oY8TDJzL5JcQvgu17">
                                <small>*Tidak Wajib Diisi</small>
                            </div>
                        <?php
                    }
                        ?>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Edit Ruangan Apartemen</button><br><br>
                        </form>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        </body>
        <?php
        if (isset($_POST['submit'])) {
            if (!empty($_FILES['gambar']['name'])) {
                $getApartemenImg = "SELECT * FROM apartemen where id_apartemen = $idApartemen";
                $executeGet = mysqli_query($connect, $getApartemenImg);
                while ($row = mysqli_fetch_array($executeGet)) {
                    $gambar = $row['gambar_apartemen'];
                }
                unlink($gambar);
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
                    $queryUpdateApartement = "UPDATE apartemen SET id_pengelola = '$id_username',nama_apartemen = '$nama_apartemen',alamat_apartemen = '$alamat_apartemen',kota_kabupaten = '$kota',provinsi = '$provinsi',gambar_apartemen = '$nama_file',maps_link = '$googleLink'
                    WHERE id_apartemen = '$idApartemen'";
                }
            } else {
                $nama_apartemen = $_POST['nama_apartemen'];
                $alamat_apartemen = $_POST['alamat_apartemen'];
                $kota = $_POST['kota'];
                $provinsi = $_POST['provinsi'];
                $googleLink = $_POST['maps_link'];
                $queryGetInfoUser = "select * from pengelola_apartemen where username = '$usernameOrEmailNow'";
                $resultProfile = mysqli_query($connect, $queryGetInfoUser);
                while ($user = mysqli_fetch_array($resultProfile)) {
                    $id_username = $user['id_pengelola'];
                    $queryUpdateApartement = "UPDATE apartemen SET nama_apartemen = '$nama_apartemen',alamat_apartemen = '$alamat_apartemen',kota_kabupaten = '$kota',provinsi = '$provinsi',maps_link = '$googleLink'
                    WHERE id_apartemen = '$idApartemen'";
                }
            }
            if (mysqli_query($connect, $queryUpdateApartement)) {
        ?>
                <script>
                    alert('Success Edit Apartemen');
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