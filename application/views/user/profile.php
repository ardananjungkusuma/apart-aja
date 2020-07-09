<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Profile
    </div>
    <div class="card-body">
        <?php
        echo $this->session->flashdata('message');
        foreach ($profile as $profile) {
            if ($profile['gambar_kartu_identitas'] == "None") {
        ?>
                <div class="alert alert-info" role="alert">
                    Anda dapat membeli apartemen dengan <b>Verifikasi Identitas</b> terlebih dahulu.<br><i><b>**Nama Lengkap wajib sama dengan identitas**</b></i>
                </div>
            <?php
            } else if ($profile['gambar_kartu_identitas'] != "None" and $profile['status_user'] == "Belum Terverifikasi") {
            ?>
                <div class="alert alert-info" role="alert">
                    Profil sedang dalam proses verifikasi. Proses verifikasi memakan waktu 1x24 Jam dalam hari kerja.
                </div>
            <?php
            }
            ?>

            <label class="label-profil">Nama Lengkap : </label>
            <?= $profile['nama'] ?><br>
            <label class="label-profil">Email : </label>
            <?= $profile['email'] ?><br>
            <label class="label-profil">Username : </label>
            <?= $profile['username'] ?><br>
            <label class="label-profil">Alamat : </label>
            <?= $profile['alamat'] ?><br>
            <label class="label-profil">Nomer Telfon : </label>
            <?= $profile['no_telpon'] ?><br>
            <label class="label-profil">Jenis Kelamin : </label>
            <?= $profile['jenis_kelamin'] ?><br>
            <label class="label-profil">Status User : </label>
            <b><?= $profile['status_user'] ?></b><br>
            <label class="label-profil">Gambar Kartu Identitas : </label><br>
            <?php
            if ($profile['gambar_kartu_identitas'] != "None") {
            ?>
                <img src="<?= base_url() ?>assets/img/identitas/kartu_identitas/<?= $profile['gambar_kartu_identitas'] ?>">
            <?php
            } else {
                echo "<b>Belum Diupload.</b>";
            }
            ?>
            <br><br>
            <a href="<?= base_url(); ?>user/editProfile" class="btn btn-success">Edit Profile</a>
            <?php
            if ($profile['status_user'] == "Belum Terverifikasi" or $profile['status_user'] != "Terverifikasi") {
            ?>
                <a href="<?= base_url(); ?>user/verifikasi" class="btn btn-info">Verifikasi Data</a>
            <?php
            }
            ?>
        <?php
        }
        ?>
    </div>
</div>