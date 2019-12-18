<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data <?= $title ?></h4>
            </div>
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

                    <?php echo $this->session->flashdata('pesan') ?>

                     <table id="myTable" class="table table-striped table color-bordered-table danger-bordered-table">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th><i class="fa fa-bookmark"> NAMA</th>
                            <th><i class="fa fa-bullhorn"></i> EMAIL</th>
                            <th><i class=" fa fa-edit"></i> AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($hubungi as $hub) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $hub['nama'] ?></td>
                            <td><?php echo $hub['email'] ?></td>
                            <td>
                                <?php if ($this->session->userdata('role') == 'pengacara') { ?>
                                    <a class="btn btn-success btn-circle" href="<?= base_url('administrator/Sidang/detail/').$hub['IdSidang'] ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                <?php }else{ ?>
                                    <a class="btn btn-success btn-circle" href="<?= site_url('Dashboard/updatebacanotif/') .$hub['admin_notif_id'].'/'.$hub['id_hubungi']; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                <?php } ?>
                            
                                <button type="button" class="btn btn-warning btn-circle" id="btndelete" data-id="<?= $hub['id_hubungi']; ?>">
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