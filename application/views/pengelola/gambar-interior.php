<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-10" style="margin: 0 auto;">
            <?php
            foreach ($ruanganApartemen as $apartemen) {
                $id_ruangan = $apartemen['id_ruangan'];
            ?>
                <h3 style="margin-top:20px;margin-bottom: 20px">Galeri <?= $apartemen['nama_ruangan'] ?> Room</h3>
                <a href="<?= base_url() ?>ruangan/tambahGambarRuangan/<?= $apartemen['id_ruangan'] ?>" class="btn btn-success">Tambah Gambar</a>
                <a href="<?= base_url() ?>ruangan/listRuangan" class="btn btn-primary">Kembali</a><br><br>
            <?php
            }
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } else if ($this->session->flashdata('error')) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    1. Max File Size 1Mb / 1024 Kb.<br>
                    2. Format jpg/png.
                </div>
            <?php
            }
            if (!empty($gambarInterior)) {
            ?>
                <table class="table table-striped" style="margin-top: 10px">
                    <thead>
                        <tr>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($gambarInterior as $gambar) {
                        ?>
                            <tr>
                                <td><?= $gambar['deskripsi_singkat'] ?></td>
                                <td><img style="width: 300px" src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $gambar['gambar'] ?>"></td>
                                <td><a href="<?= base_url() ?>ruangan/hapusGambarRuangan/<?= $gambar['id_gambar'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus Gambar ini?')">Hapus Gambar</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <br>
                <br>
                <h3>Silahkan tambahkan gambar interior ruangan.</h3>
            <?php
            }
            ?>

            <br><br>
        </div>
    </div>
</div>