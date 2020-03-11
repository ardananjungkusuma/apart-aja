<?php
include 'connection.php';
$idruangan = $_GET['id_ruangan'];
$getRuangan = "SELECT * FROM ruangan_apartemen where id_ruangan = $idruangan";
$executeGetRuangan = mysqli_query($connect, $getRuangan);
while ($row = mysqli_fetch_array($executeGetRuangan)) {
    $gambar = $row['gambar_utama'];
}
unlink($gambar);
$queryHapus = "DELETE FROM ruangan_apartemen where id_ruangan = $idruangan";
$execute = mysqli_query($connect, $queryHapus);
if ($execute) { ?>
    <script>
        alert("Ruangan Apartemen Berhasil Dihapus");
    </script>
<?php
    header("Refresh:0; url=ruangan-apartemen-anda.php");
} else {
    header("Refresh:0; url=ruangan-apartemen-anda.php");
}
