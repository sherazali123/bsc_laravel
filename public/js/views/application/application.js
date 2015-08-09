
jQuery.noConflict();

jQuery(document).ready(function(){
	

	if (jQuery("#change_plan").length > 0) {

		jQuery('#change_plan select[name=id]').change(function(){
		  var url = jQuery("#change_plan").attr("action") + '?plan_id=' + jQuery(this).val();
		  window.location.replace(url);
		});
	}
	
});