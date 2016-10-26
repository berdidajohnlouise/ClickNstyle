

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
                                    <h3 class="box-title">Manage Salon Calendar</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCalendar" style="position:absolute; z-index:1; right:300px;">Add Salon Events</button>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Calendar Title</th>
                                                <th>Calendar Description</th>
                                                <th>Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <?php if(!empty($calendars)){?>
                                          <?php foreach($calendars as $row):?>
                                          <tr>

                                            <td><?php echo ucfirst($row->cal_name);?></td>
                                            <td><?php echo $row->cal_description;?></td>
                                            <td> <?php echo date('M. d, Y',strtotime($row->cal_date));?></td>
                                            <td><a href="#updateCalendar" data-toggle="modal" data-id="<?php echo $row->cal_id;?>" class="updateCalendar" style="color:green"><i class="fa fa-edit"></i> Edit </a><span style="padding-left:3px;"><a href="#" onclick="deleteCalendar(<?php echo $row->cal_id;?>)" style="color:red"><i class="fa fa-edit"></i> Delete</a></span></td>
                                          </tr>
                                        <?php endforeach; }?>


                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->


          <!-- Modal -->
          <div class="modal fade" id="addCalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Salon Event</h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Calendar_management_salon/addCalendar" method="post">

                    <div class="col-md-12">

                        <div class="form-group">
                          <label for="caltitle">Calendar Title:</label>
                          <input type="text" class="form-control" name="caltitle" value="" required>
                        </div>

                        <div class="form-group">
                         <label for="caldate">Date:</label>
                         <input type="date" class="form-control"name="caldate" value="" required>
                       </div>

                         <div class="form-group">
                          <label for="caldesc">Description:</label>
                          <textarea name="caldesc" rows="8" cols="40" class="form-control" required></textarea>
                        </div>



                    </div>

                  </div><!-- end of row -->

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
              </form>
              </div>
            </div>
          </div>



          <!-- update staff modal -->


          <!-- Modal -->
          <div class="modal fade" id="updateCalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><span id="updateLabel"></span></h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Calendar_management_salon/updateCalendar" method="post" enctype="multipart/form-data">

                      <div class="col-md-12">

                        <input type="hidden" name="calid" id="calid" value="">
                        <div class="form-group">
                          <label for="caltitle">Calendar Title:</label>
                          <input type="text" class="form-control" name="caltitle" id="caltitle" value="" required>
                        </div>

                        <div class="form-group">
                         <label for="caldate">Date:</label>
                         <input type="date" class="form-control" name="caldate" id="caldate" value="" required>
                       </div>

                         <div class="form-group">
                          <label for="caldesc">Description:</label>
                          <textarea name="caldesc" id="caldesc" rows="8" cols="40" class="form-control" required></textarea>
                        </div>

                      </div>


                  </div><!-- end of row -->

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
              </form>
              </div>
            </div>
          </div>
