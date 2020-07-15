<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Edit Profil</p>
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
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <?php
                foreach ($profile as $p) {
                ?>
                    <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>pengelola/editProfile">
                        <div class="form-group">
                            <?php
                            if ($p['status_pengelola'] != "Terverifikasi") {
                            ?>
                                <label>Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control mb-2" value="<?= $p['nama'] ?>" required>
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="<?= $p['jenis_kelamin'] ?>" selected><?= $p['jenis_kelamin'] ?></option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            <?php
                            }
                            ?>
                            <label>Nomer Telfon</label>
                            <input type="text" id="no_telpon" name="no_telpon" class="form-control mb-2" value="<?= $p['no_telpon'] ?>" required>
                            <label>Email</label>
                            <input type="email" id="email" name="email" class="form-control mb-2" value="<?= $p['email'] ?>" required>
                            <label>Username</label>
                            <input type="text" id="username" class="form-control mb-2" value="<?= $p['username'] ?>" disabled>
                            <small class="form-text text-muted">Username tidak bisa diubah.</small>
                        </div>
                    <?php
                }
                    ?>
                    <a href="<?= base_url(); ?>pengelola/profile" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Edit Profile</button><br><br>
                    </form>
            </div>
        </div>
    </div>
</div>