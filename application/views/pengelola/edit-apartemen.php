<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Edit Apartemen</p>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <?php
                foreach ($apartemenDetail as $row) {
                ?>
                    <form method="POST" action="<?= base_url() ?>apartemen/prosesEditApartemenAnda" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" id="id_apartemen" name="id_apartemen" value="<?= $row['id_apartemen'] ?>" required>
                            <label>Nama Apartemen</label>
                            <input type="text" id="nama_apartemen" name="nama_apartemen" class="form-control mb-2" placeholder="Nama" value="<?= $row['nama_apartemen'] ?>" required>
                            <label>Alamat Apartemen</label>
                            <input type="text" id="alamat_apartemen" name="alamat_apartemen" class="form-control mb-2" placeholder="Alamat" value="<?= $row['alamat_apartemen'] ?>" required>
                            <label>Kabupaten / Kota Apartemen </label>
                            <input type=" text" id="kota" name="kota_kabupaten" class="form-control mb-2" placeholder="Kab/Kota" value="<?= $row['kota_kabupaten'] ?>" required>
                            <label>Provinsi</label>
                            <input type=" text" id="provinsi" name="provinsi" class="form-control mb-2" placeholder="Provinsi" value="<?= $row['provinsi'] ?>" required>
                            <label>Gambar Depan Apartement</label><br>
                            <img src="<?= base_url() ?>assets/img/gambar_apartemen/<?= $row['gambar_apartemen'] ?>" width="150px;">
                            <div class=" file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span>Choose Image</span>
                                    <input type="file" name="gambar" id="gambar">
                                </div>
                            </div>
                            <label style="margin-top: 15px">Link Google Maps</label><br>
                            <input type="text" id="maps_link" value="<?= $row['maps_link'] ?>" name="maps_link" class="form-control mb-2" placeholder="https://goo.gl/maps/oY8TDJzL5JcQvgu17">
                            <small>*Tidak Wajib Diisi</small>
                        </div>
                        <a href="<?= base_url() ?>apartemen/listApartemen" class="btn btn-primary float-left">Kembali</a>
                        <button type="submit" name="submit" class="btn btn-info float-right">Edit Data Apartemen</button><br><br>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>