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
                        <a href="<?= base_url('administrator/Pengacara/add') ?>" type="button" class="btn btn-success waves-effect waves-light m-r-10">
                            <i class="fa fa-plus m-r-5"></i>
                            <span>Tambah Data</span>
                        </a>
                    </div>
                    
                    <!-- <a href="#" id="modaltambah" data-toggle="modal" data-target="#responsive-modal"><h3 class="box-title m-b-30">Tambah Data</h3></a> -->
                    
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table color-bordered-table danger-bordered-table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Pengacara</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">JK</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1; foreach ($Pengacara as $km) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td class="text-center"><?= $km['NamaPengacara'] ?></td>
                                        <td class="text-center"><?= $km['Email'] ?></td>
                                        <td class="text-center"><?= $km['Jk'] ?></td>
                                        <td class="text-center"><?= $km['Foto'] ?></td>
                                        <td class="text-center">
                                            <!-- <a class="btn btn-primary btn-circle" href="<?= base_url('administrator/Pengacara/edit/').$km['IdPengacara'] ?>">
                                                <i class="ti-pencil-alt"></i>
                                            </a> -->

                                            <button type="button" class="btn btn-warning btn-circle" data-toggle="modal" id="btndelete" data-id="<?= $km['IdPengacara']; ?>">
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