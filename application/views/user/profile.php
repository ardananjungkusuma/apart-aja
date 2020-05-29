<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Profile
    </div>
    <div class="card-body">
        <?php
        foreach ($profile as $profile) {
        ?>
            <label class="label-profil">Nama : </label>
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
            if ($profile['gambar_kartu_identitas'] == "None") {
            ?>
                Anda Belum Mengupload Gambar Identitas, silahkan Klik Edit Profile. <br>
            <?php
            } else {
            ?>
                <a href="<?= $profile['gambar_kartu_identitas'] ?>">Klik Disini Untuk Melihat Gambar Identitas Anda</a><br><br>
            <?php
            }
            ?>
            <a href="<?= base_url(); ?>user/editProfile" class="btn btn-success">Edit Profile</a>
        <?php
        }
        ?>
    </div>
</div>