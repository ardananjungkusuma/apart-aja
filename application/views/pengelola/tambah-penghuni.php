<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Tambah Penghuni Apartemen</p>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <form method="POST" action="<?= base_url() ?>penghuniapart/tambahPenghuni">
                    <div class="form-group">
                        <label><b>Nama Pemilik Apartemen: </b></label><br>
                        <select name="id_user" class="form-control" required>
                            <?php
                            foreach ($penghuni as $penghuni) {
                            ?>
                                <option value="<?= $penghuni['id_user'] ?>"><?= $penghuni['nama'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label><b>Ruangan Apartemen: </b></label><br>
                        <select name="id_ruangan" class="form-control" required>
                            <?php
                            foreach ($ruangan as $ruang) {
                            ?>
                                <option value="<?= $ruang['id_ruangan'] ?>"><?= $ruang['nama_ruangan'] ?> Room - <?= $ruang['jenis_ruangan'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label><b>Nama Ruangan & Nomor: </b></label>
                        <input type="text" class="form-control" name="nama_nomer_ruangan" placeholder="Seville 01" required>
                        <label><b>Letak Lantai Ruangan: </b></label>
                        <input type="number" class="form-control" name="lantai" placeholder="2" required>
                    </div>
                    <a href="<?= base_url() ?>penghuniapart/listPenghuni" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Tambah Penghuni Apartemen</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>