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

<!-- Reservation Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reservation</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <form action="<?php echo base_url();?>Functions/Reservation/addreservation" method="post">
          <div class="col-md-4">
            <strong style="margin-left:5px;">Staff to serve you:</strong>

            <br>
            <img style="width:150px;height:150px;" id="staff_image" src="<?php echo base_url();?>assets/staffsimage/user.png" alt=""/>

          </div>
          <input type="hidden" id="rsrv_salonid" name="SalonID" value="<?php echo $salon->SalonID; ?>"/>
          <div class="col-md-7">

              <div class="form-group">
                <label for="contactnumber">Select Service:</label>
                <select class="form-control" id="salonservices" name="salonservices" required>
                  <option selected="selected" disabled>-- Choose Services --</option>
                </select>
              </div>

              <div class="form-group" id="serviceDuration" hidden>
                <label for="contactnumber">Service Duration:</label>
                <select class="form-control" id="rsrv_duration" disabled>

                </select>
              </div>


              <div class="form-group" id="serviceStaff" hidden>
                <label for="">Staff :</label>
                <select class="form-control" name="serviceStaff" id="Staffs" required>
                  <option selected="selected" disabled>--Choose Staffs--</option>
                </select>
              </div>

              <div class="form-group">
                <label for="">Calendar:</label>
                <input type="date" name="calendar_date" class="form-control" id="calendar_date" required/>
              </div>

              <div class="form-group">
                  <label for="">Reserve Hours:</label>
                <select class="form-control" name="reservationhours" id="hours" required>
                  <!-- <?php
                  //$open = date('H',strtotime($salon->open_hours));
                  //$close = date('H',strtotime($salon->closing_hours));
                  //for($i = $open; $i < $close; $i++):
                  ?>
                       <option value="<?php //= //$i; ?>"><?php //= //$i % 12 ? $i % 12 : 12 ?>:00 <?php //= //$i >= 12 ? 'pm' : 'am' ?></option>
                  <?php //endfor ?> -->
                </select>
              </div>

          </div>

        </div><!-- end of row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="button" id="addReservation" class="btn btn-success">Save Changes</button>
      </div>
    </div>
  </div>
</div>
<!--End of Reservation Modal -->

<main class="main-content">
				<div class="page">
          <center><h2 style="text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Welcome to <?php echo ucfirst($salon->SalonName);?></h2></center>


          </div>
          <div class="container">

            <div class="row">
              <input type="hidden" id="calendarid" value="">
              <input type="hidden" id="salon_id" value="<?php echo $salon->SalonID; ?>"/>
              <div class="col-md-5">
                 <img src="<?php echo base_url();?>assets/usersimage/<?php echo $salon->user_image;?>" alt="" />
                  <h4 style="font-size: 28px;text-transform: uppercase;font-weight: 300;font-family: 'Novecento Sans', 'Open Sans', sans-serif; background-image: -webkit-linear-gradient(90deg, #cc7250, #f7d0c2);-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-bottom: 20px;">Information:</h4><br>
                  <h5>Address:</h5><span> <?php echo ucfirst($salon->Address);?></span>
                  <h5>Contact no:</h5><span> <?php echo $salon->ContactNum; ?></span>
                  <h5>Owner:</h5><span> <?php echo ucfirst($salon->OwnerName);?></span>
                  <h5>Salon Details:</h5><span> <?php echo ucfirst($salon->SalonDetails);?></span>
                  <h5>Opening Hours:</h5><span> <?php echo date('h:i a',strtotime($salon->open_hours));?></span>
                  <h5>Closing Hours:</h5><span> <?php echo date('h:i a',strtotime($salon->closing_hours));?></span>
                  <h5><br></h5><span> <a href="#" class="button large" data-toggle="modal" data-target="#myModal" id="btnreserve"><span class="fa fa-calendar fa-lg"> &nbsp;</span>Reserve now!</a></span>
                  <h5><br>Location:</h5>
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
                          <a href="<?php echo base_url();?>GlobalService/service/<?php echo $row->serviceID?>"><img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="" width="100" height="100"/></a>
                  </div>
                  <div class="col-md-8">
                      <b>Service Name :</b> <i><?php echo ucfirst($row->servicename);?> </i><br>
                      <b>Price :</b> &#8369; <?php echo $row->price;?><br>
                      <b>Duration :</b> <?php if($row->duration == 0.5){echo gmdate('H:i', floor($row->duration * 3600)).' minutes';}else{ echo gmdate('H:i', floor($row->duration * 3600)).' Hours';}?><br>
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
