<?php
include 'header-guest.php';
include 'connection.php';
?>
<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row" style="margin-top: 80px;">
        <div class="col-lg-11" style="margin: 0 auto;">
            <?php
            $queryGetAllRuangan = "select * from ruangan_apartemen left join apartemen on apartemen.id_apartemen = ruangan_apartemen.id_apartemen";
            $resultRuangan = mysqli_query($connect, $queryGetAllRuangan);
            while ($ruanganApartemen = mysqli_fetch_array($resultRuangan)) {
            ?>
                <div class="card" style="width: 287px;display:inline-block;margin-left:5px;margin-right: 5px;">
                    <a href="detail-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>" style="text-decoration: none; color:black">
                        <img style="width:287px;height:180px" src="<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">

                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 20px;"><?= $ruanganApartemen['nama'] ?> Room</h5>
                    </a>
                    <p class="card-text" style="font-size: 15px">&diams; <a href="detail-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>" style="text-decoration: none;color:black"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a> &diams;<br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_sewa'], 0, ',', '.');; ?>/Bulan</p>
                    <a href="edit-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-success">Edit</a>
                    <a href="detail-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                </div>

        </div>
    <?php
            }
    ?>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>