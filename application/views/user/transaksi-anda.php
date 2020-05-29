<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Transaksi Pembelian
    </div>
    <?php
    if (!empty($transaksi)) {
    ?>
        <div class="card-body">
            <table class="table table-hover">
                <thead style="background-color: #343a40;color:white">
                    <tr>
                        <td>Ruangan</td>
                        <td>Total Harga</td>
                        <td>Status</td>
                        <td>Detail Transaksi</td>
                    </tr>
                </thead>
                <?php
                foreach ($transaksi as $transaksi) {
                ?>
                    <tr>
                        <td><?= $transaksi['nama'] ?></td>
                        <td>Rp. <?= number_format($transaksi['total_harga'], 0, ',', '.');; ?></td>
                        <td><?= $transaksi['status_pemesanan'] ?></td>
                        <td><a href="<?= base_url() ?>user/detailTransaksi/<?= $transaksi['id_transaksi_pembelian'] ?>" class="btn btn-info">Lihat Detail</a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    <?php
    } else {
    ?>
        <div class="card-body">
            Maaf Anda Belum Melakukan Transaksi
        </div>
    <?php
    }
