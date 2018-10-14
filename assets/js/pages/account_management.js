/*
* @Author: DEV072
* @Date:   2016-12-06 17:34:47
* @Last Modified by:   dev-fandy
* @Last Modified time: 2017-05-13 16:21:13
*/
$(function(){
	var base_url = $('#base-url').val();
	var path = window.location.pathname;
	if (path == '/karyawan/account_management') {
		$('#myTable').dataTable();
		$('.edit-modal').click(function(){
			var account_id = $(this).data('id');
			$('#myModal').modal({
				show:true
			});
			$.ajax({
				url 	:'ajax_detail_profile',
				dataType:'json',
				type 	:'POST',
				data 	: {"account_id":account_id},
				success : function(data){
					console.log(data);
					var content = '<tr><td><strong>Nama</strong></td><td>'+data.profile_firstname+' '+data.profile_lastname+'</td></tr>'+
                      			  '<tr><td><strong>Jabatan</strong></td><td>'+data.appointment_id+'</td></tr>'+
                      			  '<tr><td><strong>No. HP</strong></td><td>'+data.phone_number+'</td></tr>'+
                      			  '<tr><td><strong>Alamat</strong></td><td>'+data.profile_address+'</td></tr>'+
                      			  '<tr><td><strong>Tempat Lahir</strong></td><td>'+data.birthplace+'</td></tr>'+
                      			  '<tr><td><strong>Tanggal Lahir</strong></td><td>'+data.birthdate+'</td></tr>'+
                      			  '<tr><td><strong>Pendidikan Terakhir</strong></td><td>'+data.education+'</td></tr>'+
                      			  '<tr><td><strong>Istitusi</strong></td><td>'+data.college+'</td></tr>'+
                      			  '<tr><td><strong>Nama Bank</strong></td><td>'+data.bank_name+'</td></tr>'+
                      			  '<tr><td><strong>No. Rekening</strong></td><td>'+data.bank_account+'</td></tr>'+
                      			  '<tr><td><input type="hidden" name="account_id" value="'+data.account_id+'"></td><td><button type="submit" class="btn btn-small btn-success">Edit Profile</td></tr>';
                    $('.modal-body .table').html('');
                    $('.modal-body .table').append(content);
				}
			})
		});
	} else if(path == '/karyawan/manage_account') {
		$(".date_picker").datepicker({
			dateFormat: 'dd-mm-yy',
			maxDate: '0',
			changeMonth: true,
    		changeYear: true 
		});
	} else if(document.URL.indexOf('/karyawan/edit_account/') > -1) {
		$(".date_picker").datepicker({
			dateFormat: 'dd-mm-yy',
			maxDate: '0',
			changeMonth: true,
    		changeYear: true 
		});
	}
});

