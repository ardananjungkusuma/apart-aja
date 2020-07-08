<div class="wrapper" style="background-image: url('<?= base_url() ?>assets/img/etc/bg-registration-form-1.jpg');">
    <div class="inner">
        <div class="image-holder">
            <img src="<?= base_url() ?>assets/img/etc/registration-form-1-manager.jpg" alt="">
        </div>
        <form role="form" action="<?= base_url() ?>auth/prosesRegisterPengelola" enctype="multipart/form-data" method="POST">
            <i class="zmdi zmdi-long-arrow-left" style="font-size: 15px"></i><a href="<?= base_url() ?>" style="text-decoration: none;color:#333;font-size:15px;font-family: Poppins-Regular;"> Back to Homepage</a><br><br>
            <h3>Pengelola Registration</h3>
            <?php if (validation_errors()) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php
            } ?>
            <div class="form-wrapper">
                <input type="text" placeholder="Full Name" name="nama" value="<?= set_value('nama') ?>" class="form-control" required>
                <i class="zmdi zmdi-account-box"></i>
            </div>
            <div class="form-wrapper">
                <input type="text" placeholder="Username" name="username" value="<?= set_value('username') ?>" class="form-control" required>
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="email" placeholder="Email Address" name="email" value="<?= set_value('email') ?>" class="form-control" required>
                <i class="zmdi zmdi-email"></i>
            </div>
            <div class="form-wrapper">
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="" disabled selected>----Choose Gender----</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
                <i class="zmdi zmdi-male-female" style="font-size: 17px"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                <i class="zmdi zmdi-lock"></i>
            </div>
            <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
            <h4 style="margin-top: 5px;">Already have an account? <a href="<?= base_url() ?>auth/loginPengelola" style="text-decoration: none;color:#333">Login Here!</a></h4>

            <button type="submit" value="submit" name="submit">Register
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>