<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">
            <center>
                <h2>Rekening Anda</h2>
                <hr>
                <?= $this->session->flashdata('message'); ?>
            </center>
            <?php
            if (!empty($rekening)) {
                $no = 1;
            ?>
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>No</td>
                        <td>No Rekening</td>
                        <td>Atas Nama</td>
                        <td>Nama Bank</td>
                        <td>Aksi</td>
                    </tr>

                    <?php
                    foreach ($rekening as $rekening) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $rekening['no_rek'] ?></td>
                            <td><?= $rekening['nama_pemilik'] ?></td>
                            <td><?= $rekening['nama_bank'] ?></td>
                            <td><a href="<?= base_url() ?>pengelola/hapusRekening/<?= $rekening['id_rekening'] ?>" type="hapus" onclick="return confirm('Apakah anda ingin menghapus rekening ini?');" class="btn btn-danger" name="hapus" id="hapus">Hapus</a></td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </table>
            <?php
            } else {
            ?>
                Maaf Anda Belum Menambah Daftar Rekening.<br>
            <?php
            }
            ?>
            <a href="<?= base_url() ?>pengelola/profile" class="btn btn-info" style="margin-top: 20px;">Kembali ke Profil</a>
            <a href="<?= base_url() ?>pengelola/tambahRekening" class="btn btn-success" style="margin-top: 20px;margin-left:10px">Tambah Rekening</a>
        </div>
    </div>
</div>