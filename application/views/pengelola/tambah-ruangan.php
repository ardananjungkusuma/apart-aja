<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Tambah Ruangan Apartemen</p>
            <?php
            if (empty($apartemenList)) { ?>
                <script>
                    alert("Maaf Anda Belum Menambahkan Apartemen, silahkan tambahkan apartemen dahulu")
                </script>
            <?php
                redirect('apartemen/tambahApartemen');
            }
            ?>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <form method="POST" action="<?= base_url() ?>ruangan/prosesTambahRuangan" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="apartemen">Apartemen</label>
                        <select class="form-control" name="id_apartemen" id="id_apartemen">
                            <option selected disabled>Pilih Apartemen</option>
                            <?php
                            foreach ($apartemenList as $rowGetApartemen) {
                            ?>
                                <option value="<?= $rowGetApartemen['id_apartemen'] ?>"><?= $rowGetApartemen['nama_apartemen'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="nama">Nama Ruangan</label>
                        <input type="text" class="form-control" name="nama_ruangan" placeholder="Masukkan Nama Ruangan">
                        <label for="nama">Jenis Ruangan</label>
                        <select class="form-control" name="jenis_ruangan" id="jenis_ruangan">
                            <option selected>Pilih Jenis Ruangan</option>
                            <option value="Single Suite">Single Suite</option>
                            <option value="Mini Suite">Mini Suite</option>
                            <option value="Luxury Suite">Luxury Suite</option>
                        </select>
                        <label>Upload Foto Utama Ruangan Apartemen</label>
                        <input required type="file" class="form-control-file" name="gambar_utama">
                        <small class="text-muted">Informasi Tentang Jenis Ruangan Baca <a href="">Disini</a></small><br>
                        <label for="harga_beli">Harga Apartemen</label>
                        <input type="number" class="form-control" name="harga_beli" placeholder="Masukan Harga Beli">
                        <small class="text-muted">Untuk Harga Menggunakan Satuan Rupiah</small><br>
                        <label for="sisa_ruang_apartemen">Jumlah Ruangan yang Tersedia</label>
                        <input type="number" class="form-control" name="sisa_ruang_apartemen" placeholder="10">
                        <label for="deskripsi">Detail Ruangan</label>
                        <textarea id="txtArea" onkeypress="onTestChange();" class="form-control" name="detail_ruangan" rows="6" placeholder="Deskripsi isi ruangan, fasilitas"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Ruangan Apartemen</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>