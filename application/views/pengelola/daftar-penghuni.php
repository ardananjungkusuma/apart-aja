<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-lg-12" style="margin: 0 auto;">
            <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Penghuni Apartemen</h3>
            <?php if ($this->session->flashdata('message')) { ?>
                <?= $this->session->flashdata('message') ?>
            <?php
            }
            if (!empty($penghuni)) {
            ?>
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
                        foreach ($penghuni as $penghuni) {
                        ?>
                            <tr>
                                <td><?= $penghuni['nama'] ?></td>
                                <td><?= $penghuni['nama_ruangan'] ?></td>
                                <td><?= $penghuni['nama_nomer_ruangan'] ?></td>
                                <td><?= $penghuni['lantai'] ?></td>
                                <td>
                                    <a href="#" class="badge badge-success">Edit Penghuni</a>
                                    <a href="#" class="badge badge-info">Hapus Penghuni</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <h5>Belum ada penghuni di apartemen yang anda jual.</h5>
            <?php
            }
            ?>
        </div>
    </div>
</div>