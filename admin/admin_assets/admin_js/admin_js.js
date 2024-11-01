jQuery(document).ready(function($){

	// date_range_picker
	$(".date_range_picker").datepicker({
		changeMonth: true,
		changeYear: true
	});

	// select 2
	$(".multiple_select_tags").select2({
	  tags: true,
	  tokenSeparators: [','],
	});

	$(".multiple_select_areas").select2({
	  tags: true
	});

	$(".single_select_2").select2();
	// end select 2

	// append more rt data

	// datatable
	 $('.wl_tables').DataTable();
	 // $('.dataTables_wrapper .dataTables_length select').css({'padding-right': '17px !important;'});

	//  $('.wl_table_length').css({'margin-left': '10%'});
	//  $('.wl_table_info').css({'margin-left': '10%'});

	//  $('.wl_table_filter').css({'margin-right': '10%'});
	//  $('.wl_table_paginate').css({'margin-right': '10%'});
	// end data table

	// ----------------------------------------

	// ----------------------------------------

	

});