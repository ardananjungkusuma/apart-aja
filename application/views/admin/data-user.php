<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12" style="margin: 0 auto;">
            <?= $this->session->flashdata('message') ?>
            <h2>Daftar User</h2>
            <?php if (empty($user)) : ?>
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
                        <td>Gambar Kartu Identitas</td>
                        <td>Status</td>
                        <td>Tipe User</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($user as $usr) { ?>
                        <tr>
                            <td>
                                <?= $usr['nama'] ?>
                            </td>
                            <td>
                                <?= $usr['username'] ?>
                            </td>
                            <td>
                                <?= $usr['email'] ?>
                            </td>
                            <td>
                                <?= $usr['no_telpon'] ?>
                            </td>
                            <td>
                                <?= $usr['jenis_kelamin'] ?>
                            </td>
                            <td>
                                <?php
                                if ($usr['gambar_kartu_identitas'] == "None") {
                                    echo "Belum diupload.";
                                } else {
                                ?>
                                    <a href="<?= base_url() ?>assets/img/identitas/kartu_identitas/<?= $usr['gambar_kartu_identitas'] ?>" target="_blank">Gambar</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?= $usr['level'] ?>
                            </td>
                            <td>
                                <?= $usr['status_user'] ?>
                            </td>
                            <td>
                                <?php
                                if ($usr['level'] == "user") {
                                    if ($usr['status_user'] == "Terverifikasi" or $usr['status_user'] == "Verifikasi Ditolak") {
                                    } else {
                                ?>
                                        <a class="badge badge-success" href="<?= base_url() ?>admin/verifikasiUser/<?= $usr['id_user'] ?>">Verifikasi</a>
                                    <?php
                                    }
                                    ?>
                                    <a class="badge badge-warning" href="<?= base_url() ?>admin//<?= $usr['id_user'] ?>">Edit Password</a>
                                    <a class="badge badge-danger" href="<?= base_url() ?>admin//<?= $usr['id_user'] ?>">Hapus</a>
                                <?php
                                } else {
                                    echo "None";
                                }
                                ?>
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