<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-8" style="margin:auto">
            <h3>Verifikasi Identitas</h3>
            <?php
            if (!empty($this->session->flashdata('error'))) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php
            }
            ?>
            <div class="alert alert-info" role="alert">
                <b>Aturan Upload Gambar :</b><br>
                1. Data Identitas Yang Dapat Diterima : KTP, SIM, Paspor<br>
                2. Data Identitas Wajib Jelas (Tidak Blur, Terpotong Dsb)<br>
                3. Ukuran Maksimal 3 Mb<br>
                4. Format jpg/png<br>
            </div>
            <b>Contoh Pengumpulan Data Yang Benar : </b><br><br>
            <center>
                <figure>
                    <img src="<?= base_url() ?>assets/img/identitas/kartu_identitas/example.jpg" style="width: 350px">
                    <figcaption>Kartu Identitas</figcaption>
                </figure>
                <figure>
                    <img src="<?= base_url() ?>assets/img/identitas/kyc_identitas/example-kyc.jpg" style="width: 600px">
                    <figcaption>Foto Bersama Kartu Identitas</figcaption>
                </figure>
            </center>
            <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>pengelola/verifikasi">
                <input type="hidden" name="id_pengelola" value="<?= $this->session->userdata('id_pengelola') ?>" required><br>
                Upload Kartu Data Identitas : <br>
                <input type="file" name="identitas" style="margin-bottom: 20px" required><br>
                Upload Foto Bersama Identitas : <br>
                <input type="file" name="kyc" style="margin-bottom: 20px" required><br>
                <button type="submit" class="btn btn-info" name="submit">Upload Gambar Identitas</button>
            </form>
        </div>
    </div>
</div>