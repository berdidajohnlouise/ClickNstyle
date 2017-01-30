

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
                                    <h3 class="box-title">View Reservations</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Service</th>
                                                <th>Staff</th>
                                                <th>Customer</th>
                                                <th>Time Reserved</th>
                                                <th>End Reservation</th>
                                                <th>Date Reserved</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(!empty($reservation)){?>
                                          <?php foreach($reservation as $row):?>
                                            <tr>
                                              <td><img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" width="50" height="50"/> &nbsp;<?php echo $row->servicename;?></td>
                                              <td><img src="<?php echo base_url();?>assets/staffsimage/<?php echo $row->photo;?>" width="50" height="50"/>&nbsp;<?php echo ucfirst($row->nickName);?></td>
                                              <td><img src="<?php echo base_url();?>assets/usersimage/<?php echo $row->user_image;?>" width="50" height="50"/>&nbsp;<?php echo ucfirst($row->lastname).', '.ucfirst($row->firstname);?></td>
                                              <td><?php $am = date('H',strtotime($row->timeReserved)); $hour = $am % 12 ? $am % 12 : 12 ; $time = $am >= 12 ? 'pm':'am'; echo $hour.':00 '.$time;?></td>
                                              <td><?php $am = date('H',strtotime($row->eos)); $hour = $am % 12 ? $am % 12 : 12 ; $time = $am >= 12 ? 'pm':'am'; echo $hour.':00 '.$time;?></td>
                                              <td><?php echo date('M. d, Y',strtotime($row->dateReserved));?></td>
                                              <td><a href="#" style="color:green"><i class="fa fa-check"></i> Confirm </a><span style="padding-left:3px;"><a href="#"  style="color:red"><i class="fa fa-times"></i> Cancel</a></span></td>
                                            </tr>

                                        <?php endforeach; }?>

                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
