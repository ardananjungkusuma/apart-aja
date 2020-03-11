<?php
include 'connection.php';
$idApartemen = $_GET['id_apartemen'];
$getApartemen = "SELECT * FROM apartemen where id_apartemen = $idApartemen";
$executeGetApart = mysqli_query($connect, $getApartemen);
while ($row = mysqli_fetch_array($executeGetApart)) {
    $gambar = $row['gambar_apartemen'];
}
unlink($gambar);
$queryHapus = "DELETE FROM apartemen WHERE id_apartemen = $idApartemen";
$execute = mysqli_query($connect, $queryHapus);
if ($execute) { ?>
    <script>
        alert("Data Apartemen Berhasil Dihapus");
    </script>
<?php
    header("Refresh:0; url=apartemen-anda.php");
} else {
    header("Refresh:0; url=apartemen-anda.php");
}
