

    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <?php
                        if ($this->session->userdata('role') == 'pengacara') {
                            $notif = $this->db->from('pengacara_notif')->where(['terbaca' => '0', 'IdPengacara' => $this->session->userdata('id')])->count_all_results();

                            $datanotif = $this->db->limit(5, 0)->order_by('waktu', 'DESC')->join('hubungi', 'pengacara_notif.id_hubungi = hubungi.id_hubungi')->get_where('pengacara_notif', ['terbaca' => '0', 'IdPengacara'=> $this->session->userdata('id')])->result_array();
                        }else{
                            $notif = $this->db->from('admin_notif')->where(['terbaca' => '0', 'id' => $this->session->userdata('id')])->count_all_results();

                            $datanotif = $this->db->limit(5, 0)->order_by('waktu', 'DESC')->join('hubungi', 'admin_notif.id_hubungi = hubungi.id_hubungi')->get_where('admin_notif', ['terbaca' => '0', 'id'=> $this->session->userdata('id')])->result_array();
                        }
                        
                    ?>
                    <a class="logo" href="<?= site_url('Dashboard') ?>">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="<?= base_url('assets/BackEnd/') ?>plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="<?= base_url('assets/BackEnd/') ?>plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><h4 alt="home" class="dark-logo" />Patra Darma</h4><!--This is light logo text--><h4 class="light-logo" />Patra Darma</h1>
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="<?= base_url('assets/BackEnd/') ?>#"> <i class="mdi mdi-gmail"></i>
                            <?php if ($notif>0) { ?>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div> 
                            <?php } ?>

                        <!--
                        pakai ini cu jika ada notifikasi masook
                            
                        -->
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">Anda Memiliki <?= $notif ?> Pesan Baru</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <?php
                                        foreach ($datanotif as $key) { 
                                            if ($this->session->userdata('role') == 'pengacara') {
                                    ?>
                                    <a href="<?= site_url('Dashboard/pupdatebacanotif/') .$key['pengacara_notif_id'].'/'.$key['id_hubungi'] ?>">
                                    <?php }else{ ?>
                                        <a href="<?= site_url('Dashboard/updatebacanotif/') .$key['admin_notif_id'].'/'.$key['id_hubungi'] ?>">
                                    <?php } ?>
                                        <div class="user-img"> <img src="<?= base_url('assets/BackEnd/') ?>plugins/images/email.png" alt="user" class="img-circle"> </div>
                                        <div class="mail-contnet">
                                            <h5><?= $key['nama']; ?></h5> <span class="mail-desc"><?= $key['pesan'] ?></span> <span class="time"><?= $key['waktu'] ?></span> </div>
                                    </a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="<?= site_url('administrator/hubungi_kami'); ?>"> <strong>Lihat semua pesan</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="<?= base_url('assets/BackEnd/') ?>#"> <img src="<?= base_url('assets/BackEnd/img/profile/').$this->session->userdata('foto'); ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?= $this->session->userdata('name'); ?></b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="<?= base_url('assets/BackEnd/img/profile/').$this->session->userdata('foto'); ?>" alt="user" /></div>
                                    <div class="u-text">
                                        <h4><?= $this->session->userdata('name'); ?></h4>
                                        <p class="text-muted"><?= $this->session->userdata('email'); ?></p>
                                        <?php if ($this->session->userdata('role') == 'pengacara'){ ?>
                                        <a href="<?= site_url('administrator/Pengacara/edit/').$this->session->userdata('id'); ?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                         <?php }else{ ?>
                                        <a href="<?= site_url('administrator/Profile') ?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            </li>    
                            <?php if ($this->session->userdata('role') == 'pengacara'){ ?>
                                <li><a href="<?= site_url('administrator/Pengacara/edit/').$this->session->userdata('id') ?>"><i class="ti-user"></i> My Profile</a></li>    
                            <?php }else{ ?>
                                <li><a href="<?= site_url('administrator/Profile') ?>"><i class="ti-user"></i> My Profile</a></li>
                            <?php } ?>
                            <li><a href="<?= site_url('administrator/hubungi_kami') ?>"><i class="ti-email"></i> Inbox</a></li>
                            
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= site_url('user/beranda');?>"><i class="mdi mdi-home-outline"></i> Beranda</a>

                            <li><a href="<?= site_url('Login/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

