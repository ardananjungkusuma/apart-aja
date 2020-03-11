<?php
include 'connection.php';
$idRuangan = $_GET['id_ruangan'];
$idGambar = $_GET['id_gambar'];
$getGambar = "SELECT * FROM gambar_apartemen where id_gambar = $idGambar";
$executeGetGambar = mysqli_query($connect, $getGambar);
while ($row = mysqli_fetch_array($executeGetGambar)) {
    $gambar = $row['gambar'];
}
unlink($gambar);
$queryHapus = "DELETE FROM gambar_apartemen WHERE id_gambar = $idGambar";
$execute = mysqli_query($connect, $queryHapus);
if ($execute) { ?>
    <script>
        alert("Gambar Berhasil Dihapus");
    </script>
<?php
    header("Refresh:0; url=galeri-ruang-apartemen-anda.php?id_ruangan=$idRuangan");
} else {
    header("Refresh:0; url=galeri-ruang-apartemen-anda.php?id_ruangan=$idRuangan");
}
