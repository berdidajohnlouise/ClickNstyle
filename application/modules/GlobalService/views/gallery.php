<!-- Default snippet for navigation -->
<div class="main-navigation">
  <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
  <ul class="menu">
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService">Home</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService/about">About</a></li>
    <li class="menu-item"><a href="<?php echo base_url();?>GlobalService/services">Services</a></li>
    <li class="menu-item current-menu-item"><a href="<?php echo base_url();?>GlobalService/gallery">Salons</a></li>
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
          <a href="#" class="wow fadeInRight" data-wow-delay="1s" data-filter=".makeup">makeup</a>
        </div>
      </div>

      <div class="filterable-items">

        <?php if(!empty($salons)){?>
        <?php foreach($salons as $row):?>

        <div class="gallery-item filterable-item manicure">
          <a href="<?php echo base_url();?>assets/usersimage/<?php echo $row->user_image;?>">
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


<?php if(!empty($products)){?>
<?php foreach($products as $row):?>
<tr>
  <td><?php echo ucfirst($row->SalonName);?></td>
  <td><img src="<?php echo base_url();?>assets/productsimage/<?php echo $row->photo;?>" width="50" height="50"/></td>
  <td><?php echo ucfirst($row->pro_name);?></td>
  <td><?php echo ucfirst($row->pro_brand);?></td>
  <td>&#8369; <?php echo $row->price;?></td>

</tr>
<?php endforeach; }?>
