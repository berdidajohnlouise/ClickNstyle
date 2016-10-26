<!-- Default snippet for navigation -->
<div class="main-navigation">
  <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
  <ul class="menu">
    <li class="menu-item"><a href="<?php echo base_url();?>">Home</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>Web/about">About</a></li>
    <li class="menu-item current-menu-item"><a href="<?php echo base_url();?>Web/salons">Salons</a></li>
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
          <a href="#" class="current wow fadeInRight" data-filter="*">All Salons</a>
        </div>
      </div>

      <div class="filterable-items">

        <?php if(!empty($salons)){?>
        <?php foreach($salons as $row):?>

        <div class="gallery-item filterable-item">
          <a href="<?php echo base_url();?>Web/salon/<?php echo $row->SalonID;?>">
            <figure class="featured-image">
              <img src="<?php echo base_url();?>assets/usersimage/<?php echo $row->user_image;?>" alt="">
              <figcaption>
                <h2 class="gallery-title">Salon Name : <?php echo ucfirst($row->SalonName);?></h2>
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
