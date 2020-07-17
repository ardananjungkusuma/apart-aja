<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <?php
        foreach ($profile as $profile) {
        ?>
            <div class="col-md-8" style="margin: 0 auto;">
                <center>
                    <h2>Profile Anda</h2>
                    <hr>
                </center>
                <?= $this->session->flashdata('message') ?>
                <?php
                if ($profile['status_pengelola'] == "Belum Terverifikasi" and $profile['kyc_identitas'] == "None") {
                ?>
                    <div class="alert alert-info">Anda harus melakukan verifikasi agar bisa menambahkan dan mulai menjual Apartemen.</div>
                <?php
                } else if ($profile['status_pengelola'] == "Belum Terverifikasi" and $profile['kyc_identitas'] != "None") {
                ?>
                    <div class="alert alert-info">Proses verifikasi biasanya memakan waktu 1-2 hari kerja. Harap bersabar menunggu verifikasi</div>
                <?php
                } else if ($profile['status_pengelola'] == "Verifikasi Ditolak") {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Verifikasi Anda <b>Ditolak</b><br>
                        Pastikan Anda Mengirim Data Sesuai Peraturan Dibawah<br>
                        <b>
                            1. Nama Lengkap wajib sama dengan identitas <br>
                            2. Gambar Tidak Blur <br>
                            3. Data Identitas Yang Anda Berikan Valid<br>
                        </b>
                        Silahkan Verifikasi Data Identitas Kembali.
                    </div>
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
                    <ul>
                        <li><a href="<?= base_url() ?>assets/img/identitas/kartu_identitas/<?= $profile['gambar_identitas'] ?>" target="_blank">Identitas</a></li>
                        <li><a href="<?= base_url() ?>assets/img/identitas/kyc_identitas/<?= $profile['kyc_identitas'] ?>" target="_blank">Gambar KYC</a></li>
                    </ul>
                </span><br>
            <?php
                }
            ?>
            <a href="<?= base_url() ?>pengelola/editProfile" class="btn btn-success" style="margin-top: 20px;">Edit Profil</a>
            <a href="<?= base_url() ?>pengelola/changePassword" class="btn btn-warning" style="margin-top: 20px;">Change Password</a>
            <a href="<?= base_url() ?>pengelola/rekening" class="btn btn-primary" style="margin-top: 20px">Rekening Anda</a>
            <?php if ($profile['status_pengelola'] == "Belum Terverifikasi" or $profile['status_pengelola'] == "Verifikasi Ditolak") {
            ?>
                <a href="<?= base_url() ?>pengelola/verifikasi" class="btn btn-info" style="margin-top: 20px">Verifikasi</a>
            <?php
            } ?>
            </div>
    </div>
</div>