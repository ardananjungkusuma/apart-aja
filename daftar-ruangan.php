<?php
include 'connection.php';
session_start();

if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php'; ?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row" style="margin-top: 80px;">
            <div class="col-lg-12" style="margin: 0 auto;">
                <form action="" method="POST">
                    <div class="form-group row mt-2">
                        <div class="col-sm-5">
                            <input type="text" name="keyword" class="form-control" id="" placeholder="Cari berdasarkan nama / kota">
                        </div>
                        <button type="submit" class="btn btn-sm btn-success" name="cari">Cari Sekarang</button>
                    </div>
                </form>
                <?php
                if (isset($_POST["cari"])) {
                    $search = $_POST['keyword'];
                    $queryGetAllRuangan = "select * from ruangan_apartemen ra left join apartemen a on a.id_apartemen = ra.id_apartemen where ra.nama like '%$search%' or a.kota_kabupaten like '%$search%'";
                } else {
                    if (!empty($_GET["kategori"])) {
                        $kategorinya = $_GET["kategori"];
                        if ($kategorinya == 1) {
                            $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.jenis_ruangan = 'Single Suite'";
                        } elseif ($kategorinya == 2) {
                            $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.jenis_ruangan = 'Mini Suite'";
                        } elseif ($kategorinya == 3) {
                            $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.jenis_ruangan = 'Luxury Suite'";
                        }
                    } else {
                        $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen";
                    }
                }
                $resultRuangan = mysqli_query($connect, $queryGetAllRuangan);
                while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
                ?>
                    <div class="card" onclick="location.href='detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 287px;display:inline-block;margin-left:5px;margin-right: 5px;margin-top: 15px;">
                        <a href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" style="text-decoration: none; color:black">
                            <img style="width:287px;height:180px" src="<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 20px;"><?= $ruanganApartemen['nama'] ?> Room</h5>
                        </a>
                        <p class="card-text" style="font-size: 15px">&diams; <a href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" style="text-decoration: none;color:black"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a> &diams;<br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
                        <a href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                    </div>
            </div>
        <?php
                }
        ?>
        </div>
    </div>
    </div>
<?php
} else {
    include 'header-guest.php';
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row" style="margin-top: 80px;">
            <div class="col-lg-12" style="margin: 0 auto;">
                <form action="" method="POST">
                    <div class="form-group row mt-2">
                        <div class="col-sm-5">
                            <input type="text" name="keyword" class="form-control" id="" placeholder="Cari berdasarkan nama / kota">
                        </div>
                        <button type="submit" class="btn btn-sm btn-success" name="cari">Cari Sekarang</button>
                    </div>
                </form>
                <?php
                if (isset($_POST["cari"])) {
                    $search = $_POST['keyword'];
                    $queryGetAllRuangan = "select * from ruangan_apartemen ra left join apartemen a on a.id_apartemen = ra.id_apartemen where ra.nama like '%$search%' or a.kota_kabupaten like '%$search%'";
                } else {
                    if (!empty($_GET["kategori"])) {
                        $kategorinya = $_GET["kategori"];
                        if ($kategorinya == 1) {
                            $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.jenis_ruangan = 'Single Suite'";
                        } elseif ($kategorinya == 2) {
                            $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.jenis_ruangan = 'Mini Suite'";
                        } elseif ($kategorinya == 3) {
                            $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.jenis_ruangan = 'Luxury Suite'";
                        }
                    } else {
                        $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen";
                    }
                }
                $resultRuangan = mysqli_query($connect, $queryGetAllRuangan);
                while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
                ?>
                    <div class="card" onclick="location.href='detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 287px;display:inline-block;margin-left:5px;margin-right: 5px;margin-top: 15px;">
                        <a href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" style="text-decoration: none; color:black">
                            <img style="width:287px;height:180px" src="<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 20px;"><?= $ruanganApartemen['nama'] ?> Room</h5>
                        </a>
                        <p class="card-text" style="font-size: 15px">&diams; <a href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" style="text-decoration: none;color:black"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a> &diams;<br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
                        <a href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                    </div>


            </div>
        <?php
                }
        ?>
        </div>
    </div>
    </div>
<?php
}
?>

<?php
include 'footer.php';
?>