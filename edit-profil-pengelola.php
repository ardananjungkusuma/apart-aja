<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $username = $_SESSION['usernameOrEmail'];
    $id_pengelola = $_SESSION['id_pengelola'];
    include 'header-pengelola-dashboard.php';
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
                <br>
                <p class="h4" style="text-align: center">Edit Profil</p>
                <div class="card-body">
                    <style>
                        label {
                            margin-top: 10px;
                        }
                    </style>
                    <?php
                    $queryGetPengelola = "SELECT * FROM pengelola_apartemen WHERE id_pengelola = $id_pengelola";
                    $executeGetPengelola = mysqli_query($connect, $queryGetPengelola);
                    while ($pengelola = mysqli_fetch_array($executeGetPengelola)) {
                    ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control mb-2" value="<?= $pengelola['nama'] ?>" required>
                                <label>No Telepon</label>
                                <input type="number" id="no_telpon" name="no_telpon" class="form-control mb-2" value="<?= $pengelola['no_telpon'] ?>" required>
                                <small>*Berawalan 62, Contoh : 6285124789652</small>
                            </div>
                            <a href="profil-pengelola.php" class="btn btn-primary float-left">Kembali ke Profil</a>
                            <button type="submit" name="submit" class="btn btn-success float-right" style="margin-bottom: 30px;">Edit Profil</button>
                        </form>
                </div>
            </div>
        <?php
                    }
        ?>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $no_telpon = $_POST['no_telpon'];
        $queryEdit = "UPDATE pengelola_apartemen set nama = '$nama', no_telpon = '$no_telpon' WHERE id_pengelola = '$id_pengelola'";
        if (mysqli_query($connect, $queryEdit)) {
    ?>
            <script>
                alert('Success Edit Profile');
                window.location = 'profil-pengelola.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Error Edit Profile');
                window.location = 'profil-pengelola.php';
            </script>
    <?php
        }
        mysqli_close($connect);
    }
} else { ?>
    <script>
        window.location = 'login-pengelola.php';
    </script>
<?php
}
?>

</html>