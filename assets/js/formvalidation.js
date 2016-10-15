$(function(){
    var validator = $('.accountInfo').bootstrapValidator({
        fields : {
           password:{
             validators: {
               trigger:'focus',
               notEmpty:{
                 message: "Password is required <br> "
               },
               stringLength:{
                 min:6,
                 message: "Password must be 6 characters long <br>"
               }
             }
           },
           email:{
             validators:{
               trigger:'focus',
               emailAddress: {
                        message: 'The value is not a valid email address'
                },
               notEmpty:{
                 message: "Email is required <br>"
               }
             }
           }

        }
    }).on('success.form.bv', function(e) {
  // Prevent submit form
  e.preventDefault();
  var $form     = $(e.target),
  newvalidator = $form.data('bootstrapValidator');
   //$form.find('.alert').html('Thanks for signing up. Now you can sign in as ' + validator.getFieldElements('username').val()).show();
   var userdetails = {
     'username':$('#username').val(),
     'password':$('#password').val(),
     'email':$('#email').val()
   };
  var url ="http://localhost/clicknstyle/Functions/Account_management/updateaccount";

  $.post(url,{data:userdetails},function(result){
    var result1 = result.toString().replace(/\s/g, "") ;
    if(result1=="True"){
      alert('Successfull Updated');
      location.reload();
    }
    else{
      alert('Error Occured Please Contact Developer Team!');
    }

  });
});


});
