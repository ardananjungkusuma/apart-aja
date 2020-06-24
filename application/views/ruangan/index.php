<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
	<div class="row" style="margin-top: 80px;">
		<div class="col-lg-12" style="margin: 0 auto;">
			<form action="" method="POST">
				<div class="form-group row mt-2">
					<div class="col-sm-5">
						<input type="text" name="keyword" class="form-control" id="" placeholder="Cari berdasarkan nama / kota">
					</div>
					<button type="submit" class="btn btn-sm btn-success" name="cari">Cari Sekarang</button>
				</div>
			</form>
			<?php
			foreach ($ruangan as $ruanganApartemen) {
			?>
				<div class="card" onclick="location.href='<?= base_url() ?>ruangan/detailRuangan/<?= $ruanganApartemen['id_ruangan'] ?>'" style="width: 287px;display:inline-block;margin-left:5px;margin-right: 5px;margin-top: 15px;cursor:pointer">
					<a href="<?= base_url() ?>ruangan/detailRuangan/<?= $ruanganApartemen['id_ruangan'] ?>" style="text-decoration: none; color:black">
						<img style="width:287px;height:180px" src="<?= base_url() ?>assets/img/gambar_ruangan/<?= $ruanganApartemen['gambar_utama'] ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title" style="font-size: 20px;"><?= $ruanganApartemen['nama_ruangan'] ?> Room</h5>
					</a>
					<p class="card-text" style="font-size: 15px">&diams; <a href="<?= base_url() ?>ruangan/detailRuangan/<?= $ruanganApartemen['id_ruangan'] ?>" style="text-decoration: none;color:black"><?= $ruanganApartemen['nama_apartemen'] ?> Apartement</a> &diams;<br>Tipe <?= $ruanganApartemen['jenis_ruangan'] ?><br>Rp. <?= number_format($ruanganApartemen['harga_beli'], 0, ',', '.');; ?></p>
					<a href="<?= base_url() ?>ruangan/detailRuangan/<?= $ruanganApartemen['id_ruangan'] ?>" class="btn btn-primary">Detail</a>
				</div>
		</div>
	<?php
			}
	?>
	</div>
</div>
</div>