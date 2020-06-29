<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        <?php if ($this->session->flashdata('message')) {
            $this->session->flashdata('message');
        } ?>
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
                        <td><?= $transaksi['nama_ruangan'] ?></td>
                        <td>Rp. <?= number_format($transaksi['total_harga'], 0, ',', '.');; ?></td>
                        <td><?= $transaksi['status_pemesanan'] ?></td>
                        <td>
                            <form action="<?= base_url() ?>transaksi/detailTransaksiAnda" method="POST">
                                <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi_pembelian'] ?>">
                                <input type="hidden" name="id_pengelola" value="<?= $transaksi['id_pengelola'] ?>">
                                <button class="btn btn-info" type="submit">Lihat Detail</button>
                            </form>
                        </td>
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
