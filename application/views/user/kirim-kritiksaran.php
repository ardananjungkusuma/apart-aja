<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Kirim Kritik Saran
    </div>
    <?php
    if (!empty($apartemen)) {
    ?>
        <div class="card-body">
            <form action="<?= base_url() ?>kritiksaran/kirimKritikSaran/ok" method="POST" enctype="multipart/form-data">
                <label>Pilih Kategori</label><br>
                <select name="kategori" class="form-control">
                    <option value="kritik">Kritik</option>
                    <option value="saran">Saran</option>
                </select><br>
                <label>Pilih Apartemen yang Ingin Diberi Kritik / Saran</label><br>
                <select name="id_apartemen" class="form-control" required>
                    <?php
                    foreach ($apartemen as $ruanganApart) {
                    ?>
                        <option value="<?= $ruanganApart['id_apartemen'] ?>"><?= $ruanganApart['nama_apartemen'] ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <label for="deskripsi">Isi Pesan</label>
                <textarea id="txtArea" class="form-control" name="isi_kritik_saran" rows="3" placeholder="Untuk AC Ruangan .. mohon dibersihkan" required></textarea><br>
                <button type="submit" class="btn btn-success" name="submit">Kirim</button>
                <a href="<?= base_url() ?>kritiksaran/kritikSaranAnda" class="btn btn-info">Kembali</a>
            </form>
        </div>
</div>
<?php
    } else {
        redirect('kritiksaran/kritikSaranAnda');
    }
