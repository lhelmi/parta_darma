<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Form Data <?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('assets/BackEnd/') ?>#">Dashboard</a></li>
                    <li>Data Penunjang</li>
                    <li class="active">Tambah Data <?= $title ?></li>

                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-30">Form</h3>
                    <form class="form-material" action="<?= base_url('administrator/DataPenunjang/add') ?>" enctype="multipart/form-data" method="post">
                        
                        <div class="form-group">
                            <label class="col-md-12">Nama Klien</label>
                            <div class="col-md-12">
                                <select name="IdKlien" value="<?= set_value('IdKlien'); ?>" class="form-control select2">
                                    <option value="">--Pilih Nama Klien--</option>
                                    <?php foreach ($hub as $keyx) { ?>
                                        <option value="<?= $keyx['IdKlien']; ?>"><?= $keyx['NamaKlien'] ?> - <?= $keyx['EmailKlien'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('IdKlien', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group" id="dynamic_field">
                            <label class="col-md-12">Bidang Keahlian</label>
                            <div class="col-md-12">
                                <input multiple="" name="File[]" type="file" id="babla" />
                                <?php echo form_error('File', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                                
                        </div>
                        
                        
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Simpan</button>
                        <a style="color: white" href="<?= base_url('administrator/DataPenunjang') ?>" type="button" class="btn btn-inverse waves-effect waves-light m-r-10">
                            <i class="fa fa-times m-r-5"></i>
                            <span>Batal</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
