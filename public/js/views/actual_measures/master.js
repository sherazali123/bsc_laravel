var addFormID = 'add_new';
var editFormID = 'edit_new';

var rules_ = {
  actual_measure: "required",
  month: "required",
};
var messages_ = {
  actual_measure: "Please enter actual measure",
  month: "Please select month for your actual measure",
};

jQuery.noConflict();

jQuery(document).ready(function(){

	// date picker
	if(jQuery('#starting_date').length > 0)
		jQuery( "#starting_date" ).datepicker({
      dateFormat: 'yy-mm-dd'
      });

});
