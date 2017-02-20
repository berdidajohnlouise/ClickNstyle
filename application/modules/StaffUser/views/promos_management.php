

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
                                    <h3 class="box-title">View Salon Promos</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th>Salon name</th>
                                              <th>Promos image</th>
                                              <th>Promos name</th>
                                              <th>Promos detail</th>
                                              <th>Promos price</th>
                                              <th>Expiration date</th>
                                              <th>Date posted</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(!empty($promos)){?>
                                          <?php foreach($promos as $row):?>
                                          <tr>
                                            <td><?php echo ucfirst($row->SalonName);?></td>
                                            <td><img src="<?php echo base_url();?>assets/promosimage/<?php echo $row->Photo;?>" width="50" height="50"/></td>
                                            <td><?php echo ucfirst($row->Name);?></td>
                                            <td><?php echo ucfirst($row->promoDetails);?></td>
                                            <td>&#8369; <?php echo $row->Price;?></td>
                                            <td><?php echo date('M. d, Y',strtotime($row->expDate));?></td>
                                            <td><?php echo date('M. d, Y',strtotime($row->datePosted));?></td>
                                          </tr>
                                        <?php endforeach; }?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
