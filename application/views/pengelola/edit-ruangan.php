<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Edit Ruangan Apartemen</p>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <?php
                foreach ($ruanganApartemen as $row) {
                    $gambar = $row['gambar_utama']
                ?>
                    <form method="POST" action="<?= base_url() ?>ruangan/prosesEditRuangan" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Ruangan</label>
                            <input type="hidden" id="id_ruangan" name="id_ruangan" class="form-control mb-2" placeholder="Nama" value="<?= $row['id_ruangan'] ?>" required>
                            <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control mb-2" placeholder="Nama" value="<?= $row['nama_ruangan'] ?>" required>
                            <label>Jenis Ruangan</label>
                            <select class="form-control" name="jenis_ruangan" id="jenis_ruangan" required>
                                <option selected value="<?= $row['jenis_ruangan'] ?>">Jenis Saat Ini <?= $row['jenis_ruangan'] ?></option>
                                <option value="Single Suite">Single Suite</option>
                                <option value="Mini Suite">Mini Suite</option>
                                <option value="Luxury Suite">Luxury Suite</option>
                            </select>
                            <label>Harga Beli</label>
                            <input type=" number" id="harga_beli" name="harga_beli" class="form-control mb-2" placeholder="Harga Beli" value="<?= $row['harga_beli'] ?>" required>
                            <label>Detail Ruangan</label>
                            <textarea id="txtArea" onkeypress="onTestChange();" class="form-control" name="detail_ruangan" rows="6" placeholder="Deskripsi isi ruangan, fasilitas"><?= $row['detail_ruangan'] ?></textarea>
                            <label>Sisa Ruangan</label>
                            <input type=" number" id="sisa_ruang_apartemen" name="sisa_ruang_apartemen" class="form-control mb-2" placeholder="Sisa Ruangan" value="<?= $row['sisa_ruang_apartemen'] ?>" required>
                            <label>Gambar Cover Ruangan Apartemen Saat Ini</label><br>
                            <img src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $row['gambar_utama'] ?>" width="350px;" style="margin-bottom: 15px;">
                            <div class=" file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Image</span>
                                    <input type="file" name="gambar" id="gambar">
                                </div><br><br>
                            </div>
                        </div>
                    <?php
                }
                    ?>
                    <a href="<?= base_url() ?>ruangan/listRuangan" class="btn btn-primary float-left">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-info float-right">Edit Data</button><br><br>
                    </form>
            </div>
        </div>
    </div>
</div>