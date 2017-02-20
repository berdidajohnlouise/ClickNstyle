

<!-- Right side column. Contains the navbar and content of the page -->
          <aside class="right-side">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                  <h1>
                    Welcome,
                      <small><?php if(isset($userdetails)){echo $userdetails->userName;}?></small>
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
                                  <form action="<?php echo base_url();?>StaffUser/Reservation_monitoring_salon/queryByDate" method="post">
                                      <input type="date" class="btn btn-default" name="reservationdate" id="reservationdate" style="position:absolute; z-index:1; right:370px;"/>
                                      <button type="submit" class="btn btn-success" id="rsrvbutton" style="position:absolute; z-index:1; right:300px; display:none;" >Search</button>
                                  </form>
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
                                        <tbody >
                                          <?php if(!empty($reservation)){?>
                                          <?php foreach($reservation as $row):?>
                                            <tr id="reservationbody">
                                              <td><img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" width="50" height="50"/> &nbsp;<?php echo $row->servicename;?></td>
                                              <td><img src="<?php echo base_url();?>assets/staffsimage/<?php echo $row->photo;?>" width="50" height="50"/>&nbsp;<?php echo ucfirst($row->nickName);?></td>
                                              <td><img src="<?php echo base_url();?>assets/usersimage/<?php echo $row->user_image;?>" width="50" height="50"/>&nbsp;<?php echo ucfirst($row->lastname).', '.ucfirst($row->firstname);?></td>
                                              <td><?php $am = date('H',strtotime($row->timeReserved)); $hour = $am % 12 ? $am % 12 : 12 ; $time = $am >= 12 ? 'pm':'am'; echo $hour.':00 '.$time;?></td>
                                              <td><?php $am = date('H',strtotime($row->eos)); $hour = $am % 12 ? $am % 12 : 12 ; $time = $am >= 12 ? 'pm':'am'; echo $hour.':00 '.$time;?></td>
                                              <td><?php echo date('M. d, Y',strtotime($row->dateReserved));?></td>
                                              <td><?php if($row->rsrv_status==1){ echo '<span style="color:white; background:green; padding: 3px 10px;"> Confirmed </span>';}else if($row->rsrv_status==2){echo '<span style="color:white; background:red; padding: 3px 10px;"> Declined </span>';}?></td>
                                              
                                            </tr>

                                        <?php endforeach; }?>

                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
