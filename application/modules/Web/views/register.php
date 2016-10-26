<!-- Default snippet for navigation -->
<div class="main-navigation">
  <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
  <ul class="menu">
    <li class="menu-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/about">About</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/salons">Salons</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/gallery">Salon Services</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/contact">Contact</a></li>
    <li class="menu-item current-menu-item"><a href="<?php echo base_url();?>Web/register">Register</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/login">Login</a></li>
  </ul> <!-- .menu -->
</div> <!-- .main-navigation -->

<div class="mobile-navigation"></div>
</div>
</header>

			<main class="main-content">
				<div class="page">
					<div class="container">
						<h2>Registration Form</h2>

						<h5 style="color:#aea9ad"><?php echo $notsuccess;?></h5>
           <form action="<?php echo base_url();?>Auth/register" class="contact-form" method="post">
						<div class="row">
							<div class="col-md-5">

  									<input type="text" name="username" value="" placeholder="Username" required>
                    <input type="password" name="password" value="" placeholder="Password" id="password"  data-minlength="6"  required>
                    <div class="help-block with-errors"></div>
                    <input type="password" name="confirmpassword" value="" placeholder="Confirm Password" id="confirmpassword"  required>


							</div>
							<div class="col-md-6 col-md-offset-1">

              <select style="background:#151215" name="usertype" id="usertype" required>
                  <option selected="selected" disabled="disabled">Select a User type</option>
                  <option value="1">Salon Customer</option>
                  <option value="2">Salon Admin</option>
              </select>
              <div id="customer">
                <input type="email" name="email" value="" placeholder="Email Address" required>
                <input type="text" name="fname" value="" placeholder="First Name" required>
                <input type="text" name="lname" value="" placeholder="Last Name" required>
                <input type="text" name="address" value="" placeholder="Address" required>
              </div>

              <div id="salonadmin" hidden>
                <input type="text" name="salonname" value="" placeholder="Salon Name" required>
                <input type="text" name="contactnumber" value="" id="contactnumber" placeholder="Contact Number" required>
                <input type="text" name="salonaddress" value="" placeholder="Salon Address" id="salonaddress" required>
                <input type="email" name="salonemail" value="" placeholder="Email Address" required>
                <input type="hidden" name="long" value="" id="long"/>
                <input type="hidden" name="lat" value="" id="lat"/>
                <input type="text" name="salonowner" value="" placeholder="Salon Owner" required>
                <textarea name="salondetails"  placeholder="Salon Details" required></textarea>
              </div>
                <div class="text-right">
                  <button class="button large" type="submit">Register</button>
                </div>

							</div>
						</div>
            </form>
					</div>
				</div>
			</main>
