

var defaultTitle = "BSC";
var defaultSubtitle = "Report for BSC";
var monthCategories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var baseUrl = 'http://' + location.hostname + '/bsc/public/';



jQuery.noConflict();

jQuery(document).ready(function(){

jQuery("select[name=plan_id]").on("change", function(e) {
            var plan_id = jQuery(this).val();
            jQuery.ajax({
                type: "GET",
                url: baseUrl + 'api/plans/' + plan_id,
                dataType: 'json',
                success: function(json) {

                    var $dimension_id = jQuery("select[name=dimension_id]");
                    var $objective_id = jQuery("select[name=objective_id]");
                    var $initiative_id = jQuery("select[name=initiative_id]");

                    if($dimension_id.length > 0) {

	                    $dimension_id.empty(); // remove old options
	                    $dimension_id.append(jQuery("<option></option>")
	                            .attr("value", '').text('Please Select'));
	                    jQuery.each(json.content.plan.dimensions, function(value, key) {

	                        $dimension_id.append(jQuery("<option></option>")
	                                .attr("value", key.id).text(key.name));
	                    });

	                    if($objective_id.length > 0) {
	                    	 $objective_id.empty(); // remove old options
	                    }
	                    if($initiative_id.length > 0) {
	                    	 $initiative_id.empty(); // remove old options
	                    }														
                    }


                }
            });

        });

jQuery("select[name=dimension_id]").on("change", function(e) {
            var dimension_id = jQuery(this).val();
            jQuery.ajax({
                type: "GET",
                url: baseUrl + 'api/dimensions/' + dimension_id,
                dataType: 'json',
                success: function(json) {

                    var $objective_id = jQuery("select[name=objective_id]");
                    var $initiative_id = jQuery("select[name=initiative_id]");

                    if($objective_id.length > 0) {

	                    $objective_id.empty(); // remove old options
	                    $objective_id.append(jQuery("<option></option>")
	                            .attr("value", '').text('Please Select'));
	                    jQuery.each(json.content.dimension.objectives, function(value, key) {

	                        $objective_id.append(jQuery("<option></option>")
	                                .attr("value", key.id).text(key.name));
	                    });

	                    if($initiative_id.length > 0) {
	                    	 $initiative_id.empty(); // remove old options
	                    }														
                    }


                }
            });

        });


jQuery("select[name=objective_id]").on("change", function(e) {
            var objective_id = jQuery(this).val();
            jQuery.ajax({
                type: "GET",
                url: baseUrl + 'api/objectives/' + objective_id,
                dataType: 'json',
                success: function(json) {

                    var $initiative_id = jQuery("select[name=initiative_id]");

                    if($initiative_id.length > 0) {
	                    $initiative_id.empty(); // remove old options
	                    $initiative_id.append(jQuery("<option></option>")
	                            .attr("value", '').text('Please Select'));
	                    jQuery.each(json.content.objective.initiatives, function(value, key) {

	                        $initiative_id.append(jQuery("<option></option>")
	                                .attr("value", key.id).text(key.name));
	                    });													
                    }


                }
            });

    });



});