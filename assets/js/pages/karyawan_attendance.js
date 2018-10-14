$(function(){

	var path = window.location.pathname;
	if (path == '/karyawan/attendance') {
		$(".date_picker").datepicker({
			dateFormat: 'dd-mm-yy',
			maxDate: '0'
		});
	} else if(path == '/karyawan/list_attendance') {
		$('#myTable').dataTable();
	}

});