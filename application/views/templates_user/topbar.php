<body>
    <header id="header" id="home">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                        <a href="tel:+880 012 3654 896"></a>
                        <a href="mailto:support@colorlib.com">patradarmawja@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="<?= site_url('user/beranda'); ?>"><img src="<?= site_url('assets2/'); ?>img/logo2.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="<?php echo base_url('user/beranda') ?>">Beranda</a></li>

                        <li><a href="<?php echo base_url('user/info_hukum') ?>">Informasi Hukum</a></li>
                        <li><a href="<?php echo base_url('user/info_minyak') ?>">Informasi Minyak</a>

                        </li>
                        <li><a href="<?php echo base_url('user/konsultasi') ?>">Konsultasi</a></li>
                        <?php
                        if (!empty($this->session->userdata('id'))) {
                            ?>
                            <li><a href="<?php echo base_url('Dashboard') ?>">Dashboard</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo base_url('login') ?>">Login</a></li>
                        <?php } ?>

                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->