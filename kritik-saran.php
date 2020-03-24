<?php
include 'connection.php';
session_start();
if ($_SESSION['status_login'] == 'pengelola_login') {
    $usernameOrEmailNow = $_SESSION['usernameOrEmail'];
    $id_pengelola = $_SESSION['id_pengelola'];
    $kategori = $_GET['kategori'];
    include 'header-pengelola-dashboard.php';
?>
    <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
        <div class="row">
            <div class="col-lg-12" style="margin: 0 auto;">
                <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Penghuni Apartemen</h3>
                <table class="table table-hover" id="listDaftarPenghuni">
                    <thead style="background-color: #343a40;color:white">
                        <tr>
                            <td>Apartemen</td>
                            <td>Nama Penghuni</td>
                            <td>Isi Kritik Saran</td>
                            <td>Tanggal Kritik / Saran</td>
                            <td>Kategori</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryGetApartemen = "SELECT * FROM apartemen where id_pengelola = $id_pengelola";
                        $executeGetApartemen = mysqli_query($connect, $queryGetApartemen);
                        while ($apartemen = mysqli_fetch_array($executeGetApartemen)) {
                            $apartemenID = $apartemen['id_apartemen'];
                            $queryGetKritikSaran = "SELECT * FROM kritik_saran ks JOIN user u on ks.id_user = u.id_user JOIN apartemen a on ks.id_apartemen = a.id_apartemen where ks.kategori = '$kategori' AND ks.id_apartemen = $apartemenID";
                            $executeGetKritikSaran = mysqli_query($connect, $queryGetKritikSaran);
                            while ($tampil = mysqli_fetch_array($executeGetKritikSaran)) {
                        ?>
                                <tr>
                                    <td><?= $tampil['nama_apartemen'] ?></td>
                                    <td><?= $tampil['nama'] ?></td>
                                    <td><?= $tampil['isi_kritik_saran'] ?></td>
                                    <td><?= $tampil['tanggal_masuk'] ?></td>
                                    <td><?= $tampil['kategori'] ?></td>
                                    <td>
                                        <form action="respon-pengelola.php" method="POST">
                                            <input type="hidden" name="idKS" value="<?= $tampil['id_kritik_saran'] ?>">
                                            <button class="btn btn-warning">Beri Pesan Respon</button>
                                        </form>
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