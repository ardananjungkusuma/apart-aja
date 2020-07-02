<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Tambah Rekening</p>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>pengelola/tambahRekening">
                    <div class="form-group">
                        <label>Nomer Rekening</label>
                        <input type="number" id="no_rek" name="no_rek" class="form-control mb-2" required>
                        <label>Masukan Nama Bank : </label>
                        <input type="text" id="nama_bank" name="nama_bank" class="form-control mb-2" required>
                        <small>*Contoh : BCA, Mandiri, BRI dll.</small><br>
                        <label>Nama Pemilik Rekening</label>
                        <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control mb-2" required>
                        <small>*Nama Pemegang Rekening</small><br>
                    </div>
                    <a href="<?= base_url() ?>pengelola/rekening" class="btn btn-primary float-left">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right" style="margin-bottom: 30px;">Tambah Rekening Anda</button>
                </form>
            </div>
        </div>
    </div>
</div>