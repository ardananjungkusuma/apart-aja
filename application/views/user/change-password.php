<div class="card">
    <div class="card-header" style="background:#e32447;color:white;font-weight: bold">
        Change Password
    </div>
    <div class="card-body">
        <?php
        if (!empty(validation_errors())) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>
        <?php
        }
        ?>
        <?= $this->session->flashdata('message') ?>
        <form method="POST" action="<?= base_url() ?>user/changePassword">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" id="password" name="password" class="form-control">
                <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                <br>
                <label>Confirm New Password</label>
                <input type="password" id="passwordConf" name="passwordConf" class="form-control">
                <br>
                <button type="submit" class="btn btn-warning" name="submit">Change Password</button>
                <a href="<?= base_url(); ?>user/profile" class="btn btn-primary">Kembali</a>
            </div>
        </form>
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