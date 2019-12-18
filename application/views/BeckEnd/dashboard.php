<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?= $title ?></h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"> Jadwal</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <div class="wow" style="margin-bottom: 10px">
                                <a style="color: white; " href="<?= site_url('administrator/Sidang') ?>" type="button" class="btn btn-success waves-effect waves-light m-r-10">
                                    <i class="fa fa-external-link m-r-5"></i>
                                    <span>Lihat Jadwal Lainnya secara detail..</span>
                                </a>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-body">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table color-bordered-table danger-bordered-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Tanggal</th>
                                                    <th class="text-center">Lawan</th>
                                                    <th class="text-center">Jenis Perkara</th>
                                                    <th class="text-center">Tempat</th>
                                                    <th class="text-center">Pengacara</th>
                                                    <th class="text-center">Keterangan</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i =1; foreach ($Sidang as $km) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i++ ?></td>
                                                        <td class="text-center"><?= $km['tanggal'] ?></td>
                                                        <td class="text-center"><?= $km['Lawan'] ?></td>
                                                        <td class="text-center"><?= $km['JenisPerkara'] ?></td>
                                                        <td class="text-center"><?= $km['tempat'] ?></td>
                                                        <td class="text-center"><?= $km['NamaPengacara'] ?></td>
                                                        <td class="text-center"><?= $km['detailket'] ?></td>
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
            </div>
        </div>
    </div>
</div>