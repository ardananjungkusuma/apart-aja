<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Ruangan Apartemen Anda
    </div>
    <div class="card-body">
        <?php
        if (!empty($apartemen)) {
        ?>
            <table class="table table-hover">
                <thead style="background-color: #343a40;color:white">
                    <tr>
                        <td>Ruangan</td>
                        <td>Nama & Nomer Ruangan</td>
                        <td>Lantai</td>
                    </tr>
                </thead>
                <?php
                foreach ($apartemen as $apartemen) {
                ?>
                    <tr>
                        <td><?= $apartemen['nama_ruangan'] ?></td>
                        <td><?= $apartemen['nama_nomer_ruangan'] ?></td>
                        <td><?= $apartemen['lantai'] ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                Maaf Anda Tidak Memiliki Apartemen, silahkan beli terlebih dahulu.
            <?php
            } ?>
            </table>
    </div>
</div>