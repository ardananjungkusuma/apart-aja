<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/js/all.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css">
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <title>Admin Portal</title>
    <style>
        .badge {
            margin-left: 3px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color:#bd1e2b">
        <a class="navbar-brand" href="<?= base_url(); ?>admin">Portal Admin Apart Aja</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php
                if ($this->session->userdata('level') == "hrd" or $this->session->userdata('level') == "staff" or $this->session->userdata('level') == "kepala") {
                ?>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>admin">Manajemen User</a>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>admin/dataPengelola">Manajemen Pengelola</a>
                    <?php
                    if ($this->session->userdata('level') == "hrd" or $this->session->userdata('level') == "kepala") {
                    ?>
                        <a class="nav-item nav-link" href="<?= base_url(); ?>admin/tambahStaff">Tambah Karyawan</a>
                    <?php
                    }
                    ?>
                    <a class="nav-item nav-link" href="<?= base_url(); ?>auth/logout">Logout</a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>