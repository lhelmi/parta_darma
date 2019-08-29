<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form <?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('assets/BackEnd/') ?>#">Dashboard</a></li>
                    <li>Data Sidang</li>
                    <li class="active"><?= $title ?></li>

                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"> With Horizontal two column</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" action="<?= base_url('administrator/Sidang/edit/'). $idx ?>"  class="form-horizontal">
                                <input type="hidden" name="IdKlien" value="<?= $klient['IdKlien'] ?>">
                                <input type="hidden" name="IdSidang" value="<?= $sidang['IdSidang'] ?>">
                                <div class="form-body">
                                    <h3 class="box-title">Data Diri</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="NamaKlien" value="<?= $klient['NamaKlien'] ?>"> 
                                                     <?php echo form_error('NamaKlien', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Jenis Kelamin</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="JkKlien">
                                                        <option value="">--Pilih Jenis Kelamin--</option>
                                                        <option <?= $klient['JkKlien']=='L' ? 'Selected' : '' ?> value="L">Pria</option>
                                                        <option <?= $klient['JkKlien']=='P' ? 'Selected' : '' ?> value="P">Wanita</option>
                                                    </select>
                                                     <?php echo form_error('JkKlien', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="EmailKlien" value="<?= $klient['EmailKlien'] ?>">
                                                    <?php echo form_error('EmailKlien', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">No Telp</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="NoTelpKlien" class="form-control" value="<?= $klient['NoTelpKlien'] ?>">
                                                    <?php echo form_error('NoTelpKlien', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Alamat</label>
                                                <div class="col-md-9">
                                                    <textarea name="AlamatKlien" class="form-control"><?= $klient['AlamatKlien'] ?></textarea><br>
                                                    <?php echo form_error('AlamatKlien', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                        <!--/span-->
                                    <!--/row-->
                                    <h3 class="box-title">Perkara</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Jenis Perkara</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="JenisPerkara">
                                                        <option value="">--Pilih Jenis Perkara--</option>
                                                        <option <?= $sidang['JenisPerkara']=='Keluarga' ? 'Selected' : '' ?> value="Keluarga">Keluarga</option>
                                                        <option <?= $sidang['JenisPerkara']=='Bisnis' ? 'Selected' : '' ?> value="Bisnis">Bisnis</option>
                                                        <option <?= $sidang['JenisPerkara']=='Hutang Piutang' ? 'Selected' : '' ?> value="Hutang Piutang">Hutang Piutang</option>
                                                        <option <?= $sidang['JenisPerkara']=='Pidana dan Laporan Polisi' ? 'Selected' : '' ?> value="Pidana dan Laporan Polisi">Pidana dan Laporan Polisi</option>
                                                        <option <?= $sidang['JenisPerkara']=='Pertanahan dan Property' ? 'Selected' : '' ?> value="Pertanahan dan Property">Pertanahan dan Property</option>
                                                        <option <?= $sidang['JenisPerkara']=='Lainnya' ? 'Selected' : '' ?> value="Lainnya">Lainnya</option>
                                                    </select>
                                                    <?php echo form_error('JenisPerkara', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Lawan</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="Lawan" value="<?= $sidang['Lawan'] ?>">
                                                    <?php echo form_error('Lawan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-check"></i> Simpan</button>
                                                    <a style="color: white" href="<?= base_url('administrator/Sidang') ?>" type="button" class="btn btn-inverse waves-effect waves-light m-r-10">
                                                        <i class="fa fa-times m-r-5"></i>
                                                        <span>Batal</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> </div>
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
