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
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-lg-11" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Ruangan Apartemen Anda</h3>
                <?php
                $queryGetAllRuanganById = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.id_pengelola = '$id_username'";
                $resultRuangan = mysqli_query($connect, $queryGetAllRuanganById);
                while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
                ?>
                    <div class="card" onclick="location.href='detail-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 18rem;display:inline-block">
                        <img style="width:287px;height:180px" src="<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ruanganApartemen['nama'] ?> Room</h5>
                            <p class="card-text"><a href="detail-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a><br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
                            <a href="detail-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                            <a href="edit-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-success">Edit</a>
                            <a href="galeri-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-info">Galeri</a>
                            <a href="hapus-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" style="margin-top: 10px" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus Apartemen ini?')">Hapus</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
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

</html>