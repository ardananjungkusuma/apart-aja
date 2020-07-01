<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">
            <?php foreach ($ruanganApartemen as $ruangan) { ?>
                <h3 style="margin-top:20px;margin-bottom: 20px">Masukan Gambar dan Deskripsi Gambar untuk Ruangan <?= $ruangan['nama_ruangan'] ?></h3>
                <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>ruangan/prosesTambahGambarRuangan">
                    <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan'] ?>">
                <?php
            }
                ?>
                <label for="nama">Deskripsi Singkat Gambar :</label>
                <input type="text" class="form-control" name="deskripsi" placeholder="Kamar Mandi"><br>
                <label for="nama">Gambar</label><br>
                <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left">
                        <span>Choose Image</span>
                        <input type="file" name="gambar" id="gambar" required>
                    </div>
                </div><br><br>
                <button class="btn btn-success" type="submit" name="submit">Tambah Gambar Interior</button>
                <a href="<?= base_url() ?>ruangan/listRuangan" class="btn btn-primary">Kembali</a>
                </form>
        </div>
    </div>
</div>