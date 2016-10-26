

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
                                    <h3 class="box-title">View Salon Calendar</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                          <tr>
                                            <th>Salon Name</th>
                                            <th>Calendar Title</th>
                                            <th>Calendar Description</th>
                                            <th>Date</th>

                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php if(!empty($calendars)){?>
                                        <?php foreach($calendars as $row):?>
                                        <tr>
                                          <td><?php echo ucfirst($row->SalonName);?></td>
                                          <td><?php echo ucfirst($row->cal_name);?></td>
                                          <td><?php echo $row->cal_description;?></td>
                                          <td> <?php echo date('M. d, Y',strtotime($row->cal_date));?></td>
                                        </tr>
                                      <?php endforeach; }?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
