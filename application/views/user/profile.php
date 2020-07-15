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
            } else if ($profile['gambar_kartu_identitas'] != "None" and $profile['status_user'] == "Verifikasi Ditolak") {
            ?>
                <div class="alert alert-danger" role="alert">
                    Pastikan Anda Mengirim Data Sesuai Peraturan Dibawah<br>
                    <b>
                        1. Nama Lengkap wajib sama dengan identitas <br>
                        2. Gambar Tidak Blur <br>
                        3. Data Identitas Yang Anda Berikan Valid<br>
                    </b>
                    Silahkan Kirimkan Data Identitas Kembali.
                </div>
            <?php
            }
            ?>
            <label class="label-profil" style="font-weight: bold;">Nama Lengkap : </label>
            <?= $profile['nama'] ?><br>
            <label class="label-profil" style="font-weight: bold;">Email : </label>
            <?= $profile['email'] ?><br>
            <label class="label-profil" style="font-weight: bold;">Username : </label>
            <?= $profile['username'] ?><br>
            <label class="label-profil" style="font-weight: bold;">Alamat : </label>
            <?= $profile['alamat'] ?><br>
            <label class="label-profil" style="font-weight: bold;">Nomer Telfon : </label>
            <?= $profile['no_telpon'] ?><br>
            <label class="label-profil" style="font-weight: bold;">Jenis Kelamin : </label>
            <?= $profile['jenis_kelamin'] ?><br>
            <label class="label-profil" style="font-weight: bold;">Status User : </label>
            <?php
            if ($profile['gambar_kartu_identitas'] != "None" and $profile['status_user'] == "Belum Terverifikasi") {
                echo $profile['status_user'] . " (Verifikasi Anda sedang <b>direview</b>, tunggu 1-2 hari kerja)";
            } else {
                echo $profile['status_user'];
            }
            ?>
            <br>
            <label class="label-profil" style="font-weight: bold;">Gambar Kartu Identitas : </label><br>
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
            <a href="<?= base_url(); ?>user/changePassword" class="btn btn-warning">Change Password</a>
        <?php
        }
        ?>
    </div>
</div>