<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <?php
        foreach ($profile as $profile) {
        ?>
            <div class="col-md-8" style="margin: 0 auto;">
                <?= $this->session->flashdata('message') ?>
                <center>
                    <h2>Profile Anda</h2>
                    <hr>
                </center>
                <?php
                if ($profile['status_pengelola'] == "Belum Terverifikasi") {
                ?>
                    <div class="alert alert-info">Anda harus melakukan verifikasi agar bisa menambahkan dan mulai menjual Apartemen. Proses verifikasi biasanya memakan waktu 1-2 hari kerja.</div>
                <?php
                }
                ?>
                <span style="font-size: 20px">
                    <b>Nama</b> : <?= $profile['nama'] ?><br>
                    <b> Nomer Telepon</b> : <?= $profile['no_telpon'] ?><br>
                    <b> Jenis Kelamin</b> : <?= $profile['jenis_kelamin'] ?><br>
                    <b> Email</b> : <?= $profile['email'] ?><br>
                    <b> Username</b> : <?= $profile['username'] ?><br>
                    <b> Status</b> : <?= $profile['status_pengelola'] ?><br>
                    <b> Rekening Anda</b> : <br>
                    <?php
                    if (!empty($rekening)) {
                        $no = 1;
                        foreach ($rekening as $rekening) {
                    ?>
                            <h5><?= $no ?>. <?= $rekening['no_rek'] ?>-<?= $rekening['nama_bank'] ?></h5>
                        <?php
                            $no++;
                        }
                    } else {
                        ?>
                        Maaf Anda Belum Menambah Daftar Rekening.<br>
                    <?php
                    }
                }
                if ($profile['gambar_identitas'] != 'None' and $profile['kyc_identitas'] != 'None') {
                    ?>
                    <b> Gambar Identitas Anda</b> :<br>
                    <img class="rounded mx-auto d-block" src="<?= base_url() ?>assets/img/identitas/kartu_identitas/<?= $profile['gambar_identitas'] ?>" alt="Gambar Identitas">
                    <img class="rounded mx-auto d-block" src="<?= base_url() ?>assets/img/identitas/kyc_identitas/<?= $profile['kyc_identitas'] ?>" alt="Gambar KYC">
                </span><br>
            <?php
                }
            ?>
            <a href="<?= base_url() ?>pengelola/editProfile" class="btn btn-success" style="margin-top: 20px;">Edit Profil</a>
            <a href="<?= base_url() ?>pengelola/rekening" class="btn btn-primary" style="margin-top: 20px;margin-left:10px">Rekening Anda</a>
            <?php if ($profile['status_pengelola'] == "Belum Terverifikasi") {
            ?>
                <a href="<?= base_url() ?>pengelola/verifikasi" class="btn btn-info" style="margin-top: 20px;margin-left:10px">Verifikasi</a>
            <?php
            } ?>
            </div>
    </div>
</div>