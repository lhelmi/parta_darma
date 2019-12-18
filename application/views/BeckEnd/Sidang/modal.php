<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmid">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tambah Data <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?= $IdSidang ?>" class="form-control" id="IdSidang" name="IdSidang">

                    <input type="hidden" class="form-control" id="idDSidang" name="idDSidang">
                    
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Pengacara:</label><br>
                        <select name="IdPengacara" id="IdPengacara" class="form-control">
                            <option value="">--Pilih Pengacara--</option>
                            <?php foreach ($Pengacara as $dpeng): ?>
                                <option value="<?= $dpeng['IdPengacara'] ?>"><?= $dpeng['NamaPengacara'] ?></option>    
                            <?php endforeach ?>
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tempat:</label>
                        <input type="text" class="form-control" id="tempat" name="tempat">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Keterangan:</label><br>
                        <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit" name="submit" id="submit" class="btn btn-success waves-effect waves-light">
                        <i class="fa fa-check"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="excel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmidx" action="<?= site_url('administrator/Sidang/excel'); ?>" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Import Data</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?= $IdSidang ?>" class="form-control" id="IdSidang" name="IdSidang">
                    
                    <input type="file" name="inexcel">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse waves-effect" data-dismiss="modal">
                        <i class="fa fa-times"></i>
                        <span>Batal</span>
                    </button>
                    <button type="submit" name="submit" id="submit" class="btn btn-success waves-effect waves-light">
                        <i class="fa fa-check"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){

    const flashdata = $('.flash-data').data('flash');
    
    if (flashdata) {
        swal({
            title: 'Data ' + '<?= $title ?>',
            text:  flashdata,
            type: 'success',
            timer: 1500,
        });
    }

    $('#responsive-modal').on('hidden.bs.modal', function (e) {
        $('#tanggal').val('');
        $('#IdPengacara').val('');
        $('#tempat').val('');
        $('#keterangan').val('');
        $('#idDSidang').val('');

        $('.form-group').find('.text-danger').remove();
        $('.form-group').removeClass('has-success has-feedback').find('.text-danger').remove();
        $('.form-group').removeClass('has-error has-feedback').find('.text-danger').remove();
    });

    $('#modaltambah').on('click', function(){
        $('.modal-content form').attr('action', "<?= base_url('administrator/Sidang/add_detail') ?>");
        $('.modal-title').html('Tambah Data <?= $title; ?>');
        $('.modal-footer button[type=submit] ').html('Simpan')
        
        $('.form-group').find('.text-danger').remove();
        $('.form-control').removeClass('has-error has-feedback').find('.text-danger').remove();
    });

    $('#myTable').on('click', '#modalubah', function(){
        $('.modal-content form').attr('action', "<?= base_url('administrator/Sidang/edit_detail') ?>");
        $('.modal-title').html('Ubah Data <?= $title; ?>');
        $('.modal-footer button[type=submit] ').html('Ubah')
        const id = $(this).data('id');
        
        $.ajax({
            url:'<?= base_url('administrator/Sidang/getubah'); ?>',
            data:{id : id},
            method: 'post',
            dataType:'json',
            success: function(data){
                $('#tanggal').val(data.tanggal);
                $('#IdPengacara').val(data.IdPengacara);
                $('#tempat').val(data.tempat);
                $('#keterangan').val(data.keterangan);
                $('#idDSidang').val(data.idDSidang);
            }
        });
    });

    $('#frmid').on('submit', function(event){
        event.preventDefault();
        var me = $(this);

        $.ajax({
            url: me.attr('action'),
            type: 'post',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
                     
            dataType:'json',
            success: function(response){
                if (response.success == true) {
                    window.location.href =  '';
                }else{
                    $.each(response.messages, function(key, value){
                        
                        var element = $('#' + key);
                        $(element).closest('.form-group')
                        .removeClass('has-error has-feedback')
                        .addClass(value.length > 0 ? 'has-error has-feedback' : 'has-success has-feedback')
                        .find('.text-danger')
                        .remove();

                        $(element).closest('.form-group').find('.text-danger').remove();
                        $(element).after(value);
                    });
                }
            },
            error : function(response){
                alert('error');
            }
        });


    });

    $('#myTable').on('click', '#btndelete', function(){
        const id = $(this).data('id');
        swal({
            title: 'Apakah anda yakin?',
            text: "Anda tidak akan dapat mengembalikan data ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText : 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }, function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url:'<?= base_url('administrator/Sidang/deletedetail'); ?>',
                    data:{id : id},
                    method: 'post',
                    dataType:'json',
                    success: function(data){
                        window.location.href =  '';
                    },
                    error:function(data){
                        alert('error')
                    }
                });
            }
        });
    });

});
</script>