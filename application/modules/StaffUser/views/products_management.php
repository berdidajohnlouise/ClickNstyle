

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

                <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">View Salon Products</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Salon Name</th>
                                                <th>Products image</th>
                                                <th>Products name</th>
                                                <th>Products brand</th>
                                                <th>Products price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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

                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
