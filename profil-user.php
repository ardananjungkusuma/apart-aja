<?php
include 'connection.php';
session_start();
if (!empty($_SESSION['level']) == '1') {
    include 'header-user.php'; ?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row" style="margin-top: 80px;">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" style="background:whitesmoke;text-align: center">
                        User Menu
                    </div>
                    <ul class="list-group list-group-flush">
                        <a href="#" style="text-decoration: none;color: black" class="list-group-item">Apartemen Anda</a>
                        <a href="#" class="list-group-item">Transaksi</a>
                        <a href="#" class="list-group-item">Profile</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Welcome ..
                    </div>
                    <div class="card-body">
                        Isi
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include 'footer.php';
} else {
?>
    <script>
        window.location = 'login-user.php';
    </script>
<?php
}
?>

<?php
?>