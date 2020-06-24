<div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
    <div class="row">
        <div class="col-md-12" style="margin-left:70px;margin-right:70px;">
            <?php
            foreach ($apart as $apartemen) {
                $idApartemen = $apartemen['id_apartemen'];
            ?>
                <span style="margin-top:20px;margin-bottom: 20px;font-size: 30px"><?= $apartemen['nama_apartemen'] ?> Apartement</span>
                <div class="card-body" style="font-size: 18px">
                    <div class="card-body">
                        <center>
                            <img style="width:286px;margin-bottom: 15px" src="<?= base_url() ?>assets/img/gambar_apartemen/<?= $apartemen['gambar_apartemen'] ?>" alt="Card image cap">
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
                        foreach ($ruanganapart as $ruanganApartemen) {
                        ?>
                            <div class="card" onclick="location.href='detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 18rem;display:inline-block;cursor: pointer">
                                <img style="width:286px;height:180px" src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</h4>
                                    <p class="card-text"><a style="text-decoration: none;" href="detail-ruang-apartemen.php?id_ruangan=<?= $ruanganApartemen['id_ruangan'] ?>"><?= $ruanganApartemen['nama_ruangan'] ?> Room</a><br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
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