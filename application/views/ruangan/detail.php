<div class="container" style="padding: 20px; margin: 0 auto ;margin-top:100px;">
	<div class="row">
		<div class="col-md-12" style="margin-left:70px;margin-right:70px;">
			<?php
			foreach ($ruangan as $ruangan) {
			?>
				<span style="margin-top:20px;margin-bottom: 20px;font-size: 30px"><?= $ruangan['nama_ruangan'] ?> Room</span>
				<div class="card-body" style="font-size: 18px">
					<hr>
					<center>
						<img style="width:450px;margin-bottom: 15px;border-radius: 20px;border:1px solid black" src="<?= base_url(); ?>assets/img/gambar_ruangan/<?= $ruangan['gambar_utama'] ?>" alt="Desc">
					</center>
					<label for=""><b>Apartemen : </b></label>
					<a href="<?= base_url() ?>apartemen/detailApartemen/<?= $ruangan['id_apartemen'] ?>" style="text-decoration: none;"><?= $ruangan['nama_apartemen']; ?> Apartement</a><br>
					<label for=""><b>Lokasi : </b></label>
					<?= $ruangan['alamat_apartemen'] ?>, <?= $ruangan['kota_kabupaten'] ?><br>
					<label for=""><b>Jenis Ruangan : </b></label>
					<?= $ruangan['jenis_ruangan']; ?><br>
					<div style="float: right;margin-right: 300px">
						<div class="form-row">
							<div class="col">
								<a href="<?= base_url(); ?>transaksi/preview/<?= $ruangan['id_ruangan'] ?>" class="btn btn-success" style="float: right;width:200px;font-weight: bold">Buy This Room</a><br><br>
							</div>
						</div>
					</div>
					<label for=""><b>Harga Beli :</b></label>
					Rp. <?= number_format($ruangan['harga_beli'], 0, ',', '.');; ?><br>

					<label for=""><b>Detail Ruangan :</b></label><br>
					<span style="white-space: pre-line"><?= $ruangan['detail_ruangan']; ?></span>
				</div>
			<?php
			}
			?>
			<span style="font-size: 20px;font-weight: bold">
				Kumpulan Ruangan dari Apartemen ini
			</span><br>
			<div class="col-md-8" style="margin-left:150px">
				<?php foreach ($gambar as $gambarApartemen) { ?>
					<figure style="display: inline-block;margin-top:10px;margin-left:3px;margin-right:3px;">
						<img class="card-img-top" style="width: 300px;border-radius: 10px" src="<?= base_url(); ?>assets/img/gambar_ruangan/<?= $gambarApartemen['gambar'] ?>" alt="<?= $gambarApartemen['deskripsi_singkat'] ?>">
						<figcaption style="text-align: center">Gambar <?= $gambarApartemen['deskripsi_singkat'] ?></figcaption>
					</figure>
				<?php } ?>
			</div>
		</div>
	</div>