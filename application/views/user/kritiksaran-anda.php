<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Kritik & Saran Untuk Pengelola Apartemen
    </div>
    <?php if ($this->session->flashdata('message')) { ?>
        <?= $this->session->flashdata('message') ?>
    <?php
    } ?>
    <div class="card-body">
        <?php
        if (!empty($kritiksaran)) {
        ?>
            <table class="table table-hover">
                <thead style="background-color: #343a40;color:white">
                    <tr>
                        <td>Apartemen</td>
                        <td>Isi Pesan</td>
                        <td>Respon Pengelola</td>
                    </tr>
                </thead>
                <?php
                foreach ($kritiksaran as $ks) {
                ?>
                    <tr>
                        <td><?= $ks['nama_apartemen'] ?></td>
                        <td><?= $ks['isi_kritik_saran'] ?></td>
                        <td><?= $ks['respon_pengelola'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <a href="<?= base_url() ?>kritiksaran/kirimKritikSaran" class="btn btn-primary">Klik disini untuk Kirim Kritik & Saran</a>
            <?php
        } else {
            if (empty($userCheck)) {
            ?>
                Anda Belum Memiliki Apartemen. Fitur ini hanya bisa diakses jika sudah membeli apartemen.
            <?php
            } else {
            ?>
                Maaf Anda Belum Mengirimkan Kritik & Saran. Jika ingin mengirim silahkan klik tombol dibawah ini.
                <a href="<?= base_url() ?>kritiksaran/kirimKritikSaran" style="margin-top:10px" class="btn btn-info">Kirim Kritik / Saran</a>
        <?php
            }
        }
        ?>
    </div>
</div>