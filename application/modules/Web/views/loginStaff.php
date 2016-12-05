<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>ClickNStyle | Log in as salon staff</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />


    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign-in as salon staff</div>

              <form class="contact-form" method="post">
                <div class="body bg-gray">
                    <div class="alert alert-danger" role="alert" id="alert login" hidden></div>
                    <div class="form-group">
                        <input type="text" name="username" id="userid" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" name="submit" class="btn bg-olive btn-block" id="loginform">Sign me in</button>
                </form>
                    <a href="<?php echo base_url();?>Web/login" class="text-center">Back to main login page</a>

                </div>


            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(function(){
              var validator = $('.contact-form').bootstrapValidator({
                  fields : {
                     username:{
                       validators: {
                         trigger:'focus',
                         notEmpty:{
                           message: "Username is required <br> "
                         }
                       }
                     },
                     password:{
                       validators:{
                        trigger:'focus',
                         notEmpty:{
                           message: "Password is required <br> "
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
            var username = $('#userid').val();
            var password = $('#password').val();

            var userdata = {
              'username':username,
              'password':password
            };
            var url ="<?php echo base_url();?>Auth/loginStaff";
            $.post(url,{data:userdata},function(result){


              var result1 = result.toString().replace(/\s/g, "") ;
              if(result1=="Login"){
                window.location.href = "<?php echo base_url();?>Functions/staff_user";
              }
              else{
                $form.find('.alert').html('Incorrect User Credentials! Please Try Again').show();
              }

            });

        });
          });
        </script>



    </body>
</html>
