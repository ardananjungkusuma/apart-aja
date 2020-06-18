<div class="wrapper" style="background-image: url('assets/img/etc/bg-registration-form-1.jpg');">
    <div class="inner">
        <div class="image-holder">
            <img src="assets/img/etc/registration-form-1-manager.jpg" alt="">
        </div>
        <?= form_open('auth/prosesLoginPengelola') ?>
        <form action="" method="POST">
            <i class="zmdi zmdi-long-arrow-left" style="font-size: 15px"></i><a href="index.php" style="text-decoration: none;color:#333;font-size:15px;font-family: Poppins-Regular;"> Back to Homepage</a><br><br>
            <h3>Pengelola Login</h3>
            <div class="form-wrapper">
                <input type="text" placeholder="Username or Email" name="usernameOrEmail" class="form-control" required>
                <i class="zmdi zmdi-account"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                <i class="zmdi zmdi-lock"></i>
            </div>
            <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
            <h4 style="margin-top: 5px;">Don't have an account? <a href="register-pengelola.php" style="text-decoration: none;color:#333">Register Here!</a></h4>
            <h4>Login as User? <a href="login-user.php" style="text-decoration: none;color:#333">Click Here!</a></h4>
            <button type="login" value="login" name="login">Login
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
        <?= form_close() ?>
    </div>
</div>
</body>

</html>