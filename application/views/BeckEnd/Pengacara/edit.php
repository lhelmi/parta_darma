<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('assets/BackEnd/') ?>#">Dashboard</a></li>
                    <li>Data Pengacara</li>
                    <li class="active"><?= $title ?></li>

                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
                <div class="white-box">
                    <h3 class="box-title m-b-30">Form</h3>
                    <form class="form-material" action="<?= base_url('administrator/Pengacara/edit/'.$pengacara["IdPengacara"]) ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="IdPengacara" value="<?= $pengacara['IdPengacara']; ?>">
                        <div class="form-group">
                            <label class="col-md-12">Nama Pengacara</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="NamaPengacara" name="NamaPengacara" value="<?= $pengacara['NamaPengacara']; ?>">
                                <?php echo form_error('NamaPengacara', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Jenis Kelamin</label>
                            <div class="col-md-12">
                                <select class="form-control" name="Jk" id="Jk">
                                    <option value="">--Pilih--</option>
                                    <option value="L" <?= $pengacara['Jk'] == 'L' ? 'selected' : '' ?> >Pria</option>
                                    <option value="P" <?= $pengacara['Jk'] == 'P' ? 'selected' : '' ?> >Wanita</option>
                                </select>
                                <?php echo form_error('Jk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="Email" name="Email" value="<?= $pengacara['Email']; ?>">
                                <?php echo form_error('Email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Telp</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="NoHp" name="NoHp" value="<?= $pengacara['NoHp']; ?>">
                                <?php echo form_error('NoHp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                                
                        </div>
                        <div class="form-group" id="dynamic_field">
                            <label class="col-md-12">Bidang Keahlian</label>
                            <?php foreach ($Bk as $km) : ?>
                                <div class="col-md-10">
                                    <input type="hidden" class="form-control" id="IdBk" name="IdBk[]" value="<?= $km['IdBk'] ?>"> 
                                    <input type="text" class="form-control" id="NamaBk1" name="NamaBk1[]" value="<?= $km['NamaBk'] ?>">
                                    <?php echo form_error('NamaBk1[]', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" name="btndelete" id="btndelete" class="btn btn-warning btndelete" id="btndelete" data-id="<?= $km['IdBk']; ?>" >Hapus</button>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-md-10 m-t-30">
                                <input type="text" class="form-control" id="NamaBk" name="NamaBk[]" value=""> 
                            </div>
                            <div class="col-md-2  m-t-30">
                                <button type="button" name="add" id="add" class="btn btn-primary">Tambah</button>
                            </div>
                                
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Keterangan</label>
                            <div class="col-md-12">
                                <textarea class="form-control" rows="3" name="keterangan" id="keterangan"><?= $pengacara['keterangan']; ?></textarea>
                                <?php echo form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pendidikan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $pengacara['pendidikan']; ?>">
                                <?php echo form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Pengalaman</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="<?= $pengacara['pengalaman']; ?>">
                                <?php echo form_error('pengalaman', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Foto</label>
                            <div class="col-sm-12">
                                <input type="file" name="Foto" id="input-file-now-custom-1" class="dropify" data-default-file="<?= base_url('assets/BackEnd/img/profile/').$this->session->userdata('foto'); ?>" />
                                <?php echo form_error('Foto', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Simpan</button>
                        <a style="color: white" href="<?= base_url('Dashboard') ?>" type="button" class="btn btn-inverse waves-effect waves-light m-r-10">
                            <i class="fa fa-times m-r-5"></i>
                            <span>Batal</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
