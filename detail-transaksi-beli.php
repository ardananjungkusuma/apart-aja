<?php

use phpDocumentor\Reflection\Location;

include 'connection.php';
session_start();
if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php';
    $id_transaksi_beli = $_GET['id_transaksi_beli'];
    $id_user = $_SESSION['idUsername'];
    $queryCheckTransaksi = "SELECT * FROM transaksi_pembelian tp JOIN ruangan_apartemen ra ON tp.id_ruangan = ra.id_ruangan where tp.id_transaksi_pembelian = $id_transaksi_beli";
    $executeCheck = mysqli_query($connect, $queryCheckTransaksi);
    while ($checkUser = mysqli_fetch_array($executeCheck)) {
        $idUserCheck = $checkUser['id_user'];
    }
    if ($id_user != $idUserCheck) {
        echo '<script>window.location.href = "profil-user.php";</script>';
    } else {
?>
        <div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
            <div class="alert alert-primary" role="alert">
                <span style="font-size: 20px;font-weight:bold;margin-bottom: 10px">Persyaratan dan Ketentuan : </span><br>
                <b>1. Transfer sesuai nominal yang ada. Contoh : 500.008.912 (8912 adalah kode unik).<br>2. Pilih salah satu rekening yang tersedia untuk mentransfer Uang.<br>3. Pembayaran akan diverifikasi pengelola. <br>4. Lebih dari Jatuh Tempo tidak transfer dianggap hangus.</b></<b><br>
            </div>
            <div class="row">

                <?php
                $queryTransaksiGet = "SELECT * FROM transaksi_pembelian tp JOIN ruangan_apartemen ra ON tp.id_ruangan = ra.id_ruangan where tp.id_transaksi_pembelian = $id_transaksi_beli";
                $executeTransaksiGet = mysqli_query($connect, $queryTransaksiGet);
                while ($transaksi_pembelian = mysqli_fetch_array($executeTransaksiGet)) {
                    $id_pengelola = $transaksi_pembelian['id_pengelola'];
                    $queryGetRekening = "SELECT * FROM rekening_bank WHERE id_pengelola = $id_pengelola";
                    $tanggal_transaksi = $transaksi_pembelian['tanggal_transaksi'];
                    $formatTanggalTransaksi = date("d-m-Y", strtotime($tanggal_transaksi));
                    $JatuhTempo = date('Y-m-d', strtotime($tanggal_transaksi . "+3 days"));
                    $formatJatuhTempo = date("d-m-Y", strtotime($JatuhTempo));
                ?>
                    <div class="col-lg-12" id="cetakLaporan">
                        <span style="margin-top:20px;margin-bottom: 20px;font-size: 25px;font-weight: bold;text-align: center">Rincian Transaksi Pembayaran</span>
                        <hr>
                        <label for=""><b>Nama Ruangan : </b></label>
                        <?= $transaksi_pembelian['nama'] ?><br>
                        <label for=""><b>Jenis Ruangan : </b></label>
                        <?= $transaksi_pembelian['jenis_ruangan'] ?><br>
                        <label for=""><b>Tanggal Transaksi : </b></label>
                        <?= $formatTanggalTransaksi ?><br>
                        <label for=""><b>Tanggal Jatuh Tempo : </b></label>
                        <?= $formatJatuhTempo ?><br>
                        <label for=""><b>Status Transaksi Pembelian : </b></label>
                        <?= $transaksi_pembelian['status_pemesanan'] ?><br>
                        <label for=""><b>Transfer Sejumlah : </b></label>
                        Rp. <?= number_format($transaksi_pembelian['total_harga'], 0, ',', '.');; ?><br>
                        <label for=""><b>Rekening Pengelola Apartemen : </b></label><br>
                        <?php
                        $resultDetailRekening = mysqli_query($connect, $queryGetRekening);
                        $no = 1;
                        while ($rek = mysqli_fetch_array($resultDetailRekening)) {
                        ?>
                            <?= $no ?>. <?= $rek['no_rek']; ?> - <?= $rek['nama_bank']; ?> - <?= $rek['nama_pemilik']; ?><br>
                        <?php
                            $no++;
                        }
                        ?>
                        <label for=""><b>Foto Bukti Transfer : </b></label><br>
                        <?php
                        if ($transaksi_pembelian['gambar_bukti_transfer'] == "None") {
                        ?>
                            <a href="profil-user.php?menu=upload_bukti_transfer&id_transaksi_pembelian=<?= $transaksi_pembelian['id_transaksi_pembelian'] ?>" style="text-decoration: none;">Upload Gambar</a>
                        <?php
                        } elseif ($transaksi_pembelian['status_pemesanan'] == "Verifikasi Ditolak") {
                        ?>
                            <img src="<?= $transaksi_pembelian['gambar_bukti_transfer'] ?>" style="height: 300px"><br>
                            <a href="profil-user.php?menu=upload_bukti_transfer&id_transaksi_pembelian=<?= $transaksi_pembelian['id_transaksi_pembelian'] ?>" style="text-decoration: none;">Reupload Gambar</a>
                        <?php
                        } else {
                        ?>
                            <img src="<?= $transaksi_pembelian['gambar_bukti_transfer'] ?>" style="height: 300px"><br>
                        <?php
                        }
                        ?>

                    </div>
                    <a href="profil-user.php?menu=transaksi_pembelian" class="btn btn-primary" style="height:40px;margin-top:20px;margin-right:30px;">Back to Profile</a>
                    <input type="button" style="margin-top:20px" class="btn btn-info" onclick="printDiv('cetakLaporan')" value="Cetak Laporan" />
                    <script>
                        function printDiv(divName) {
                            var printContents = document.getElementById(divName).innerHTML;
                            var originalContents = document.body.innerHTML;

                            document.body.innerHTML = printContents;

                            window.print();

                            document.body.innerHTML = originalContents;
                        }
                    </script>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
        include 'footer.php';
    }
} else { ?>
    <script>
        window.location = 'login-user.php';
    </script>
<?php
}
?>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>