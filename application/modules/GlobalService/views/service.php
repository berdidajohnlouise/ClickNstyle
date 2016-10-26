<!-- Default snippet for navigation -->
<div class="main-navigation">
  <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
  <ul class="menu">
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService">Home</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService/about">About</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService/salons">Salons</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService/gallery">Salons Services</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService/contact">Contact</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Functions">My Account</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Auth/logout">Logout</a></li>

  </ul> <!-- .menu -->
</div> <!-- .main-navigation -->

<div class="mobile-navigation"></div>
</div>
</header>




<main class="main-content">
				<div class="page">
          <center><h2 style="text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;"><?php echo ucfirst($service->servicename);?> Service</h2></center>
					<div class="container">

            <div class="row">

              <div class="col-md-5">
                 <img src="<?php echo base_url();?>assets/servicesimage/<?php echo $service->service_photo;?>" alt="" width="300" height="200"/>
                  <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Service Information:</h4><br>
                  <h5>Service Name:</h5><span> <?php echo ucfirst($service->servicename);?></span>
                  <h5>Service Duration:</h5><span> <?php echo $service->duration;?></span>
                  <h5>Price:</h5><span> &#8369; <?php echo $service->price;?></span>
                  <h5>Service Details:</h5><span> <?php echo ucfirst($service->description);?></span>

                  <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Salon:</h4><br>

                  <div class="row">


                    <div class="col-md-4">
                          <a href="<?php echo base_url();?>GlobalService/salon/<?php echo $service->SalonID;?>"><img src="<?php echo base_url();?>assets/usersimage/<?php echo $service->user_image;?>" alt="" width="100" height="100"/></a>
                    </div>
                    <div class="col-md-8">
                        <b>Salon name :</b> <i> <?php echo ucfirst($service->SalonName);?></i><br>
                        <b>Address :</b> <?php echo $service->address;?> <br>
                        <b>Contact no:</b> <?php echo $service->ContactNum;?>
                     </div>


                  </div>


              </div>
              <div class="col-md-1">&nbsp;</div>

              <div class="col-md-6 col" >
                <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Location:</h4><br>
                <iframe style="height:300px;width:100%;border:0;" frameborder="0" src="https://maps.google.com/maps?q=<?php echo $service->Latitude;?>,<?php echo $service->Longitude;?>&hl=es;z=14&amp;output=embed"></iframe>
                  <?php if(!empty($services)){ ?>
                    <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Other Services:</h4><br>
                <?php foreach($services as $row):?>
                <!-- services -->
                <div class="row">
                  <div class="col-md-3">
                        <a href="<?php echo base_url();?>GlobalService/service/<?php echo $row->serviceID?>"><img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="" width="100" height="100"/></a>
                  </div>
                  <div class="col-md-8">
                      <b>Service Name :</b> <i><?php echo ucfirst($row->servicename);?> </i><br>
                      <b>Price :</b> &#8369; <?php echo $row->price;?><br>
                      <b>Duration :</b> <?php echo $row->duration;?><br>
                      <b>Details :</b> <?php echo $row->description;?><br>
                  </div>
                </div>
                <?php endforeach; }?>


              </div>


            </div>

          </div>

        </div>

</main>
