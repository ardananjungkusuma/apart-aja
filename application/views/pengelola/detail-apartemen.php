<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">
            <h3 style="margin-top:20px;margin-bottom: 20px">Detail Apartemen</h3>
            <a href="<?= base_url() ?>apartemen/listApartemen" class="btn btn-primary">Kembali</a>
            <ul class="list-group">
                <?php
                foreach ($apartemendetail as $apartemen) {
                    $idApartemen = $apartemen['id_apartemen'];
                ?>
                    <div class="card-body">
                        <center>
                            <img style="width:286px;margin-bottom: 15px" src="<?= base_url() ?>assets/img/gambar_apartemen/<?= $apartemen['gambar_apartemen'] ?>" alt="Card image cap">
                        </center>
                        <center>
                            <h5 class="card-title">"<?= $apartemen['nama_apartemen'] ?> Apartement"</h5>
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
                            <a target="_blank" href="<?= $apartemen['maps_link']; ?>">Klik Disini</a>
                        </p>
                        <p class="card-text">
                            <label><b>
                                    <h4>
                                        <center>Kumpulan Ruangan dari Apartemen ini</center>
                                    </h4>
                                </b></label>
                        </p><br>
                        <?php
                        if (!empty($ruanganapartemen)) {
                            foreach ($ruanganapartemen as $ruanganApartemen) {
                        ?>
                                <div class="card" onclick="location.href='<?= base_url() ?>ruangan/detailRuanganAnda/<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 18rem;display:inline-block;cursor: pointer">
                                    <img style="width:286px;height:180px" src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $ruanganApartemen['nama_ruangan'] ?> Room</h5>
                                        <p class="card-text"><a href="detail-apartemen-anda.php?id_apartemen=<?= $ruanganApartemen['id_apartemen'] ?>"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a><br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
                                        <a href="detail-ruang-apartemen-anda.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "Maaf anda belum menambahkan ruangan pada apartemen ini";
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>