<?php
include 'connection.php';
session_start();
if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php';
    $id_ruangan = $_GET['id_ruangan'];
    $id_user = $_SESSION['idUsername'];
?>
    <div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
        <div class="row">
            <?php
            $queryDetailPembayaran = "select * from ruangan_apartemen ra JOIN apartemen a ON ra.id_apartemen = a.id_apartemen JOIN pengelola_apartemen pa ON ra.id_pengelola = pa.id_pengelola where ra.id_ruangan = '$id_ruangan'";
            $resultDetailPembayaran = mysqli_query($connect, $queryDetailPembayaran);
            while ($pembayaran = mysqli_fetch_array($resultDetailPembayaran)) {
                $id_pengelola = $pembayaran['id_pengelola'];
                $queryGetRekening = "SELECT * FROM rekening_bank where id_pengelola = '$id_pengelola'";
            ?>
                <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
                    <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px">Rincian Pembayaran Apartemen</span>
                    <hr>
                    <div class="card-body" style="font-size: 18px">
                        <?php
                        $randomNum = rand(1000, 9999);
                        $harga = $pembayaran['harga_beli'];
                        $priceCode = substr_replace($harga, $randomNum, -4);
                        ?>
                        <label for=""><b>Transfer Sejumlah : </b></label>
                        Rp. <?= number_format($priceCode, 0, ',', '.');; ?><br>
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
                        <label for="">Syarat dan Ketentuan : </label><br>
                        <small><b>1. Transfer sesuai nominal yang ada. Contoh : 500.008.912 (8912 adalah kode unik).<br>2. Pilih salah satu rekening yang tersedia untuk mentransfer Uang.<br>3. Pembayaran akan diverifikasi pengelola. <br>4. Lebih dari 3 hari tidak transfer dianggap hangus.</b></small><br>
                        <a href="daftar-ruangan.php" class="btn btn-danger" style="width: 230px;margin-top:20px">Batalkan Pembayaran</a>
                        <form action="" method="POST">
                            <input type="hidden" name="id_ruangan" value="<?php $id_ruangan ?>">
                            <input type="hidden" name="harga" value="<?php $ruangan['harga_beli'] ?>">
                            <button class="btn btn-success" type="submit" style="margin-top:10px;width:230px" name="submit">Lanjutkan Pembayaran</button>
                        </form>
                    </div>
                    <?php
                }
                if (isset($_POST['submit'])) {
                    $getDateNOw = date("Y-m-d");
                    $queryAddTransaksiPembelian = "INSERT INTO transaksi_pembelian(id_user,id_ruangan,kode_transaksi,total_harga,tanggal_transaksi) VALUES ('$id_user','$id_ruangan','$randomNum','$priceCode','$getDateNOw')";
                    if (mysqli_query($connect, $queryAddTransaksiPembelian)) {
                    ?>
                        <script>
                            alert('Success Melakukan Transaksi Pembelian');
                            window.location = 'profil-user.php';
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            alert('Error Melakukan Transaksi Pembelian');
                            window.location = 'daftar-ruangan.php';
                        </script>
                <?php
                    }
                    mysqli_close($connect);
                }
                ?>
                </div>
        </div>
    </div>
<?php
    include 'footer.php';
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