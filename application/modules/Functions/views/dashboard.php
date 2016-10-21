<!-- Right side column. Contains the navbar and content of the page -->
          <aside class="right-side">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                  <h1>
                    Welcome,
                      <small><?php if($userdetails->usertype==2){echo $userdetails->SalonName;}else{echo $userdetails->firstname.' '.$userdetails->lastname;} ?></small>
                  </h1>
                  <ol class="breadcrumb">
                      <li><a href="<?php echo base_url();?>Functions"><i class="fa fa-home"></i> Home</a></li>
                      <li class="active"><?php echo $title;?></li>
                  </ol>
              </section>

              <!-- Main content -->
              <section class="content">


                <div class="row">
        <?php if($userdetails->usertype==1 || $userdetails->usertype==0){?>
				<div class="col-md-2" align="center">
      <form action="<?php echo base_url();?>Functions/Account_management/updateprofile" method="post" enctype="multipart/form-data">
				<strong>Select Profile Image:</strong>

				<br>

        <input type="file" name="uploadimage" id="uploadImage" class="form-control has-feedback-left" style="display:none;"/>
				<a href="javascript:void(0)"><img  onclick="click_image()" style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/usersimage/<?php echo $userdetails->user_image;?>" alt=""></a>

				</div>

				<div class="col-md-4">

			 	<h2>Profile Information</h2>

					  <div class="form-group">
					    <label for="firstname">Firstname:</label>
					    <input type="text" class="form-control" name="firstname" value="<?php echo $userdetails->firstname;?>" id="firstname" required>
					  </div>

            <div class="form-group">
					    <label for="lastname">Lastname:</label>
					    <input type="text" class="form-control" name="lastname" value="<?php echo $userdetails->lastname;?>" id="lastname" required>
					  </div>

					  <div class="form-group">
					    <label for="address">Address:</label>
					    <input type="text" class="form-control" name="address" value="<?php echo $userdetails->address;?>" id="address" required>
					  </div>

					 <div align="right"> <button type="submit" class="btn btn-success">Update Profile</button></div>


           </form>


				</div>
        <?php }else if($userdetails->usertype == 2){?>
          <div class="col-md-2" align="center">

        <form action="<?php echo base_url();?>Functions/Account_management/updateprofile" method="post" enctype="multipart/form-data">

          <strong>Select Salon Image:</strong>
          <br>

          <input type="file" name="uploadimage" id="uploadImage" class="form-control has-feedback-left" style="display:none;"/>
          <a href="javascript:void(0)"><img  onclick="click_image()" style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/usersimage/<?php echo $userdetails->user_image;?>" alt=""></a>

          </div>

          <div class="col-md-4">

          <h2>Salon Information</h2>

              <div class="form-group">
                <label for="salonname">Salon Name:</label>
                <input type="text" class="form-control" name="salonname" value="<?php echo $userdetails->SalonName;?>" id="salonname" required>
              </div>

              <div class="form-group">
                <label for="salonaddress">Contact Number:</label>
                <input type="text" class="form-control" name="contactnumber" value="<?php echo $userdetails->ContactNum;?>" id="contactnumber" required>
              </div>

              <div class="form-group">
                <label for="salonaddress">Salon Address:</label>
                <input type="text" class="form-control" name="salonaddress" value="<?php echo $userdetails->Address;?>" id="salonaddress" required>
              </div>
              <input type="hidden" name="long" value="" id="long"/>
              <input type="hidden" name="lat" value="" id="lat"/>

              <div class="form-group">
                <label for="ownername">Owner Name:</label>
                <input type="text" class="form-control" name="ownername" value="<?php echo $userdetails->OwnerName;?>" id="ownername" required>
              </div>

              <div class="form-group">
                <label for="salondetails">Salon Details:</label>
                <textarea class="form-control" name="salondetails" rows="8" cols="25"><?php echo $userdetails->SalonDetails;?></textarea>
              </div>


             <div align="right"> <button type="submit" class="btn btn-success">Update Profile</button></div>


             </form>


          </div>


        <?php }?>
				<div class="col-md-2" align="center">

				</div>


					<div class="col-md-4">
					<h2>Account Information</h2>
					 <form class="accountInfo" method="post">
             <div class="alert alert-danger" role="alert" hidden></div>
					  <div class="form-group">
					    <label for="username">Username:</label>
					    <input type="text" class="form-control" value="<?php echo $userdetails->username;?>" id="username">
					  </div>
					  <div class="form-group">
					    <label for="password">New Password:</label>
					    <input type="password" class="form-control" name="password" id="password" value="">
					  </div>
					  <div class="form-group">
					    <label for="email">Email:</label>
					    <input type="text" class="form-control" name="email" id="email" value="<?php echo $userdetails->email;?>">
					  </div>
					  <div align="right"><button type="submit" name="submit" class="btn btn-primary">Update Account</button></div>
					</form>

				</div>


	</div> <!-- row -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
