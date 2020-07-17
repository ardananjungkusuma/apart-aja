<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: 220px; margin-right: auto;margin-top:50px;">
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto;background-color: whitesmoke;box-shadow: 10px 10px 5px grey;">
            <br>
            <p class="h4" style="text-align: center">Change Password</p>
            <div class="card-body">
                <style>
                    label {
                        margin-top: 10px;
                    }
                </style>
                <?php
                if (!empty(validation_errors())) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors() ?>
                    </div>
                <?php
                }
                ?>
                <form method="POST" enctype="multipart/form-data" action="<?= base_url() ?>pengelola/changePassword">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                        <br>
                        <label>Confirm New Password</label>
                        <input type="password" id="passwordConf" name="passwordConf" class="form-control">
                        <br>
                    </div>
                    <a href="<?= base_url(); ?>pengelola/profile" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="submit">Change Password</button><br>
                </form>
            </div>
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