<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Kritik & Saran yang Anda Kirim
    </div>
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
        <?php
        } else {
        ?>
            Maaf Anda Belum Mengirimkan Kritik & Saran.
        <?php
        }
        ?>
    </div>
</div>