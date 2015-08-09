jQuery(document).ready(function() {
  // With Form Validation
  jQuery("#" + addFormID).validate({
    rules: rules_,
    messages: messages_,
    highlight: function(label) {
      jQuery(label).closest('.control-group').addClass('error');
    },
    success: function(label) {
      label
        .text('Ok!').addClass('valid')
        .closest('.control-group').addClass('success');
    }
  });
});
