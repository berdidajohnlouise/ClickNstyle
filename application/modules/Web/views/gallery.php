<!-- Default snippet for navigation -->
<div class="main-navigation">
  <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
  <ul class="menu">
    <li class="menu-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/about">About</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/salons">Salons</a></li>
    <li class="menu-item current-menu-item"><a href="<?php echo base_url();?>Web/gallery">Salon Services</a></li>
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
    <div class="container">
      <div class="text-center">
        <div class="filter-links filterable-nav">
          <select class="mobile-filter">
            <option value="*">Show all</option>
            <option value=".hair">hair</option>
            <option value=".manicure">manicure</option>
            <option value=".pedicure">pedicure</option>
            <option value=".face">face</option>
            <option value=".makeup">makeup</option>
          </select>
          <a href="#" class="current wow fadeInRight" data-filter="*">Show all</a>
          <a href="#" class="wow fadeInRight" data-wow-delay=".2s" data-filter=".hair">hair</a>
          <a href="#" class="wow fadeInRight" data-wow-delay=".4s" data-filter=".manicure">manicure</a>
          <a href="#" class="wow fadeInRight" data-wow-delay=".6s" data-filter=".pedicure">pedicure</a>
          <a href="#" class="wow fadeInRight" data-wow-delay=".8s" data-filter=".face">face</a>
          <a href="#" class="wow fadeInRight" data-wow-delay=".10s" data-filter=".massage">Massage</a>
          <a href="#" class="wow fadeInRight" data-wow-delay="1s" data-filter=".makeup">makeup</a>
        </div>
      </div>

      <div class="filterable-items">

        <?php if(!empty($manicure)){?>
        <?php foreach($manicure as $row):?>

        <div class="gallery-item filterable-item manicure">
          <a href="<?php echo base_url();?>Web/service/<?php echo $row->serviceID;?>">
            <figure class="featured-image">
              <img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="">
              <figcaption>
                <h2 class="gallery-title">Salon Name : <?php echo ucfirst($row->SalonName);?></h2>
                <p>Service type : <?php echo ucfirst($row->service_type);?></p>
                <p>Price :  &#8369; <?php echo $row->price;?></p>
                <p>Address : <?php echo ucfirst($row->Address);?></p>
              </figcaption>
            </figure>
          </a>
        </div>

      <?php endforeach; }?>
      <?php if(!empty($hair)){?>
        <?php foreach($hair as $row):?>

        <div class="gallery-item filterable-item hair">
          <a href="<?php echo base_url();?>Web/service/<?php echo $row->serviceID;?>">
            <figure class="featured-image">
              <img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="">
              <figcaption>
                <h2 class="gallery-title">Salon Name : <?php echo ucfirst($row->SalonName);?></h2>
                <p>Service type : <?php echo ucfirst($row->service_type);?></p>
                <p>Price :  &#8369; <?php echo $row->price;?></p>
                <p>Address : <?php echo ucfirst($row->Address);?></p>
              </figcaption>
            </figure>
          </a>
        </div>

      <?php endforeach; }?>
      <?php if(!empty($pedicure)){?>
        <?php foreach($pedicure as $row):?>

        <div class="gallery-item filterable-item pedicure">
          <a href="<?php echo base_url();?>Web/service/<?php echo $row->serviceID;?>">
            <figure class="featured-image">
              <img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="">
              <figcaption>
                <h2 class="gallery-title">Salon Name : <?php echo ucfirst($row->SalonName);?></h2>
                <p>Service type : <?php echo ucfirst($row->service_type);?></p>
                <p>Price :  &#8369; <?php echo $row->price;?></p>
                <p>Address : <?php echo ucfirst($row->Address);?></p>
              </figcaption>
            </figure>
          </a>
        </div>

      <?php endforeach; }?>
      <?php if(!empty($makeup)){?>
        <?php foreach($makeup as $row):?>

        <div class="gallery-item filterable-item makeup">
          <a href="<?php echo base_url();?>Web/service/<?php echo $row->serviceID;?>">
            <figure class="featured-image">
              <img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="">
              <figcaption>
                <h2 class="gallery-title">Salon Name : <?php echo ucfirst($row->SalonName);?></h2>
                <p>Service type : <?php echo ucfirst($row->service_type);?></p>
                <p>Price :  &#8369; <?php echo $row->price;?></p>
                <p>Address : <?php echo ucfirst($row->Address);?></p>
              </figcaption>
            </figure>
          </a>
        </div>

      <?php endforeach; }?>
      <?php if(!empty($massage)){?>
        <?php foreach($massage as $row):?>

        <div class="gallery-item filterable-item massage">
          <a href="<?php echo base_url();?>Web/service/<?php echo $row->serviceID;?>">
            <figure class="featured-image">
              <img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="">
              <figcaption>
                <h2 class="gallery-title">Salon Name : <?php echo ucfirst($row->SalonName);?></h2>
                <p>Service type : <?php echo ucfirst($row->service_type);?></p>
                <p>Price :  &#8369; <?php echo $row->price;?></p>
                <p>Address : <?php echo ucfirst($row->Address);?></p>
              </figcaption>
            </figure>
          </a>
        </div>

      <?php endforeach; }?>

      <?php if(!empty($facial)){?>
        <?php foreach($facial as $row):?>

        <div class="gallery-item filterable-item face">
          <a href="<?php echo base_url();?>Web/service/<?php echo $row->serviceID;?>">
            <figure class="featured-image">
              <img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" alt="">
              <figcaption>
                <h2 class="gallery-title">Salon Name : <?php echo ucfirst($row->SalonName);?></h2>
                <p>Service type : <?php echo ucfirst($row->service_type);?></p>
                <p>Price :  &#8369; <?php echo $row->price;?></p>
                <p>Address : <?php echo ucfirst($row->Address);?></p>
              </figcaption>
            </figure>
          </a>
        </div>

      <?php endforeach; }?>
      </div>
    </div>
  </div>
</main>
