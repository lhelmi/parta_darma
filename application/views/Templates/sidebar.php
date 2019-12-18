<!-- End Top Navigation -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                        <a href="#" class="waves-effect">
                            <img src="<?= base_url('assets/BackEnd/img/profile/').$this->session->userdata('foto'); ?>" alt="user-img" class="img-circle">
                            <span class="hide-menu"> <?= $this->session->userdata('name'); ?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level collapse" aria-expanded="true" style="">
                        <li>
                        <?php if ($this->session->userdata('role') == 'pengacara'){ ?>
                            <a href="<?= site_url('administrator/Pengacara/edit/').$this->session->userdata('id'); ?>"><i class="ti-user fa-fw">
                            </i><span class="hide-menu">My Profile</span></a>
                        <?php }else{ ?>
                            <a href="<?= site_url('administrator/Profile'); ?>"><i class="ti-user fa-fw">
                            </i><span class="hide-menu">My Profile</span></a>
                        <?php } ?>
                        </li>
                        <li><a href="<?= site_url('user/beranda'); ?>"><i class="mdi mdi-home-outline fa-fw"></i> <span class="hide-menu">Beranda</span></a></li>

                        <li><a href="<?= site_url('Login/logout'); ?>"><i class="fa fa-power-off fa-fw"></i> <span class="hide-menu">Logout</span></a></li>
                        </ul>
                    </li>

            <li class="devider"></li>
            <li><a href="<?php echo base_url('Dashboard') ?>" class="waves-effect"><i class="mdi mdi-av-timer fa-fw"></i> <span class="hide-menu">Dashboard</span></a></li>
            <?php if ($this->session->userdata('role') == '1'): ?>
                <li><a href="<?= base_url('administrator/Admin') ?>" class="waves-effect"><i class="mdi mdi-tie fa-fw"></i> <span class="hide-menu">Admin</span></a></li>
            <?php endif ?>
            <li><a href="<?php echo base_url('administrator/hubungi_kami') ?>" class="waves-effect"><i class="mdi mdi-gmail fa-fw"></i> <span class="hide-menu">Pesan</span></a></li>
            <li><a href="<?php echo base_url('administrator/Sidang') ?>" class="waves-effect"><i class="mdi mdi-gavel fa-fw"></i> <span class="hide-menu">Sidang</span></a></li>
            <li><a href="<?php echo base_url('administrator/DataPenunjang') ?>" class="waves-effect"><i class="mdi mdi-file-document fa-fw"></i> <span class="hide-menu">Data Penunjang</span></a></li>
            <?php if ($this->session->userdata('role') !== 'pengacara'): ?>
                <li><a href="<?= base_url('administrator/Pengacara') ?>" class="waves-effect"><i class="mdi mdi-tie fa-fw"></i> <span class="hide-menu">Pengacara</span></a></li>
            <?php endif ?>
            
            <li class="devider"></li>
        </ul>
    </div>
</div>

                    