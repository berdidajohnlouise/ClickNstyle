<!-- Default snippet for navigation -->
<div class="main-navigation">
  <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
  <ul class="menu">
    <li class="menu-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/about">About</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/salons">Salons</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/gallery">Salon Services</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/contact">Contact</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/register">Register</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/login">Login</a></li>
  </ul> <!-- .menu -->
</div> <!-- .main-navigation -->

<div class="mobile-navigation"></div>
</div>
</header>




<main class="main-content">
				<div class="page">
          <center><h2 style="text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Welcome to <?php echo ucfirst($salon->SalonName);?></h2></center>
					<div class="container">

            <div class="row">

              <div class="col-md-5">
                 <img src="<?php echo base_url();?>assets/usersimage/<?php echo $salon->user_image;?>" alt="" />
                  <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Information:</h4><br>
                  <h5>Address:</h5><span> <?php echo ucfirst($salon->Address);?></span>
                  <h5>Contact no:</h5><span> <?php echo $salon->ContactNum; ?></span>
                  <h5>Owner:</h5><span> <?php echo ucfirst($salon->OwnerName);?></span>
                  <h5>Salon Details:</h5><span> <?php echo ucfirst($salon->SalonDetails);?></span>
                  <h5>Location:</h5>
                  <iframe style="height:300px;width:100%;border:0;" frameborder="0" src="https://maps.google.com/maps?q=<?php echo $salon->Latitude;?>,<?php echo $salon->Longitude;?>&hl=es;z=14&amp;output=embed"></iframe>

                  <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Staffs:</h4><br>
                  <?php if(!empty($staffs)){ foreach($staffs as $row):?>
                  <div class="row">


                    <div class="col-md-4">
                          <img src="<?php echo base_url();?>assets/staffsimage/<?php echo $row->photo;?>" alt="" width="100" height="100"/>
                    </div>
                    <div class="col-md-8">
                        <br>
                        <b>Staff name :</b> <i><?php echo ucfirst($row->lastName).', '.ucfirst($row->firstName);?></i><br>
                        <b>Position :</b> <?php echo ucfirst($row->jobdescription); ?>
                    </div>


                  </div>
                  <?php endforeach; }?>

              </div>
              <div class="col-md-1">&nbsp;</div>

              <div class="col-md-6 col" >

                <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Salon Calendar:</h4><br>

                <div id="calendar" style="background:#fff; color:#000; padding:5px; border-radius:10px;"></div>

                <?php if(!empty($services)){ ?>
                    <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Services:</h4><br>
                <?php foreach($services as $row):?>
                <!-- services -->
                <div class="row">
                  <div class="col-md-3">
                          <a href="<?php echo base_url();?>Web/service/<?php echo $row->serviceID?>"><img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="" width="100" height="100"/></a>
                  </div>
                  <div class="col-md-8">
                      <b>Service Name :</b> <i><?php echo ucfirst($row->servicename);?> </i><br>
                      <b>Price :</b> &#8369; <?php echo $row->price;?><br>
                      <b>Duration :</b> <?php echo $row->duration;?><br>
                      <b>Details :</b> <?php echo $row->description;?><br>
                  </div>
                </div>
                <?php endforeach; }?>


                <?php if(!empty($products)){ ?>
                <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Products:</h4><br>
                <?php foreach($products as $row):?>
                <!-- product  -->
                <div class="row">
                  <div class="col-md-3">
                        <img src="<?php echo base_url();?>assets/productsimage/<?php echo $row->photo;?>" alt="" width="100" height="100"/>
                  </div>
                  <div class="col-md-8">
                      <b>Product Name :</b> <i><?php echo ucfirst($row->pro_name);?> </i><br>
                      <b>Price :</b> &#8369; <?php echo $row->price;?><br>
                      <b>Brand :</b> <?php echo $row->pro_brand;?><br>
                  </div>
                </div>
                <?php endforeach; }?>

                <?php if(!empty($promos)){ ?>
                <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Promos:</h4><br>
                <?php foreach($promos as $row):?>
                <!-- promos  -->
                <div class="row">
                  <div class="col-md-3">
                        <img src="<?php echo base_url();?>assets/promosimage/<?php echo $row->Photo;?>" alt="" width="100" height="100"/>
                  </div>
                  <div class="col-md-8">
                      <b>Promo :</b> <i><?php echo ucfirst($row->Name);?></i><br>
                      <b>Price :</b> &#8369; <?php echo $row->Price;?><br>
                      <b>Details :</b> <?php echo ucfirst($row->promoDetails);?><br>
                      <b>Expiration Date :</b> <?php echo date('M. d, Y',strtotime($row->expDate));?><br>
                  </div>
                </div>
                <?php endforeach; }?>

                <?php if(!empty($announcements)){ ?>
                <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Announcements:</h4><br>
                <?php foreach($announcements as $row):?>
                <!-- announcement  -->
                <div class="row">

                  <div class="col-md-12">
                      <b>Announcement Title:</b> <i> <?php echo ucfirst($row->ann_name);?></i><br>
                      <b>Description :</b> <?php echo ucfirst($row->ann_description);?><br>
                      <b>Posted :</b> <?php echo date('F d, Y',strtotime($row->ann_date));?><br>
                  </div>
                </div>
                <?php endforeach; }?>

              </div>


            </div>

          </div>

        </div>

</main>
