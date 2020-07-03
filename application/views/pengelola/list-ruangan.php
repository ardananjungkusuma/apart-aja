<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-lg-11" style="margin: 0 auto;">
            <h3 style="margin-top:20px;margin-bottom: 20px">Daftar Ruangan Apartemen Anda</h3>
            <br>
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
            if (!empty($ruanganApartemen)) {
                foreach ($ruanganApartemen as $ruanganApartemen) {
                ?>
                    <div class="card" onclick="location.href='<?= base_url() ?>ruangan/detailRuanganAnda/<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 18rem;display:inline-block;cursor: pointer">
                        <img style="width:287px;height:180px" src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ruanganApartemen['nama_ruangan'] ?> Room</h5>
                            <p class="card-text"><a href="<?= base_url() ?>apartemen/detailApartemenAnda/<?= $ruanganApartemen['id_apartemen'] ?>"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a><br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
                            <a href="<?= base_url() ?>ruangan/detailRuanganAnda/<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
                            <a href="<?= base_url() ?>ruangan/editRuangan/<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-success">Edit</a>
                            <a href="<?= base_url() ?>ruangan/galeriGambarRuangan/<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-info">Galeri</a>
                            <a href="<?= base_url() ?>ruangan/hapusRuanganAnda/<?= $ruanganApartemen['id_ruangan'] ?>" style="margin-top: 10px" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus Apartemen ini?')">Hapus</a>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h4 style="margin-top:20px;margin-bottom: 20px">Maaf Anda belum memiliki ruangan apartemen, silahkan tambah ruangan</h4>
            <?php
            }
            ?>
        </div>
    </div>
</div>