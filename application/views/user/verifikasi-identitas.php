<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Upload Data Identitas
    </div>
    <div class="card-body">
        <?php
        if (!empty($this->session->flashdata('message'))) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('message') ?>
            </div>
        <?php
        }
        ?>
        <div class="alert alert-info" role="alert">
            <b>Aturan Upload Gambar :</b><br>
            1. Data Identitas Yang Dapat Diterima : KTP, SIM, Paspor<br>
            2. Data Identitas Wajib Jelas (Tidak Blur, Terpotong Dsb)<br>
            3. Ukuran Maksimal 3 Mb<br>
            4. Format Jpg/png<br>
        </div>
        Contoh Data Identitas Yang Benar : <br><br>
        <center>
            <img src="<?= base_url() ?>assets/img/identitas/kartu_identitas/example.jpg" style="width: 350px">
        </center>
        <br><br>
        Upload Data Identitas : <br>
        <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>user/verifikasi">
            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" required><br>
            <input type="file" name="gambar" style="margin-bottom: 20px" required><br>
            <button type="submit" class="btn btn-info" name="submit">Upload Gambar Identitas</button>
        </form>
    </div>
</div>