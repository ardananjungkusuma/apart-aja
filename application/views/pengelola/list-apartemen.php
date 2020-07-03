<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-lg-11" style="margin: 0 auto;">
            <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Apartemen Anda</h3>
            <?php
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            } else if ($this->session->flashdata('error')) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    1. Max File Size 1Mb / 1024 Kb.<br>
                    2. Format jpg/png.
                </div>
                <?php
            }
            if (!empty($apartemen)) {
                foreach ($apartemen as $ruanganApartemen) {
                ?>
                    <div class="card" onclick=" location.href='<?= base_url() ?>apartemen/detailApartemenAnda/<?= $ruanganApartemen['id_apartemen'] ?>'" style=" width: 18rem;display:inline-block;cursor: pointer;">
                        <img style="width:285px;height: 270px;object-fit: cover;" src="<?= base_url() . "assets/img/gambar_apartemen/" . $ruanganApartemen['gambar_apartemen'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</h5>
                            <p class="card-text"><?= $ruanganApartemen['kota_kabupaten'] ?>-<?= $ruanganApartemen['provinsi'] ?><br>
                                <a href="<?= base_url() ?>apartemen/detailApartemenAnda/<?= $ruanganApartemen['id_apartemen'] ?>" style="margin-top: 10px" class="btn btn-primary">Detail</a>
                                <a href="<?= base_url() ?>apartemen/editApartemenAnda/<?= $ruanganApartemen['id_apartemen'] ?>" style="margin-top: 10px" class="btn btn-success">Edit</a>
                                <a href="<?= base_url() ?>apartemen/hapusApartemenAnda/<?= $ruanganApartemen['id_apartemen'] ?>" style="margin-top: 10px" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus Apartemen ini?')">Hapus</a>
                            </p>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h4 style="margin-top:20px;margin-bottom: 20px">Maaf Anda belum memiliki apartemen, silahkan tambah apartemen</h4>
            <?php
            }
            ?>
        </div>
    </div>
</div>