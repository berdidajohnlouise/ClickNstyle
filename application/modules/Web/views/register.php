
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

              <select style="background:#151215" name="usertype" required>
                  <option selected="selected" disabled="disabled">Select a User type</option>
                  <option value="1">Salon Customer</option>
                  <option value="2">Salon Admin</option>
              </select>
                <input type="email" name="email" value="" placeholder="Email Address" required>
                <input type="text" name="fname" value="" placeholder="First Name" required>
                <input type="text" name="lname" value="" placeholder="Last Name" required>
                <input type="text" name="address" value="" placeholder="Address" required>
                <div class="text-right">
                  <button class="button large" type="submit">Register</button>
                </div>

							</div>
						</div>
            </form>
					</div>
				</div>
			</main>
