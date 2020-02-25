<!DOCTYPE html>
<html>
<?php
include 'connection.php';
?>

<head>
    <meta charset="utf-8">
    <title>Login User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/styleForm.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
</head>

<body>

    <div class="wrapper" style="background-image: url('assets/img/etc/bg-registration-form-1.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="assets/img/etc/registration-form-1-user.jpg" alt="">
            </div>
            <form action="" method="POST">
                <i class="zmdi zmdi-long-arrow-left" style="font-size: 15px"></i><a href="index.php" style="text-decoration: none;color:#333;font-size:15px;font-family: Poppins-Regular;"> Back to Homepage</a><br><br>
                <h3>User Login</h3>
                <div class="form-wrapper">
                    <input type="text" placeholder="Username or Email" name="usernameOrEmail" class="form-control" required>
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="form-wrapper">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                <h4 style="margin-top: 5px;">Don't have an account? <a href="register-user.php" style="text-decoration: none;color:#333">Register Here!</a></h4>
                <button type="login" value="login" name="login">Login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['login'])) {
        $usernameOrEmail = $_POST['usernameOrEmail'];
        $password = md5($_POST['password']);
        $queryAuthLoginUser = "select * from user where password='$password' AND (username='$usernameOrEmail' OR email = '$usernameOrEmail')";
        $executeAuth = mysqli_query($connect, $queryAuthLoginUser);
        $checkAuth = mysqli_num_rows($executeAuth);
        if ($checkAuth > 0) {
            session_start();
            $_SESSION['usernameOrEmail'] = $usernameOrEmail;
            $_SESSION['status_login'] = 'user_login';
    ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Login Success',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
        <?php
            header("Refresh:1; url=apartement-list.php");
        } else { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Wrong Username or Password',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
    <?php
            header("Refresh:1; url=login-user.php");
        }
    }
    ?>
</body>

</html>