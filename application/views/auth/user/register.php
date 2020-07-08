<div class="wrapper" style="background-image: url('<?= base_url() ?>assets/img/etc/bg-registration-form-1.jpg');">
	<div class="inner">
		<div class="image-holder">
			<img src="<?= base_url() ?>assets/img/etc/registration2-form-1-user.jpg" alt="">
		</div>
		<form role="form" action="<?= base_url() ?>auth/prosesRegisterUser" enctype="multipart/form-data" method="POST">
			<i class="zmdi zmdi-long-arrow-left" style="font-size: 15px"></i><a href="<?= base_url() ?>" style="text-decoration: none;color:#333;font-size:15px;font-family: Poppins-Regular;"> Back to Homepage</a><br><br>
			<h3>User Registration</h3>
			<?php if (validation_errors()) {
			?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			<?php
			} ?>
			<div class="form-wrapper">
				<input type="text" placeholder="Full Name" value="<?= set_value('nama') ?>" name="nama" class="form-control" required>
				<i class="zmdi zmdi-account-box"></i>
			</div>
			<div class="form-wrapper">
				<input type="text" placeholder="Username" value="<?= set_value('username') ?>" name="username" class="form-control" required>
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="form-wrapper">
				<input type="email" placeholder="Email Address" value="<?= set_value('email') ?>" name="email" class="form-control" required>
				<i class="zmdi zmdi-email"></i>
			</div>
			<div class="form-wrapper">
				<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
					<option value="" disabled selected>----Pilih Jenis Kelamin----</option>
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
			<h4 style="margin-top: 5px;">Already have an account? <a href="<?= base_url() ?>auth/loginUser" style="text-decoration: none;color:#333">Login Here!</a></h4>
			<button type="register" value="register" name="register">Register
				<i class="zmdi zmdi-arrow-right"></i>
			</button>
		</form>
	</div>
</div>
</body>

</html>