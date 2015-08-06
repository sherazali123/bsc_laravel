var addFormID = 'add_new';
var editFormID = 'edit_new';

var rules_ = {
  name: "required",
  password: {
    minlength: 6,
  },

  password_confirmation: {
    equalTo: "#password",
    minlength: 6,
  }
};
var messages_ = {
  name: "Please enter name",
  password: {

  }
};
