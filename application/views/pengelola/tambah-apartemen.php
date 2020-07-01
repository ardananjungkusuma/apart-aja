<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Tambah Apartemen</p>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>apartemen/tambahApartemen">
                    <div class="form-group">
                        <label>Nama Apartemen</label>
                        <input type="text" id="nama_apartemen" name="nama_apartemen" class="form-control mb-2" placeholder="Nama" required>
                        <label>Alamat Apartemen</label>
                        <input type="text" id="alamat_apartemen" name="alamat_apartemen" class="form-control mb-2" placeholder="Alamat" required>
                        <label>Kabupaten / Kota Apartemen </label>
                        <input type="text" id="kota_kabupaten" name="kota_kabupaten" class="form-control mb-2" placeholder="Kab/Kota" required>
                        <label>Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" class="form-control mb-2" placeholder="Provinsi" required>
                        <label>Gambar Depan Apartement</label>
                        <div class="file-field">
                            <div class="btn btn-primary btn-sm float-left">
                                <span>Choose Image</span>
                                <input type="file" name="gambar" id="gambar" required>
                            </div>
                        </div>
                        <label style="margin-top: 15px">Link Google Maps</label><br>
                        <input type="text" id="maps_link" name="maps_link" class="form-control mb-2" placeholder="https://goo.gl/maps/oY8TDJzL5JcQvgu17">
                        <small>*Tidak Wajib Diisi</small>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Apartemen</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>