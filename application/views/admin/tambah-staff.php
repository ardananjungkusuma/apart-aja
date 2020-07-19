<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12" style="margin: 0 auto;">
            <h2 style="margin-bottom: 20px;">Tambah Staff</h2>
            <hr>
            <?php
            if (!empty(validation_errors())) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php
            }
            ?>
            <form action="<?= base_url() ?>admin/tambahStaff" method="POST">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option disabled selected>Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
                <label>No Telpon HP</label>
                <input type="number" name="no_telpon" class="form-control" required>
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password<br>
                <label>Pangkat Staff</label>
                <select name="level" id="level" class="form-control" required>
                    <option disabled selected>Pilih Pangkat</option>
                    <option value="staff">Staff</option>
                    <option value="hrd">HRD</option>
                </select><br>
                <button type="submit" class="btn btn-primary">Tambah Karyawan</button>
            </form>
        </div>
    </div>
</div>
<script>
    function passwordShowUnshow() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>