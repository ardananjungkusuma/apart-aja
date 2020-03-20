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
                    $idRuangan = $_GET['id_ruangan'];
                    $getRuangan = "SELECT * FROM ruangan_apartemen where id_ruangan = $idRuangan";
                    $executeGetRuangan = mysqli_query($connect, $getRuangan);
                    while ($row = mysqli_fetch_array($executeGetRuangan)) {
                        $gambar = $row['gambar_utama'];

                    ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Ruangan</label>
                                <input type="text" id="nama" name="nama" class="form-control mb-2" placeholder="Nama" value="<?= $row['nama'] ?>" required>
                                <label>Jenis Ruangan</label>
                                <input type="text" id="jenis_ruangan" name="jenis_ruangan" class="form-control mb-2" placeholder="Jenis Ruangan" value="<?= $row['jenis_ruangan'] ?>" required>
                                <label>Harga Beli</label>
                                <input type=" number" id="harga_beli" name="harga_beli" class="form-control mb-2" placeholder="Harga Beli" value="<?= $row['harga_beli'] ?>" required>
                                <label>Detail Ruangan</label>
                                <textarea id="txtArea" onkeypress="onTestChange();" class="form-control" name="detail_ruangan" rows="6" placeholder="Deskripsi isi ruangan, fasilitas"><?= $row['detail_ruangan'] ?></textarea>
                                <label>Sisa Ruangan</label>
                                <input type=" number" id="sisa_ruang_apartemen" name="sisa_ruang_apartemen" class="form-control mb-2" placeholder="Sisa Ruangan" value="<?= $row['sisa_ruang_apartemen'] ?>" required>
                                <label>Gambar Cover Ruangan Apartemen</label><br>
                                <img src="<?= $row['gambar_utama'] ?>" width="150px;">
                                <div class=" file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <span>Choose Image</span>
                                        <input type="file" name="gambar" id="gambar">
                                    </div><br><br>
                                </div>
                            </div>
                        <?php
                    }
                        ?>
                        <a href="ruangan-apartemen-anda.php" class="btn btn-primary float-left">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-info float-right">Edit Ruangan Apartemen</button><br><br>
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
                $getRuangImg = "SELECT * FROM ruangan_apartemen where id_ruangan = $idRuangan";
                $executeGetRuang = mysqli_query($connect, $getRuangImg);
                while ($row = mysqli_fetch_array($executeGetRuang)) {
                    $gambarHapos = $row['gambar_apartemen'];
                }
                unlink($gambarHapos);
                $namafolder = "assets/img/gambar_apartemen/";
                $image = $_FILES['gambar']['name'];
                $nama_file = $namafolder . date('dmYHis') . $image;
                move_uploaded_file($_FILES["gambar"]["tmp_name"], $nama_file);
                $nama_ruang = $_POST['nama'];
                $jenis_ruangan = $_POST['jenis_ruangan'];
                $harga_beli = $_POST['harga_beli'];
                $detail_ruangan = $_POST['detail_ruangan'];
                $sisa_ruang_apartemen = $_POST['sisa_ruang_apartemen'];
                $queryUpdateApartement = "UPDATE ruangan_apartemen SET nama = '$nama_ruang',jenis_ruangan = '$jenis_ruangan',harga_beli = '$harga_beli',detail_ruangan = '$detail_ruangan',sisa_ruang_apartemen = '$sisa_ruang_apartemen',gambar_utama = '$nama_file'
                    WHERE id_ruangan = '$idRuangan'";
            } else {
                $nama_ruang = $_POST['nama'];
                $jenis_ruangan = $_POST['jenis_ruangan'];
                $harga_beli = $_POST['harga_beli'];
                $detail_ruangan = $_POST['detail_ruangan'];
                $sisa_ruang_apartemen = $_POST['sisa_ruang_apartemen'];
                $queryUpdateApartement = "UPDATE ruangan_apartemen SET nama = '$nama_ruang',jenis_ruangan = '$jenis_ruangan',harga_beli = '$harga_beli',detail_ruangan = '$detail_ruangan',sisa_ruang_apartemen = '$sisa_ruang_apartemen'
                    WHERE id_ruangan = '$idRuangan'";
            }
            if (mysqli_query($connect, $queryUpdateApartement)) {
        ?>
                <script>
                    alert('Success Edit Ruangan Apartemen');
                    window.location = 'ruangan-apartemen-anda.php';
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