<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data <?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('assets/BackEnd/') ?>#">Dashboard</a></li>
                    <li class="active"><?= $title ?></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"> Data Detail</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="form-body">
                                    <h3 class="box-title">Data Diri</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Nama</label>
                                                <div class="col-md-9">
                                                   <p class="form-control-static"> <?= $row['NamaKlien']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Jenis Kelamin</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?= $row['JkKlien'] == 'P' ? 'Wanita' : 'Pria'; ?> </p>
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
                                                   <p class="form-control-static"> <?= $row['EmailKlien']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">No Telp</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?= $row['NoTelpKlien']; ?> </p>
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
                                                    <p class="form-control-static"> <?= $row['AlamatKlien']; ?> </p>
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
                                                   <p class="form-control-static"> <?= $row['JenisPerkara']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Lawan</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?= $row['Lawan']; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
                    <div class="wow" style="margin-bottom: 10px">
                        <button type="button" id="modaltambah" data-toggle="modal" data-target="#responsive-modal" class="btn btn-success waves-effect waves-light m-r-10">
                            <i class="fa fa-plus m-r-5"></i>
                            <span>Tambah Sidang</span>
                        </button>

                        <button type="button" id="modalexcel" data-toggle="modal" data-target="#excel-modal" class="btn btn-success waves-effect waves-light m-r-10">
                            <i class="fa fa-file-excel-o m-r-5"></i>
                            <span>Import Data Excel</span>
                        </button>
                    </div>
                    
                    <!-- <a href="#" id="modaltambah" data-toggle="modal" data-target="#responsive-modal"><h3 class="box-title m-b-30">Tambah Data</h3></a> -->
                    
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table color-bordered-table danger-bordered-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tempat</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Pengacara</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1; foreach ($Sidang as $km) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td class="text-center"><?= $km['tempat'] ?></td>
                                        <td class="text-center"><?= $km['tanggal'] ?></td>
                                        <td class="text-center"><?= $km['NamaPengacara'] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" id="modalubah" data-target="#responsive-modal" data-id="<?= $km['idDSidang']; ?>">
                                                <i class="ti-pencil-alt"></i>
                                            </button>

                                            <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" id="btndelete" data-id="<?= $km['idDSidang']; ?>">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>