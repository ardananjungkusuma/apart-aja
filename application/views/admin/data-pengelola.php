<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12" style="margin: 0 auto;">
            <?= $this->session->flashdata('message') ?>
            <h2>Daftar Pengelola</h2>
            <?php if (empty($pengelola)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data User Tidak Ditemukan / Kosong
                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered" id="listUser">
                <thead>
                    <tr style="background-color:darkcyan;color:white;font-weight:bold">
                        <td>Nama</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>No Telepon</td>
                        <td>Jenis Kelamin</td>
                        <td>Kartu Identitas</td>
                        <td>KYC Identitas</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pengelola as $pengelola) { ?>
                        <tr>
                            <td>
                                <?= $pengelola['nama'] ?>
                            </td>
                            <td>
                                <?= $pengelola['username'] ?>
                            </td>
                            <td>
                                <?= $pengelola['email'] ?>
                            </td>
                            <td>
                                <?= $pengelola['no_telpon'] ?>
                            </td>
                            <td>
                                <?= $pengelola['jenis_kelamin'] ?>
                            </td>
                            <td>
                                <?php
                                if ($pengelola['gambar_identitas'] == "None") {
                                    echo "Belum upload gambar.";
                                } else {
                                ?>
                                    <a href="<?= base_url() ?>assets/img/identitas/kartu_identitas/<?= $pengelola['gambar_identitas'] ?>" target="_blank">Gambar</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($pengelola['kyc_identitas'] == "None") {
                                    echo "Belum upload gambar.";
                                } else {
                                ?>
                                    <a href="<?= base_url() ?>assets/img/identitas/kyc_identitas/<?= $pengelola['kyc_identitas'] ?>" target="_blank">Gambar</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?= $pengelola['status_pengelola'] ?>
                            </td>
                            <td>
                                <?php
                                if ($pengelola['status_pengelola'] == "Terverifikasi" or $pengelola['status_pengelola'] == "Verifikasi Ditolak" or $pengelola['kyc_identitas'] == "None") {
                                } else {
                                ?>
                                    <a class="badge badge-success" href="<?= base_url() ?>admin/verifikasiPengelola/<?= $pengelola['id_pengelola'] ?>">Verifikasi</a>
                                <?php
                                }
                                ?>
                                <a class="badge badge-warning" href="<?= base_url() ?>admin//<?= $pengelola['id_pengelola'] ?>">Edit Password</a>
                                <a class="badge badge-danger" href="<?= base_url() ?>admin//<?= $pengelola['id_pengelola'] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>