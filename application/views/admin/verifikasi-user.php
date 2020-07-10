<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12" style="margin: 0 auto;">
            <h2 style="margin-bottom: 20px;">Verifikasi User</h2>
            <hr>
            <?php
            foreach ($usr as $u) {
            ?>
                <h5>
                    Nama Lengkap : <?= $u['nama'] ?><br>
                    Alamat : <?= $u['alamat'] ?><br>
                    Jenis Kelamin : <?= $u['jenis_kelamin'] ?><br>
                    <img src="<?= base_url() ?>assets/img/identitas/kartu_identitas/<?= $u['gambar_kartu_identitas'] ?>" alt="Gambar Identitas" style="margin-top: 20px;width:400px">
                </h5>
            <?php
            }
            ?>
            <form action="<?= base_url() ?>admin/prosesVerifikasiUser" method="POST">
                <h5>Pilih Aksi : </h5>
                <input type="hidden" name="id_user" value="<?= $u['id_user'] ?>" required>
                <select name="status_user" id="status_user" class="form-control" required>
                    <option value="<?= $u['status_user'] ?>" selected><?= $u['status_user'] ?></option>
                    <option value="Terverifikasi">Verifikasi Diterima</option>
                    <option value="Verifikasi Ditolak">Verifikasi Ditolak</option>
                </select><br>
                <button type="submit" class="btn btn-primary">Verifikasi User</button>
            </form>
        </div>
    </div>
</div>