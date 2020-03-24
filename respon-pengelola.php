<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    include 'header-pengelola-dashboard.php';
    $idKS = $_POST['idKS'];
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
                <br>
                <p class="h4" style="text-align: center">Kirim Respon ke Penghuni</p>
                <div class="card-body">
                    <style>
                        label {
                            margin-top: 10px;
                            font-weight: bold;
                        }
                    </style>
                    <?php
                    $queryGetKS = "SELECT * FROM kritik_saran ks JOIN user u on ks.id_user = u.id_user JOIN apartemen a on ks.id_apartemen = a.id_apartemen 
                    WHERE id_kritik_saran = $idKS";
                    $executeGetKS = mysqli_query($connect, $queryGetKS);
                    while ($ks = mysqli_fetch_array($executeGetKS)) {
                    ?>
                        <label>Nama Apartemen : </label>
                        <?= $ks['nama_apartemen'] ?><br>
                        <label>Nama Pengirim : </label>
                        <?= $ks['nama'] ?><br>
                        <label>Isi Kritik & Saran : </label><br>
                        <?= $ks['isi_kritik_saran'] ?><br>
                        <label>Tanggal Masuk : </label>
                        <?= $ks['tanggal_masuk'] ?><br>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kirim Pesan Balasan</label>
                                <input type="hidden" value="<?= $ks['id_kritik_saran'] ?>" name="id_kritik_saran">
                                <textarea id="txtArea" class="form-control" name="respon_pengelola" rows="3" placeholder="Contoh : Baik akan segera kami perbaiki AC nya"></textarea><br>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary float-right">Kirim Response</button><br><br>
                        </form>
                </div>
                <?php
                    }
                    if (isset($_POST['submit'])) {
                        $idkritiksaran = $_POST['id_kritik_saran'];
                        $isiPesan = $_POST['respon_pengelola'];
                        $queryUpdateKS = "UPDATE kritik_saran SET respon_pengelola = '$isiPesan' WHERE id_kritik_saran = '$idkritiksaran'";
                        if (mysqli_query($connect, $queryUpdateKS)) {
                ?>
                    <script>
                        alert('Pesan Response Sudah Terkirim');
                        window.location = 'transaksi-pembelian-pengelola.php';
                    </script>
                <?php
                        } else {
                ?>
                    <script>
                        alert('Error mengirim Pesan Response');
                        window.location = 'transaksi-pembelian-pengelola.php';
                    </script>
            <?php
                        }
                    }
            ?>
            </div>
        </div>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
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