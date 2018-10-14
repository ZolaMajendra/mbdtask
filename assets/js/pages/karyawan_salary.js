$(function(){
	var path = window.location.pathname;
	if (path == '/karyawan/salary_management') {
		$('#myTable').dataTable();
	} else if(path == '/karyawan/add_salary') {
		$(".month_picker").datepicker({
	    	changeMonth: true,
    		changeYear: true,
    		showButtonPanel: true,
    		dateFormat: 'MM yy',
    		maxDate: '+6m',
    		onClose: function(dateText, inst) { 
	            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
	            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
	            $(this).datepicker('setDate', new Date(year, month, 1));
	            setTimeout(function(){$('#hideMonth').html('');},100);
	        },
	        beforeShow: function() { 
	        	$('#hideMonth').html('.ui-datepicker-calendar{display:none;}'); 
	        },
	 	});

	 	$(".date_picker").datepicker({
			dateFormat: 'dd-mm-yy',
			maxDate: '0'
		});

	 	$(".price-field").priceFormat({
	        prefix: '',
	        centsLimit: 0,
	        thousandsSeparator: '.',
	        clearOnEmpty: true
      	});
	}

});