<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameNow = $_SESSION['usernameOrEmail'];
    include 'header-pengelola-dashboard.php';
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-lg-12">
                <!-- Default form contact -->
                <br>
                <form class="text-center" action="#!" style="margin: 0 auto;text-align: center">

                    <p class="h4 mb-4">Tambah Apartemen</p>
                    <input type="text" id="nama_apartemen" name="nama_apartemen" class="form-control mb-1" placeholder="Nama Apartemen Anda">

                    <!-- Email -->
                    <input type="email" id="alamat_apartemen" name="alamat_apartemen" class="form-control mb-4" placeholder="Alamat Apartement">

                    <!-- Subject -->
                    <label>Subject</label>
                    <select class="browser-default custom-select mb-4">
                        <option value="" disabled>Choose option</option>
                        <option value="1" selected>Feedback</option>
                        <option value="2">Report a bug</option>
                        <option value="3">Feature request</option>
                        <option value="4">Feature request</option>
                    </select>

                    <!-- Message -->
                    <div class="form-group">
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea>
                    </div>

                    <!-- Copy -->
                    <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
                        <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
                    </div>

                    <!-- Send button -->
                    <button class="btn btn-info btn-block" type="submit">Send</button>

                </form>
                <!-- Default form contact -->
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
<?php
} else { ?>
    <script>
        window.location = 'login-pengelola.php';
    </script>
<?php
}
?>

</html>