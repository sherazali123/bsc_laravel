jQuery.noConflict();

jQuery(document).ready(function() {


    // dynamic table
    if (jQuery('#index_1').length > 0) {
        jQuery('#index_1').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0, 'asc']],
            // "fnDrawCallback": function(oSettings) {
            // 	jQuery.uniform.update();
            // }
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select =jQuery('<select><option value=""></option></select>')
                            .appendTo(jQuery(column.footer()).empty())
                            .on('change', function() {
                                var val = jQuery.fn.dataTable.util.escapeRegex(
                                        jQuery(this).val()
                                        );

                                column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                            });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    }

});
