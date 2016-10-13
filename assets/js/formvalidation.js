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

//update Account form validation

// var updateprofile = $('.updateprofile').bootstrapValidator({
//     fields : {
//        firstname:{
//          validators: {
//            trigger:'focus',
//            notEmpty:{
//              message: "Password is required <br> "
//            }
//          }
//        },
//        lastname:{
//          validators:{
//            trigger:'focus',
//            notEmpty:{
//              message: "Email is required <br>"
//            }
//          }
//        },
//        address:{
//          validators:{
//            trigger:'focus',
//            notEmpty:{
//              message: "Email is required <br>"
//            }
//          }
//        }
//     }
//   }).on('success.form.bv', function(e) {
//           // Prevent submit form
//           e.preventDefault();
//           var $form     = $(e.target),
//           newvalidator = $form.data('bootstrapValidator');
//            //$form.find('.alert').html('Thanks for signing up. Now you can sign in as ' + validator.getFieldElements('username').val()).show();
//           var image = $("#uploadImage").prop('files')[0];
//
//
//
//           // userdetails.append('firstname',$('#firstname').val());
//           // userdetails.append('lastname',$('#lastname').val());
//           // userdetails.append('address',$('#address').val());
//           // userdetails.append('image',image);
//           var userdetails = {
//              'firstname':$('#firstname').val(),
//              'lastname':$('#lastname').val(),
//              'address':$('#address').val(),
//              'image':image
//            };
//
//           $.post('Account_management/updateprofile',{data:userdetails},function(data){
//             console.log(data);
//           });
//   });
//

});
