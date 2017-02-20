<!-- Right side column. Contains the navbar and content of the page -->
          <aside class="right-side">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                  <h1>
                    Welcome,
                      <small><?php if(isset($userdetails)){echo $userdetails->userName;}?></small>
                  </h1>
                  <ol class="breadcrumb">
                      <li><a href="<?php echo base_url();?>Functions"><i class="fa fa-home"></i> Home</a></li>
                      <li class="active"><?php echo $title;?></li>
                  </ol>
              </section>

              <!-- Main content -->
              <section class="content">


                <div class="row">
       
				<div class="col-md-2" align="center">
       <form action="<?php echo base_url();?>Functions/Account_management/updatestaffprofile" method="post" enctype="multipart/form-data">
				<strong>Select Profile Image:</strong>

				<br>

        <input type="file" name="uploadimage" id="uploadImage" class="form-control has-feedback-left" style="display:none;"/>
				<a href="javascript:void(0)"><img  onclick="click_image()" style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/staffsimage/<?php echo $userdetails->photo;?>" alt=""></a>

				</div>

				<div class="col-md-4">

			 	<h2>Profile Information</h2>


            <div class="form-group">
              <label for="nickname">Nick Name:</label>
              <input type="text" class="form-control" name="nickname" value="<?php if(isset($userdetails)){echo $userdetails->nickName;}else{ echo '';}?>"required>
            </div>

					  <div class="form-group">
					    <label for="firstname">Firstname:</label>
					    <input type="text" class="form-control" name="firstname" value="<?php if(isset($userdetails)){echo $userdetails->firstName;}else{ echo '';}?>"required>
					  </div>

            <div class="form-group">
					    <label for="lastname">Lastname:</label>
					    <input type="text" class="form-control" name="lastname" value="<?php if(isset($userdetails)){echo $userdetails->lastName;}else{ echo '';}?>" required>
					  </div>

            <div class="form-group">
              <label for="contactno">Contact No.:</label>
              <input type="text" class="form-control" name="contactno" value="<?php if(isset($userdetails)){echo $userdetails->contactNo;}else{ echo '';}?>"required>
            </div>

           

					 <div align="right"> <button type="submit" class="btn btn-success">Update Profile</button></div>


           </form>


				</div>
        
				<div class="col-md-2" align="center">

				</div>


					<div class="col-md-4">
					<h2>Account Information</h2>
					 <form action="<?php echo base_url();?>Functions/Account_management/staffinformation" method="post">
             <div class="alert alert-danger" role="alert" hidden></div>
					  <div class="form-group">
					    <label for="username">Username:</label>
					    <input type="text" class="form-control" value="<?php echo $userdetails->userName;?>" name="username" required>
					  </div>
					  <div class="form-group">
					    <label for="password">New Password:</label>
					    <input type="password" class="form-control" name="password" required>
					  </div>
					  
					  <div align="right"><button type="submit" name="submit" class="btn btn-primary">Update Account</button></div>
					</form>

				</div>


	</div> <!-- row -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
