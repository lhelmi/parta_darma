<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data <?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('assets/BackEnd/') ?>#">Dashboard</a></li>
                    <li>Pegawai</li>
                    <li class="active"><?= $title ?></li>

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
                                <select name="id_hubungi" value="<?= set_value('id_hubungi'); ?>" class="form-control select2">
                                    <option value="">--Pilih Nama Klien--</option>
                                    <?php foreach ($hub as $keyx) { ?>
                                        <option value="<?= $keyx['id_hubungi']; ?>"><?= $keyx['nama'] ?> - <?= $keyx['email'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('id_hubungi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group" id="dynamic_field">
                            <label class="col-md-12">Bidang Keahlian</label>
                            <div class="col-md-12">
                                <input multiple="" name="File[]" type="file" id="babla" />
                                <?php echo form_error('File', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                                
                        </div>
                        
                        
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10"><i class="fa fa-check"></i> Simpan</button>
                        <a href="<?= base_url('administrator/Pengacara') ?>" type="button" class="btn btn-inverse waves-effect waves-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
