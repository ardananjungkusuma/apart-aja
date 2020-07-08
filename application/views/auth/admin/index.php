<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin:0 auto;background-color: #84142d;border-radius: 25px;color:white">
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <h4 style="text-align: center">Login</h4><br>
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url() ?>auth/loginAdmin" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                    </div>
                    <a style="cursor: pointer;" onclick="forgotPass()">Forgot Password</a>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Login</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function passwordShowUnshow() {
        var x = document.getElementById("password");
        var y = document.getElementById("passwordConf");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }

    function forgotPass() {
        alert("Mohon Hubungi HRD");
    }
</script>