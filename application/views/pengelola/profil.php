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
                    echo "Anda Harus Melakukan Verifikasi Agar Bisa menambahkan Apartemen";
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
                ?>
                <!-- <b> Gambar Identitas Anda</b> :<br>
                        <img style="width:350px;margin:0 auto;border-radius: 20px;border:1px solid black" src="" alt="Desc"> -->
                </span><br>
                <a href="<?= base_url() ?>pengelola/editProfile" class="btn btn-info" style="margin-top: 20px;">Edit Profil</a>
                <a href="<?= base_url() ?>pengelola/rekening" class="btn btn-primary" style="margin-top: 20px;margin-left:10px">Rekening Anda</a>
            </div>
    </div>
</div>