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
					url:'<?= base_url('administrator/Pengacara/delete'); ?>',
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