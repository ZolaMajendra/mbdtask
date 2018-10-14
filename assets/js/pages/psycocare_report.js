$(function(){

	var path = window.location.pathname;
	if (path == '/psycocare/report') {
		$('#myTable').dataTable();
	} else if(path == '/psycocare/add_report') {
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
	        }
	 	});
	}

});