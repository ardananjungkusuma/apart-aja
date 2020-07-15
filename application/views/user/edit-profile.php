<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Edit Profile
    </div>
    <div class="card-body">
        <?php
        if (!empty(validation_errors())) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
        <?php
        }
        ?>
        <?= $this->session->flashdata('message') ?>
        <form method="POST" action="<?= base_url() ?>user/editProfile">
            <div class="form-group">
                <?php
                foreach ($profile as $profile) {
                    if ($profile['status_user'] != "Terverifikasi") {
                ?>
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $profile['nama'] ?>">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?= $profile['alamat'] ?>">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="<?= $profile['jenis_kelamin'] ?>" selected><?= $profile['jenis_kelamin'] ?></option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    <?php
                    }
                    ?>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $profile['username'] ?>" disabled>
                    <small class="form-text text-muted">Username tidak bisa diubah.</small>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $profile['email'] ?>">
                    <label>No Telpon</label>
                    <input type="text" name="no_telpon" class="form-control" value="<?= $profile['no_telpon'] ?>">
                    <br>
                <?php
                }
                ?>
                <button type="submit" class="btn btn-success" name="submit">Edit Profile</button>
                <a href="<?= base_url(); ?>user/profile" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
</div>