<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmid" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tambah Data <?= $title; ?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                    
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Nama:</label>
                        <input type="text" class="form-control" name="Nama" id="Nama">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Email:</label>
                        <input type="text" class="form-control" name="Email" id="Email">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Password:</label>
                        <input type="Password" class="form-control" name="Password" id="Password">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Konfirmasi Password:</label>
                        <input type="Password" class="form-control" name="Konfirmasi" id="Konfirmasi">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Foto:</label>
                        <input name="Foto" id="Foto" type="file" class="form-control" />
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
    	$('#Nama').val('');
    	$('#Email').val('');
    	$('#Password').val('');
    	$('#Konfirmasi').val('');
    	$('#id').val('');
    	
		$('.form-group').find('.text-danger').remove();
		$('.form-group').removeClass('has-success has-feedback').find('.text-danger').remove();
		$('.form-group').removeClass('has-error has-feedback').find('.text-danger').remove();
	});

	$('#modaltambah').on('click', function(){
		$('.modal-content form').attr('action', "<?= base_url('administrator/Admin/add') ?>");
		$('.modal-title').html('Tambah Data <?= $title; ?>');
		$('.modal-footer button[type=submit] ').html('Simpan')
		
		$('.form-group').find('.text-danger').remove();
		$('.form-control').removeClass('has-error has-feedback').find('.text-danger').remove();
	});

	$('#myTable').on('click', '#modalubah', function(){
		$('.modal-content form').attr('action', "<?= base_url('administrator/Admin/edit') ?>");
		$('.modal-title').html('Ubah <?= $title; ?>');
		$('.modal-footer button[type=submit] ').html('Ubah')
		const id = $(this).data('id');
		
		$.ajax({
			url:'<?= base_url('administrator/Admin/getubah'); ?>',
			data:{id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#id').val(data.id);
				$('#Nama').val(data.Nama);
		    	$('#Email').val(data.Email);
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
				alert(response);
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
					url:'<?= base_url('administrator/Admin/delete'); ?>',
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