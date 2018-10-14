$(function(){

	var path = window.location.pathname;
	if (path == '/master/index' || path == '/master') {
		$('#myTable').dataTable();
		$('.edit-modal').click(function(){
			var branch_id = $(this).data('id');
			$('#myModal').modal({
				show:true
			});
			$.ajax({
				url 	:'master/ajax_detail_branch',
				dataType:'json',
				type 	:'POST',
				data 	: {"branch_id":branch_id},
				success : function(data){
					console.log(data);
					var content = '<tr><td><strong>Nama Cabang</strong></td><td>'+data.branch_name+'</td></tr>'+
                      			  '<tr><td><strong>Alamat</strong></td><td>'+data.branch_address+'</td></tr>'+
                      			  '<tr><td><strong>Kota</strong></td><td>'+data.city["nama_kota"]+'</td></tr>'+
                      			  '<tr><td><strong>No. Telp</strong></td><td>'+data.branch_telp+'</td></tr>'+
                      			  '<tr><td><input type="hidden" name="branch_id" value="'+branch_id+'"></td><td><button type="submit" class="btn btn-small btn-success">Edit Cabang</td></tr>';
                    $('.modal-body .table').html('');
                    $('.modal-body .table').append(content);
				}
			})
		});
	} else if(path == '/marketing/add_actionplan') {

	}

});