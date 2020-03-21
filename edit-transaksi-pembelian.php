<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_pengelola = $_SESSION['id_pengelola'];
    $transaksi_beli = $_GET['id_transaksi_pembelian'];
    include 'header-pengelola-dashboard.php';
    $queryGetTransaksi = "SELECT * FROM transaksi_pembelian tp JOIN user u ON tp.id_user = u.id_user where id_transaksi_pembelian = $transaksi_beli";
    $executeQueryTransaksi = mysqli_query($connect, $queryGetTransaksi);
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
                <br>
                <p class="h4" style="text-align: center">Edit Transaksi Pembelian</p>
                <div class="card-body">
                    <style>
                        label {
                            margin-top: 10px;
                        }
                    </style>
                    <?php
                    while ($transaksi = mysqli_fetch_array($executeQueryTransaksi)) {
                        if ($transaksi['status_pemesanan'] == "Berhasil Verifikasi") {
                    ?>
                            <script>
                                window.location = 'transaksi-pembelian-pengelola.php';
                            </script>
                        <?php
                        } else {
                            $tanggal_transaksi = $transaksi['tanggal_transaksi'];
                            $formatTanggalTransaksi = date("d-m-Y", strtotime($tanggal_transaksi));
                            $JatuhTempo = date('Y-m-d', strtotime($tanggal_transaksi . "+3 days"));
                            $formatJatuhTempo = date("d-m-Y", strtotime($JatuhTempo));
                        ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label><b>Nama Pembeli: </b></label> <?= $transaksi['nama'] ?><br>
                                    <label><b>Tanggal Transaksi: </b></label> <?= $formatTanggalTransaksi ?><br>
                                    <label><b>Tanggal Jatuh Tempo: </b></label> <?= $formatJatuhTempo ?><br>
                                    <label><b>Kode Transaksi :</b></label> <?= $transaksi['kode_transaksi'] ?><br>
                                    <label><b>Total Harga :</b></label> Rp. <?= number_format($transaksi['total_harga'], 0, ',', '.');; ?><br>
                                    <label><b>Gambar Bukti Transfer: </b></label><br>
                                    <?php
                                    $gambar = $transaksi['gambar_bukti_transfer'];
                                    if ($gambar == "None") {
                                    ?>
                                        <span>Calon Pembeli Belum Mengupload Bukti Transfer</span><br>
                                    <?php
                                    } else {
                                    ?>
                                        <center>
                                            <img class="zoom" src="<?= $gambar ?>" style="height: 300px"><br>
                                            <small>*Arahkan Cursor untuk Zoom</small>
                                        </center>
                                    <?php
                                    }
                                    ?>
                                    <label><b>Status Transaksi Saat Ini : <span style="background-color: yellow"><?= $transaksi['status_pemesanan'] ?></span> </b></label><br>
                                    <select class="form-control" name="status_pemesanan" id="status_pemesanan">
                                        <option value="<?= $transaksi['status_pemesanan'] ?>" selected>Pilih Status Transaksi</option>
                                        <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                                        <option value="Verifikasi Ditolak">Tolak Verifikasi</option>
                                        <option value="Berhasil Verifikasi">Berhasil Verifikasi</option>
                                    </select>
                                    <label><b>Beri Pesan untuk Pembeli :</b></label>
                                    <textarea id="txtArea" class="form-control" name="pesan_pengelola" rows="6" value="<?= $transaksi['pesan_pengelola'] ?>" placeholder="Biarkan kosong jika anda tidak ingin memberi pesan."></textarea>

                                </div>
                                <a href="transaksi-pembelian-pengelola.php" class="btn btn-primary">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-success float-right">Edit Transaksi Pembelian</button><br><br>
                            </form>
                </div>
        <?php
                        }
                    }
        ?>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
    <?php
    if (isset($_POST['submit'])) {
        $status = $_POST['status_pemesanan'];
        if ($status == "Berhasil Verifikasi") {
            $pesan = "Terimakasih, pembayaran sudah berhasil terverifikasi. Anda akan segera mendapatkan akses ke Ruang Apartemen Anda.";
        } else {
            $pesan = $_POST['pesan_pengelola'];
        }
        if ($pesan != "") {
            $queryUpdate = "UPDATE transaksi_pembelian SET status_pemesanan = '$status', pesan_pengelola = '$pesan' WHERE id_transaksi_pembelian = '$transaksi_beli'";
        } else {
            $queryUpdate = "UPDATE transaksi_pembelian SET status_pemesanan = '$status' WHERE id_transaksi_pembelian = '$transaksi_beli'";
        }
        if (mysqli_query($connect, $queryUpdate)) {
    ?>
            <script>
                alert('Success Mengedit Transaksi');
                window.location = 'transaksi-pembelian-pengelola.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Error Update Data');
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