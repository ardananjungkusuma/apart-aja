<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_pengelola = $_SESSION['id_pengelola'];
    include 'header-pengelola-dashboard.php';
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-lg-12" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Penghuni Apartemen</h3>
                <table class="table table-hover" id="listDaftarPenghuni">
                    <thead style="background-color: #343a40;color:white">
                        <tr>
                            <td>Nama Pemilik</td>
                            <td>Nama Ruangan</td>
                            <td>Ruangan</td>
                            <td>Lantai</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryGetRuangan = "SELECT * FROM ruangan_apartemen where id_pengelola= $id_pengelola";
                        $executeGetRuangan = mysqli_query($connect, $queryGetRuangan);
                        while ($ruangan = mysqli_fetch_array($executeGetRuangan)) {
                            $idruang = $ruangan['id_ruangan'];
                            $queryGetPemilik = "SELECT * FROM pemilik_apartemen pa JOIN user u on pa.id_user = u.id_user where pa.id_ruangan = '$idruang'";
                            $executeQueryGetPemilik = mysqli_query($connect, $queryGetPemilik);
                            while ($tampil = mysqli_fetch_array($executeQueryGetPemilik)) {
                        ?>
                                <tr>
                                    <td><?= $tampil['nama'] ?></td>
                                    <td><?= $ruangan['nama'] ?></td>
                                    <td><?= $tampil['nama_nomer_ruangan'] ?></td>
                                    <td><?= $tampil['lantai'] ?></td>
                                    <td>
                                        <a href="#" class="badge badge-success">Edit Penghuni</a>
                                        <a href="#" class="badge badge-info">Hapus Penghuni</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#listDaftarPenghuni').DataTable();

        });
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
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