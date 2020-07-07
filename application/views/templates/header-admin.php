<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin Portal</title>
    <style>
        .badge {
            margin-left: 3px;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color:#bd1e2b">
        <a class="navbar-brand" href="<?= base_url(); ?>">Portal Admin Apart Aja</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php
                if (!empty($this->session->userdata('jabatan'))) {
                ?>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>admin/verifUser">Verifikasi User/Pengelola</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>admin/manajemenUser">Manajemen User</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>auth/logout">Logout</a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>