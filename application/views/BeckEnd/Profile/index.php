<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Halaman Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="<?= base_url('assets/BackEnd/img/profile/').$this->session->userdata('foto'); ?>">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?= base_url('assets/BackEnd/img/profile/').$this->session->userdata('foto'); ?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?= $this->session->userdata('name'); ?></h4>
                                        <h5 class="text-white"><?= $this->session->userdata('email'); ?></h5> </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <!-- <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1> </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav nav-tabs tabs customtab">
                                <li class="active tab">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Pengaturan</span> </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal form-material" action="<?= site_url('administrator/Profile') ?>" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <label class="col-md-12">Nama</label>
                                            <div class="col-md-12">
                                                <input type="text" name="Nama" value="<?= $this->session->userdata('name'); ?>" class="form-control form-control-line">
                                                <?php echo form_error('Nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" name="Email" value="<?= $this->session->userdata('email') ?>" class="form-control form-control-line" name="example-email" id="example-email"> 
                                                <?php echo form_error('Email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Password Baru</label>
                                            <div class="col-md-12">
                                                <input type="password" name="password1" class="form-control form-control-line">
                                                <?php echo form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Konfirmasi Password</label>
                                            <div class="col-md-12">
                                                <input type="password" name="password2" class="form-control form-control-line">
                                                <?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Foto</label>
                                            <div class="col-md-12">
                                                <input type="file" name="Foto" id="input-file-now-custom-1" class="dropify" data-default-file="<?= base_url('assets/BackEnd/img/profile/').$this->session->userdata('foto'); ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-12">Role</label>
                                            <div class="col-md-12">
                                                <input type="text" disabled value="<?= $this->session->userdata('role') == '1' ? 'Super Admin' : 'Admin' ?>" class="form-control form-control-line">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Ubah Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>