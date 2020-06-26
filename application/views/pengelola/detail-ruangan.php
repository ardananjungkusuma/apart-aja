    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Detail Ruangan Apartemen</h3>
                <ul class="list-group">
                    <?php
                    foreach ($ruanganApartemen as $apartemen) {
                        $id_ruangan = $apartemen['id_ruangan'];
                    ?>

                        <div class="card-body">
                            <center>
                                <img src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $apartemen['gambar_utama'] ?>" style="width: 400px;border: 5px solid black;">
                            </center>
                            <h4 style="margin-top: 10px;" class="card-title"><?= $apartemen['nama_ruangan'] ?> Room</h4>
                            <p class="card-text">
                                <label for=""><b>Jenis Ruangan : </b></label>
                                <?= $apartemen['jenis_ruangan']; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Harga Beli :</b></label>
                                Rp. <?= number_format($apartemen['harga_beli'], 0, ',', '.');; ?>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Detail Ruangan : </b></label><br>
                                <span style="white-space: pre-line"><?= $apartemen['detail_ruangan']; ?></span>
                            </p>
                            <p class="card-text">
                                <label for=""><b>Sisa Ruangan :</b></label>
                                <?= $apartemen['sisa_ruang_apartemen']; ?>
                            </p>
                            <label for=""><b>Kumpulan Gambar Ruangan :</b></label><br>

                            <?php
                            if (!empty($gambarRuangan)) {

                                foreach ($gambarRuangan as $gambar) {
                            ?>
                                    <figure style="display: inline-block">
                                        <img class="card-img-top" id="myImg" style="width: 300px" src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $gambar['gambar'] ?>" alt="<?= $gambar['deskripsi_singkat'] ?>">
                                        <figcaption style="text-align: center">Gambar <?= $gambar['deskripsi_singkat'] ?></figcaption>
                                    </figure>
                                <?php
                                }
                                ?>
                                <br>
                                <a href="<?= base_url() ?>ruangan/galeriGambarRuangan/<?= $id_ruangan ?>" class="btn btn-info">Galeri</a>
                            <?php
                            } else { ?>
                                <h6 style="color:red;font-weight: bold;">Anda Belum Menambahkan Gambar</h6>
                                <a href="<?= base_url() ?>ruangan/tambahGambarRuangan/<?= $apartemen['id_ruangan'] ?>" class="btn btn-success">Tambah Gambar Sekarang!</a>
                            <?php
                            }
                            ?>
                            <a href="<?= base_url() ?>ruangan/listRuangan" class="btn btn-primary">Kembali</a>
                        </div>

                    <?php

                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>