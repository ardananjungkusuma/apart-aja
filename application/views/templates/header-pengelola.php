<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pengelola Apartemen</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/js/all.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css">
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <style>
        .zoom {
            transition: transform .2s;
            margin: 0 auto;
        }

        .zoom:hover {
            transform: scale(2);
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url() ?>pengelola">Pengelola Dashboard</a>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Dashboard Menu</div>
                        <a class="nav-link" href="<?= base_url() ?>transaksi/transaksiPembelianUser">
                            <div class="sb-nav-link-icon"><i class="fas fa-business-time"></i></div>
                            Transaksi Pembelian
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Apartemen Anda
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">Apartemen
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="<?= base_url() ?>apartemen/tambahApartemen">Tambah Apartemen</a>
                                        <a class="nav-link" href="<?= base_url() ?>ruangan/tambahRuangan">Tambah Ruangan</a>
                                        <a class="nav-link" href="<?= base_url() ?>apartemen/listApartemen">Apartemen Anda</a>
                                        <a class="nav-link" href="<?= base_url() ?>ruangan/listRuangan">Ruang Apartemen Anda</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Penghuni Apartemen
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url() ?>penghuniapart/listPenghuni">Daftar Penghuni</a>
                                <a class="nav-link" href="<?= base_url() ?>penghuniapart/tambahPenghuni">Tambah Penghuni</a>
                            </nav>

                        </div>
                        <a class="nav-link" href="<?= base_url() ?>kritiksaran/listKritikSaran">
                            <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                            Kritik & Saran
                        </a>
                        <div class="sb-sidenav-menu-heading">Profile</div>
                        <a class="nav-link" href="<?= base_url() ?>pengelola/profile">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            Profile Anda
                        </a><a class="nav-link" href="<?= base_url() ?>auth/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-share-square"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <h6 style="color:white"><?= $this->session->userdata('username') ?></h6>
                </div>
            </nav>
        </div>
    </div>