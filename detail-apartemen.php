<?php
include 'connection.php';
session_start();
$id_apartemen = $_GET['id_apartemen'];
if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php';
} else {
    include 'header-guest.php';
}
$query = "SELECT * FROM apartemen WHERE id_apartemen = $id_apartemen";
$executeQuery = mysqli_query($connect, $query);
?>
<div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
    <div class="row">
        <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
            <?php
            while ($apartemen = mysqli_fetch_array($executeQuery)) {
                $idApartemen = $apartemen['id_apartemen'];
            ?>
                <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px"><?= $apartemen['nama_apartemen'] ?> Apartement</span>
                <div class="card-body" style="font-size: 18px">
                    <div class="card-body">
                        <center>
                            <img style="width:286px;margin-bottom: 15px" src="<?= $apartemen['gambar_apartemen'] ?>" alt="Card image cap">
                        </center>
                        <center>
                            <h5 class="card-title">"Gambar <?= $apartemen['nama_apartemen'] ?> Apartement"</h5>
                        </center>
                        <p class="card-text">
                            <label for=""><b>Alamat Apartemen : </b></label>
                            <?= $apartemen['alamat_apartemen']; ?>
                        </p>
                        <p class="card-text">
                            <label for=""><b>Kota / Kabupaten :</b></label>
                            <?= $apartemen['kota_kabupaten']; ?>
                        </p>
                        <p class="card-text">
                            <label for=""><b>Provinsi :</b></label>
                            <?= $apartemen['provinsi']; ?>
                        </p>
                        <p class="card-text">
                            <label for=""><b>Link GMaps :</b></label>
                            <a target="_blank" style="text-decoration: none" href="<?= $apartemen['maps_link']; ?>">Klik Disini</a>
                        </p>
                        <p class="card-text">
                            <label><b>
                                    <h3>
                                        <center>Kumpulan Ruangan dari Apartemen ini</center>
                                    </h3>
                                </b></label>
                        </p><br>
                        <?php
                        $queryGetAllRuanganById = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen where ruangan_apartemen.id_apartemen = '$idApartemen'";
                        $resultRuangan = mysqli_query($connect, $queryGetAllRuanganById);
                        while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
                        ?>
                            <div class="card" onclick="location.href='detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 18rem;display:inline-block">
                                <img style="width:286px;height:180px" src="<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</h5>
                                    <p class="card-text"><a style="text-decoration: none;" href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>"><?= $ruanganApartemen['nama'] ?> Room</a><br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
                                    <a href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                <?php

            }

                ?>
                </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
?>