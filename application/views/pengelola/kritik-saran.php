<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto;">
            <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Kritik & Saran dari Penghuni Apartemen</h3>
            <?php
            if ($this->session->flashdata('message')) { ?>
                <?= $this->session->flashdata('message') ?>
            <?php
            }
            if (empty($kritiksaran)) {
            ?>
                Belum ada kritik & saran dari Penghuni Apartemen.
            <?php
            } else {
            ?>
                <table class="table table-hover" id="listDaftarPenghuni">
                    <thead style="background-color: #343a40;color:white">
                        <tr>
                            <td>Apartemen</td>
                            <td>Nama Penghuni</td>
                            <td>Isi Pesan</td>
                            <td>Tanggal Dikirim</td>
                            <td>Kategori</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($kritiksaran as $tampil) {
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
                        ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>
</div>