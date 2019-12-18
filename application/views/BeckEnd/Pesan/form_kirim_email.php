<body class="fix-header">






    <!-- row -->
    <div class="row">
        <!-- Left sidebar -->
        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-2 col-md-3  col-sm-4 col-xs-12 inbox-panel">
                        
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 mail_listing">
                        <h3 class="box-title">Buat Pesan Balasan</h3>
                        <!--main content start-->
                        <section id="main-content">
                            <section class="wrapper">
                                <!-- page start-->
                                <div class="row mt">
                                    <div class="col-sm-9">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <div class="compose-mail">
                                                    <?php foreach ($hubungi as $hub) : ?>
                                                    <form method="post" enctype="multipart/form-data"  action="<?php echo base_url('administrator/hubungi_kami/kirim_email_aksi')  ?>">

                                                        <div class="form-group">
                                                            <label for="to" class="">Kepada:</label>
                                                            <input type="hidden" name="id_hubungi" value="<?php echo $hub->id_hubungi ?>" tabindex="1" id="to" class="form-control">
                                                            <input type="hidden" name="email" class="form-control" value="<?php echo $hub->email  ?>">
                                                            <input type="input" disabled class="form-control" value="<?php echo $hub->email  ?>">
                                                            <br>
                                                            <div class="compose-options">
                                                                <a class="btn btn-primary btn-sm" type="submit" onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();" href="javascript:;">Cc</a>
                                                                <a class="btn btn-primary btn-sm" type="submit" onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();" href="javascript:;">Bcc</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group hidden">
                                                            <label for="cc" class="">Cc:</label>
                                                            <input type="text" tabindex="2" id="cc" class="form-control" name="cc">
                                                        </div>
                                                        <div class="form-group hidden">
                                                            <label for="bcc" class="">Bcc:</label>
                                                            <input type="text" tabindex="2" id="bcc" class="form-control" name="bcc">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="subject" class="">Subjek:</label>
                                                            <input type="text" name="subject" tabindex="1" id="subject" class="form-control">
                                                        </div>
                                                        <div class="compose-editor">
                                                            <textarea class="wysihtml5 form-control" name="pesan" rows="9"></textarea>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label for="subject" class="">Lampiran File:</label>
                                                            <input type="file" name="attachf" class="default">
                                                        </div>
                                                        <div class="alert alert-info"> Berikut jenis file yang support untuk dikirim sebagai Lampiran File: jpeg, gif, jpg png, pdf doc, docx, xlsx, xls, txt </div>
                                                        <br>
                                                        <div class="compose-btn">
                                                            <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i> Kirim</button>
                                                        </div>
                                                    </form>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                            <!-- /wrapper -->
                        </section>
                        <!-- /MAIN CONTENT -->
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>