<?php
include 'connection.php';
session_start();
if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php';
    if (!empty($_GET['menu'])) {
        $menu = $_GET['menu'];
    } else {
        $menu = "profil";
    }
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row" style="margin-top: 80px;">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" style="background:#e32447;text-align: center;color:white;font-weight: bolder">
                        User Menu
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="profil-user.php" style="text-decoration: none;color: black" id="itemmenu" class="list-group-item">Profile</a>
                        <a href="profil-user.php?menu=apartemen" style="text-decoration: none;color: black" id="itemmenu" class="list-group-item">Apartemen Anda</a>
                        <a href="profil-user.php?menu=transaksi_pembelian" style="text-decoration: none;color: black" id="itemmenu" class="list-group-item">Transaksi Pembelian</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                $id_user = $_SESSION['idUsername'];
                if ($menu == "apartemen") {
                    $queryGetApartemen = "SELECT * FROM pemilik_apartemen where id_user = $id_user";
                    $executeGetApartemen = mysqli_query($connect, $queryGetApartemen);
                    $checkGetApartemen = mysqli_num_rows($executeGetApartemen);
                    if ($checkGetApartemen > 0) {
                    } else {
                ?>
                        <div class="card">
                            <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
                                Ruangan Apartemen Anda
                            </div>
                            <div class="card-body">
                                Anda Belum Melakukan Pembelian Apartemen Sama Sekali.
                            </div>
                        </div>
                    <?php
                    }
                } elseif ($menu == "upload_bukti_transfer") {
                    $idPembelian = $_GET['id_transaksi_pembelian'];
                    ?>
                    <div class="card">
                        <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
                            Upload Bukti Transfer
                        </div>
                        <div class="card-body">
                            Contoh Gambar Bukti Transfer yang Benar : <br><br>
                            <center>
                                <img src="assets/img/bukti_pembayaran/example01.png" style="width: 200px">
                                <img src="assets/img/bukti_pembayaran/example02.png" style="width: 200px">
                            </center>
                            <br><br>
                            Upload Bukti Transfer : <br>
                            <form method="POST" enctype="multipart/form-data">
                                <input type="file" name="foto_transaksi" style="margin-bottom: 20px"><br>
                                <button type="submit" class="btn btn-info" name="submit">Upload Gambar</button>
                            </form>
                            <?php
                            if (isset($_POST['submit'])) {
                                $queryGetTransaksi = "SELECT * FROM transaksi_pembelian where id_transaksi_pembelian = $idPembelian";
                                $resultTransaksi = mysqli_query($connect, $queryGetTransaksi);
                                while ($trans = mysqli_fetch_array($resultTransaksi)) {
                                    $gambar = $trans['gambar_bukti_transfer'];
                                }
                                if ($gambar == "None") {
                                    $namafolder = "assets/img/bukti_pembayaran/";
                                    $image = $_FILES['foto_transaksi']['name'];
                                    $nama_file = $namafolder . date('dmYHis') . $image;
                                    move_uploaded_file($_FILES["foto_transaksi"]["tmp_name"], $nama_file);
                                    $gambarTransaksiBeli = "UPDATE transaksi_pembelian SET gambar_bukti_transfer = '$nama_file' WHERE id_transaksi_pembelian = '$idPembelian'";
                                    if (mysqli_query($connect, $gambarTransaksiBeli)) {
                            ?>
                                        <script>
                                            alert('Success Mengupload Bukti Transaksi');
                                            window.location = 'profil-user.php?menu=transaksi_pembelian';
                                        </script>
                                    <?php
                                    }
                                } else {
                                    unlink($gambar);
                                    $namafolder = "assets/img/bukti_pembayaran/";
                                    $image = $_FILES['foto_transaksi']['name'];
                                    $nama_file = $namafolder . date('dmYHis') . $image;
                                    move_uploaded_file($_FILES["foto_transaksi"]["tmp_name"], $nama_file);
                                    $gambarTransaksiBeli = "UPDATE transaksi_pembelian SET gambar_bukti_transfer = '$nama_file' WHERE id_transaksi_pembelian = '$idPembelian'";
                                    if (mysqli_query($connect, $gambarTransaksiBeli)) {
                                    ?>
                                        <script>
                                            alert('Success Mengupload Bukti Transaksi');
                                            window.location = 'profil-user.php?menu=transaksi_pembelian';
                                        </script>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                } elseif ($menu == "transaksi_pembelian") {
                    $queryGetTransaksi = "SELECT * from transaksi_pembelian tp JOIN ruangan_apartemen ra ON tp.id_ruangan = ra.id_ruangan where tp.id_user = $id_user";
                    $executeTransaksi = mysqli_query($connect, $queryGetTransaksi);
                    $jumlahTransaksi = mysqli_num_rows($executeTransaksi);
                ?>
                    <div class="card">
                        <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
                            Transaksi Pembelian
                        </div>
                        <?php
                        if ($jumlahTransaksi > 0) {
                            $no = 1;
                        ?>
                            <h5 style="margin-top: 20px;margin-bottom: 20px;text-align: center">Data Transaksi Pembelian</h5>
                            <table class="table table-striped">
                                <tr>
                                    <td>No</td>
                                    <td>Ruangan</td>
                                    <td>Total Harga</td>
                                    <td>Status</td>
                                    <td>Detail Transaksi</td>
                                </tr>
                                <?php
                                while ($transaksi = mysqli_fetch_array($executeTransaksi)) {
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $transaksi['nama'] ?></td>
                                        <td>Rp. <?= number_format($transaksi['total_harga'], 0, ',', '.');; ?></td>
                                        <td><?= $transaksi['status_pemesanan'] ?></td>
                                        <td><a href="detail-transaksi-beli.php?id_transaksi_beli=<?= $transaksi['id_transaksi_pembelian'] ?>" class="btn btn-info">Lihat Detail</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        <?php
                        } else {
                        ?>
                            <div class="card-body">
                                Maaf Anda Belum Melakukan Transaksi
                            </div>
                        <?php
                        }
                    } elseif ($menu == "edit_profil") {
                        $queryGetUser = "SELECT * FROM user where id_user=$id_user";
                        $exeGetUser = mysqli_query($connect, $queryGetUser);
                        while ($user = mysqli_fetch_array($exeGetUser)) {
                            $status = $user['status_user']
                        ?>
                            <div class="card">
                                <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
                                    Edit Profil
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <label>Status Anda : <b><?= $status ?></b> </label><br>
                                        <label>Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control mb-2" placeholder="Nama" value="<?= $user['nama'] ?>" required>
                                        <label>Alamat</label>
                                        <input type="text" id="alamat" name="alamat" class="form-control mb-2" placeholder="Alamat" value="<?= $user['alamat'] ?>" required>
                                        <label>Nomer Telepon</label>
                                        <input type="number" id="no_telpon" name="no_telpon" class="form-control mb-2" placeholder="62894786123" value="<?= $user['no_telpon'] ?>" required>
                                        <small>*Isi dengan format 628....</small><br>
                                        <?php
                                        $gambarIdentitas = $user['gambar_kartu_identitas'];
                                        if ($status == "Belum Terverifikasi" and $gambarIdentitas == "None") {
                                        ?>
                                            <label>Upload Gambar</label><br>
                                            <input type="file" name="gambar_kartu_identitas" style="margin-bottom: 20px"><br>
                                        <?php
                                        } elseif ($status == "Belum Terverifikasi" and $gambarIdentitas != "None") {
                                        ?>
                                            <label>Gambar Identitas Anda</label><br>
                                            <img src="<?= $gambarIdentitas ?>" style="height: 200px"><br>
                                            <label>Reupload Gambar</label><br>
                                            <input type="file" name="gambar_kartu_identitas" style="margin-bottom: 20px"><br>
                                        <?php
                                        } else {
                                        ?>
                                            <label>Gambar Identitas Anda</label><br>
                                            <img src="<?= $gambarIdentitas ?>" style="height: 200px">
                                        <?php
                                        }
                                        ?>
                                        <button type="submit" class="btn btn-success" name="submit">Edit Profile</button>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['submit'])) {
                                $nama = $_POST['nama'];
                                $alamat = $_POST['alamat'];
                                $no_telpon = $_POST['no_telpon'];
                                $namafolder = "assets/img/identitas/";
                                $image = $_FILES['gambar_kartu_identitas']['name'];
                                if ($image == "") {
                                    $queryUpdate = "UPDATE user SET nama = '$nama',alamat = '$alamat',no_telpon = '$no_telpon' where id_user = '$id_user'";
                                } elseif ($image != "" and $gambarIdentitas == "None") {
                                    $nama_file = $namafolder . date('dmYHis') . $image;
                                    move_uploaded_file($_FILES["gambar_kartu_identitas"]["tmp_name"], $nama_file);
                                    $queryUpdate = "UPDATE user SET nama = '$nama',alamat = '$alamat',no_telpon = '$no_telpon',gambar_kartu_identitas = '$nama_file' where id_user = '$id_user'";
                                } elseif ($image != "" and $gambarIdentitas != "None") {
                                    unlink($gambarIdentitas);
                                    $nama_file = $namafolder . date('dmYHis') . $image;
                                    move_uploaded_file($_FILES["gambar_kartu_identitas"]["tmp_name"], $nama_file);
                                    $queryUpdate = "UPDATE user SET nama = '$nama',alamat = '$alamat',no_telpon = '$no_telpon',gambar_kartu_identitas = '$nama_file' where id_user = '$id_user'";
                                }
                                if (mysqli_query($connect, $queryUpdate)) {
                            ?>
                                    <script>
                                        alert('Success Mengedit Profil');
                                        window.location = 'profil-user.php';
                                    </script>
                                <?php
                                } else {
                                ?>
                                    <script>
                                        alert('Error Edit');
                                        window.location = 'profil-user.php';
                                    </script>
                            <?php
                                }
                            }
                        }
                    } else {
                        $queryGetProfile = "SELECT * FROM user where id_user = $id_user";
                        $executeProfile = mysqli_query($connect, $queryGetProfile);
                        while ($profile = mysqli_fetch_array($executeProfile)) {
                            ?>
                            <div class="card">
                                <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
                                    Profile
                                </div>
                                <div class="card-body">
                                    <label class="label-profil">Nama : </label>
                                    <?= $profile['nama'] ?><br>
                                    <label class="label-profil">Email : </label>
                                    <?= $profile['email'] ?><br>
                                    <label class="label-profil">Username : </label>
                                    <?= $profile['username'] ?><br>
                                    <label class="label-profil">Alamat : </label>
                                    <?= $profile['alamat'] ?><br>
                                    <label class="label-profil">Nomer Telfon : </label>
                                    <?= $profile['no_telpon'] ?><br>
                                    <label class="label-profil">Jenis Kelamin : </label>
                                    <?= $profile['jenis_kelamin'] ?><br>
                                    <label class="label-profil">Status User : </label>
                                    <b><?= $profile['status_user'] ?></b><br>
                                    <label class="label-profil">Gambar Kartu Identitas : </label><br>
                                    <?php
                                    if ($profile['gambar_kartu_identitas'] == "None") {
                                    ?>
                                        Anda Belum Mengupload Gambar Identitas, silahkan Klik Edit Profile. <br>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= $profile['gambar_kartu_identitas'] ?>">Klik Disini Untuk Melihat Gambar Identitas Anda</a><br><br>
                                    <?php
                                    }
                                    ?>
                                    <a href="profil-user.php?menu=edit_profil" class="btn btn-success">Edit Profile</a>
                                </div>
                        <?php
                        }
                    }
                        ?>
                            </div>
                    </div>
            </div>
        </div>
    <?php
    include 'footer.php';
} else {
    ?>
        <script>
            window.location = 'login-user.php';
        </script>
    <?php
}
    ?>

    <?php
    ?>