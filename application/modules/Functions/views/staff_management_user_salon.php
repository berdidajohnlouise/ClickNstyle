

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
                                    <h3 class="box-title">Manage Salon User Accounts</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStaffs" id="addStaffsButton" style="position:absolute; z-index:1; right:300px;">Add Salon Staffs Account</button>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Staff Image</th>
                                                <th>Staff Name</th>
                                                <th>Staff Username</th>
                                                <th>Staff Password</th>
                                                <th>Staff Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(!empty($staffs)){?>
                                          <?php foreach($staffs as $row):?>
                                          <tr>
                                            <td><img src="<?php echo base_url();?>assets/staffsimage/<?php echo $row->photo;?>" width="50" height="50"/></td>
                                            <td><?php echo ucfirst($row->lastName).', '.$row->firstName;?></td>
                                            <td><?php echo ucfirst($row->userName);?></td>
                                            <td >*****************</td>
                                            <td><?php if($row->status==0){echo 'Inactive';}else{echo 'Active';}?></td>
                                            <td><a href="#updateStaff" data-toggle="modal" data-id="<?php echo $row->suID;?>" class="updateSU" style="color:green"><i class="fa fa-edit"></i> Edit </a><span style="padding-left:3px;"><a href="#" onclick="updateSU(<?php echo $row->suID;?>)" style="color:red"><i class="fa fa-edit"></i> Delete</a></span></td>
                                          </tr>
                                        <?php endforeach;}?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->


          <!-- Modal -->
          <div class="modal fade" id="addStaffs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Salon Staff Accounts</h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Staff_management_user_salon/addStaffUser" class="staffInfo" method="post">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Staff Image:</strong>

                      <br>
                      <img style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/staffsimage/user.png" alt="">

                    </div>

                    <div class="col-md-7">

                      <div class="form-group">
                        <label for="staffsname">Staffs Name:</label>
                        <select class="form-control" name="staffsname" id="staffsname">

                        </select>
                      </div>

                        <div class="form-group">
                          <label for="username">Username:</label>
                          <input type="text" class="form-control" name="username" id="username" value=""  required>
                        </div>

                         <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" name="password" class="form-control" id="password" value="" required/>
                        </div>

                        <div class="form-group">
                         <label for="repassword">Confirm Password:</label>
                         <input type="password" name="repassword" class="form-control" value="" required/>
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
          <div class="modal fade" id="updateStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><span id="updateLabel"></span></h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Staff_management_user_salon/updateSU" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Staff Account Image:</strong>

                      <br>

                      <img style="width:150px;height:150px;" id="staff_image" src="<?php echo base_url();?>assets/staffsimage/user.png" alt="">

                    </div>

                    <div class="col-md-7">

                      <input type="hidden" name="suid" value="" id="suid">
                      <div class="form-group">
                        <label for="staffsname">Staffs Name:</label>
                        <input type="text" class="form-control" value="" id="staffsname1" disabled>
                      </div>

                        <div class="form-group">
                          <label for="username">Username:</label>
                          <input type="text" class="form-control" name="username" id="username1" value=""  required>
                        </div>

                         <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" name="password" class="form-control" value="" required/>
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
