<!DOCTYPE html>
<html>
<?php
include 'connection.php';
?>

<head>
    <meta charset="utf-8">
    <title>Registration User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/styleForm.css">
    <script>
        function passwordShowUnshow() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script src="assets/js/sweetalert2@9.js"></script>
</head>

<body>

    <div class="wrapper" style="background-image: url('assets/img/etc/bg-registration-form-1.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="assets/img/etc/registration-form-1-manager.jpg" alt="">
            </div>
            <form role="form" enctype="multipart/form-data" method="POST">
                <i class="zmdi zmdi-long-arrow-left" style="font-size: 15px"></i><a href="index.php" style="text-decoration: none;color:#333;font-size:15px;font-family: Poppins-Regular;"> Back to Homepage</a><br><br>
                <h3>Pengelola Registration</h3>
                <div class="form-wrapper">
                    <input type="text" placeholder="Full Name" name="nama" class="form-control" required>
                    <i class="zmdi zmdi-account-box"></i>
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Username" name="username" class="form-control" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="email" placeholder="Email Address" name="email" class="form-control" required>
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="form-wrapper">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                        <option value="" disabled selected>----Choose Gender----</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <i class="zmdi zmdi-male-female" style="font-size: 17px"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                <h4 style="margin-top: 5px;">Already have an account? <a href="login-user.php" style="text-decoration: none;color:#333">Login Here!</a></h4>

                <button type="register" value="register" name="register">Register
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $jenisKelamin = $_POST['jenis_kelamin'];
        $sqlValidateUsernamePassword = "SELECT * FROM pengelola_apartemen where username = '$username' OR email = '$email'";
        $runValidate = mysqli_query($connect, $sqlValidateUsernamePassword);
        $checkValidateUsernameEmail = mysqli_num_rows($runValidate);

        if ($checkValidateUsernameEmail == TRUE) { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Username or Email Already Exist',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
            <?php
            header("Refresh:1; url=login-user.php");
        } else {
            $registerPengelola = "INSERT INTO pengelola_apartemen(nama,no_telpon,jenis_kelamin,email,username,password,gambar_identitas,status_pengelola)
			VALUES ('$nama','None','$jenisKelamin','$email','$username',MD5('$password'),'assets/img/etc/ava_default.jpg','Belum Terverifikasi')";
            if (mysqli_query($connect, $registerPengelola)) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Register Success',
                        showConfirmButton: false,
                        timer: 1000
                    })
                </script>
            <?php
                header("Refresh:1; url=login-pengelola.php");
            } else { ?>
                <script>
                    alert('Error Connect MySQL');
                    window.location = 'register-user.php';
                </script>
    <?php
            }
        }
    }
    ?>
</body>

</html>