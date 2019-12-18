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
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
                    <div class="wow" style="margin-bottom: 10px">
                        <button type="button" id="modaltambah" data-toggle="modal" data-target="#responsive-modal" class="btn btn-success waves-effect waves-light m-r-10">
                            <i class="fa fa-plus m-r-5"></i>
                            <span>Tambah Sidang</span>
                        </button>
                    </div>
                    
                    <!-- <a href="#" id="modaltambah" data-toggle="modal" data-target="#responsive-modal"><h3 class="box-title m-b-30">Tambah Data</h3></a> -->
                    
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table color-bordered-table danger-bordered-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1; foreach ($admin as $km) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td class="text-center"><?= $km['Nama'] ?></td>
                                        <td class="text-center"><?= $km['Email'] ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary btn-circle" data-toggle="modal" id="modalubah" data-target="#responsive-modal" data-id="<?= $km['id']; ?>">
                                                <i class="ti-pencil-alt"></i>
                                            </button>

                                            <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" id="btndelete" data-id="<?= $km['id']; ?>">
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