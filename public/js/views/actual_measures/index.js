jQuery.noConflict();

jQuery(document).ready(function(){


	// dynamic table
	if(jQuery('#index_1').length > 0) {
		jQuery('#index_1').dataTable({
			"sPaginationType": "full_numbers",
			"aaSortingFixed": [[0,'asc']],
			// "fnDrawCallback": function(oSettings) {
			// 	jQuery.uniform.update();
			// }
		});
	}

});
