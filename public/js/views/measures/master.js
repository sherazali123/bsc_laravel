var addFormID = 'add_new';
var editFormID = 'edit_new';

var rules_ = {
  name: "required",
  initiative_id: "required",
  target: "required",
  period: "required",
  starting_date: "required",
};
var messages_ = {
  name: "Please enter name",
  initiative_id: "Please select initiative",
  target: "Please enter target for your measure",
  period: "Please select period for your measure",
  starting_date: "Please enter target for your measure",
};

jQuery.noConflict();

jQuery(document).ready(function(){

	// date picker
	if(jQuery('#starting_date').length > 0)
		jQuery( "#starting_date" ).datepicker({
      dateFormat: 'yy-mm-dd'
      });

});
