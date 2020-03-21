<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_pengelola = $_SESSION['id_pengelola'];
    include 'header-pengelola-dashboard.php';
    $queryGetInfoUser = "select * from pengelola_apartemen where username = '$usernameOrEmailNow'";
    $resultProfile = mysqli_query($connect, $queryGetInfoUser);
    while ($user = mysqli_fetch_array($resultProfile)) {
        $id_username = $user['id_pengelola'];
    }
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-lg-12" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Transaksi Pembelian Apartemen</h3>
                <table class="table table-hover" id="listTransaksiPembelian">
                    <thead style="background-color: #343a40;color:white">
                        <tr>
                            <td>Nama Pembeli</td>
                            <td>Tanggal Transaksi</td>
                            <td>Tanggal Jatuh Tempo</td>
                            <td>Status Pembayaran</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryGetRuangan = "SELECT * FROM ruangan_apartemen where id_pengelola= $id_pengelola";
                        $executeGetRuangan = mysqli_query($connect, $queryGetRuangan);
                        while ($ruangan = mysqli_fetch_array($executeGetRuangan)) {
                            $idruang = $ruangan['id_ruangan'];
                            $queryGetBeli = "SELECT * FROM transaksi_pembelian tp JOIN user u on tp.id_user = u.id_user where id_ruangan = '$idruang'";
                            $executeQueryGetBeli = mysqli_query($connect, $queryGetBeli);
                            while ($tampil = mysqli_fetch_array($executeQueryGetBeli)) {
                                $tanggal_transaksi = $tampil['tanggal_transaksi'];
                                $formatTanggalTransaksi = date("d-m-Y", strtotime($tanggal_transaksi));
                                $JatuhTempo = date('Y-m-d', strtotime($tanggal_transaksi . "+3 days"));
                                $formatJatuhTempo = date("d-m-Y", strtotime($JatuhTempo));
                                $status_pemesananan = $tampil['status_pemesanan'];
                        ?>
                                <tr>
                                    <td><?= $tampil['nama'] ?></td>
                                    <td><?= $formatTanggalTransaksi ?></td>
                                    <td><?= $formatJatuhTempo ?></td>
                                    <td><?= $status_pemesananan  ?></td>
                                    <td>
                                        <?php
                                        if ($status_pemesananan == "Berhasil Verifikasi") {
                                        ?>
                                            <a href="detail-transaksi-pembelian.php?id_transaksi_pembelian=<?= $tampil['id_transaksi_pembelian'] ?>" class="badge badge-info">Detail Transaksi</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="edit-transaksi-pembelian.php?id_transaksi_pembelian=<?= $tampil['id_transaksi_pembelian'] ?>" class="badge badge-success">Edit Transaksi</a>
                                            <a href="detail-transaksi-pembelian.php?id_transaksi_pembelian=<?= $tampil['id_transaksi_pembelian'] ?>" class="badge badge-info">Detail Transaksi</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#listTransaksiPembelian').DataTable();

        });
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
<?php
} else { ?>
    <script>
        window.location = 'login-pengelola.php';
    </script>
<?php
}
?>

</html>