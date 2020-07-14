<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12" style="margin: 0 auto;">
            <h2 style="margin-bottom: 20px;">Verifikasi Pengelola</h2>
            <hr>
            <?php
            foreach ($pengelola as $p) {
            ?>
                <h5>
                    Nama Lengkap : <?= $p['nama'] ?><br>
                    Jenis Kelamin : <?= $p['jenis_kelamin'] ?><br>
                    <img src="<?= base_url() ?>assets/img/identitas/kartu_identitas/<?= $p['gambar_identitas'] ?>" alt="Gambar Identitas" style="margin-top: 20px;width:400px">
                    <img src="<?= base_url() ?>assets/img/identitas/kyc_identitas/<?= $p['kyc_identitas'] ?>" alt="Gambar KYC" style="margin-top: 20px;width:400px">
                </h5>
            <?php
            }
            ?>
            <form action="<?= base_url() ?>admin/prosesVerifikasiPengelola" method="POST">
                <h5>Pilih Aksi : </h5>
                <input type="hidden" name="id_pengelola" value="<?= $p['id_pengelola'] ?>" required>
                <select name="status_pengelola" id="status_pengelola" class="form-control" required>
                    <option value="<?= $p['status_pengelola'] ?>" selected><?= $p['status_pengelola'] ?></option>
                    <option value="Terverifikasi">Verifikasi Diterima</option>
                    <option value="Verifikasi Ditolak">Verifikasi Ditolak</option>
                </select><br>
                <button type="submit" class="btn btn-primary">Verifikasi Pengelola</button>
            </form>
        </div>
    </div>
</div>