<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-lg-11" style="margin: 0 auto;">
            <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Ruangan Apartemen Anda</h3>
            <?php
            if (!empty($ruanganApartemen)) {
                foreach ($ruanganApartemen as $ruanganApartemen) {
            ?>
                    <div class="card" onclick="location.href='detail-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 18rem;display:inline-block">
                        <img style="width:287px;height:180px" src="<?= base_url() . $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
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
            } else {
                ?>
                <h4 style="margin-top:20px;margin-bottom: 20px">Maaf Anda belum memiliki ruangan apartemen, silahkan tambah ruangan</h4>
            <?php
            }
            ?>
        </div>
    </div>
</div>