var addFormID = 'add_new';
var editFormID = 'edit_new';

var rules_ = {
  name: "required",
  period: "required",
  starting_date: "required",
  ending_date: "required"
};
var messages_ = {
  name: "Please enter name",
  period: "Please select period for your plan",
  starting_date: "Please enter starting date for your plan",
  ending_date: "Please enter end date for your plan"
};


jQuery.noConflict();

jQuery(document).ready(function(){

	// date picker
	if(jQuery('#starting_date').length > 0)
		jQuery( "#starting_date" ).datepicker({
      dateFormat: 'yy-mm-dd'
      });
	// date picker
	if(jQuery('#ending_date').length > 0)
		jQuery( "#ending_date" ).datepicker({
      dateFormat: 'yy-mm-dd'
      });
});
