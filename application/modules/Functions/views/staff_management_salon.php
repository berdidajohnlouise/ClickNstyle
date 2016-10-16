

<!-- Right side column. Contains the navbar and content of the page -->
          <aside class="right-side">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                  <h1>
                    Welcome,
                      <small><?php if($userdetails->usertype==2){echo $userdetails->SalonName;}else{echo $userdetails->firstname.' '.$userdetails->lastname;} ?></small>
                  </h1>
                  <ol class="breadcrumb">
                      <li><a href="<?php echo base_url();?>Functions"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active"><?php echo $title;?></li>
                  </ol>
              </section>

              <!-- Main content -->
              <section class="content">

                <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Staffs</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStaff" style="position:absolute; z-index:1; right:300px;">Add Staffs</button>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>User image</th>
                                                <th>Nickname</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Job Description</th>
                                                <th>Birthdate</th>
                                                <th>Contact number</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($staffs as $row):?>
                                          <tr>
                                            <td><img src="<?php echo base_url();?>assets/staffsimage/<?php echo $row->photo;?>" width="50" height="50"/></td>
                                            <td><?php echo ucfirst($row->nickName);?></td>
                                            <td><?php echo ucfirst($row->firstName);?></td>
                                            <td><?php echo ucfirst($row->lastName);?></td>
                                            <td><?php echo ucfirst($row->jobdescription);?></td>
                                            <td><?php echo date('M. d, Y',strtotime($row->dob));?></td>
                                            <td><?php echo $row->contactNo;?></td>
                                            <td><?php if($row->status==0){echo 'Inactive';}else{echo 'Active';}?></td>
                                            <td><a href="#updateStaff" data-toggle="modal" data-id="<?php echo $row->staffID;?>" class="updateStaff" style="color:green"><i class="fa fa-edit"></i> Edit </a><span style="padding-left:3px;"><a href="#" onclick="deleteStaff(<?php echo $row->staffID;?>)" style="color:red"><i class="fa fa-edit"></i> Delete</a></span></td>
                                          </tr>
                                        <?php endforeach;?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->


          <!-- Modal -->
          <div class="modal fade" id="addStaff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Staffs</h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Staff_management_salon/addstaffs" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Staff Image:</strong>

              				<br>

                      <input type="file" name="uploadimage" id="uploadImage" class="form-control has-feedback-left" style="display:none;"/>
              				<a href="javascript:void(0)"><img  onclick="click_image()" style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/staffsimage/user.png" alt=""></a>

                    </div>

                    <div class="col-md-7">

                        <div class="form-group">
                          <label for="nickname">Nickname:</label>
                          <input type="text" class="form-control" name="nickname" value=""  required>
                        </div>

                         <div class="form-group">
                          <label for="lastname">Lastname:</label>
                          <input type="text" class="form-control" name="lastname" value="" required>
                        </div>

                        <div class="form-group">
                          <label for="firstname">firstname:</label>
                          <input type="text" class="form-control" name="firstname" value="" required>
                        </div>

                        <div class="form-group">
                          <label for="position">Job Description:</label>
                          <select class="form-control" name="position" required>
                            <option selected="selected" disabled>--Job Descriptions--</option>
                            <option>Salon Assistant</option>
                            <option>Barber</option>
                            <option>Colorist</option>
                            <option>Makeup Artist</option>
                            <option>Esthetician</option>
                            <option>Hair Stylist</option>
                            <option>Nail Technician</option>
                            <option>Salon Receptionist</option>
                            <option>Salon Management</option>
                            <option>Shampoo Technician</option>
                            <option>Security Guard</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="contactnumber">Contact number:</label>
                          <input type="number" class="form-control" name="contactnumber" value="" required>
                        </div>

                        <div class="form-group">
                          <label for="dob">Date of birth:</label>
                          <input type="date" class="form-control" name="dob" value="" required>
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

                    <form action="<?php echo base_url();?>Functions/Staff_management_salon/updatestaff" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Staff Image:</strong>

                      <br>

                      <input type="file" name="uploadStaff" id="uploadStaff" class="form-control has-feedback-left" style="display:none;"/>
                      <a href="javascript:void(0)"><img onclick="click_staff()" style="width:150px;height:150px;" id="staff_avatar" src="<?php echo base_url();?>assets/staffsimage/user.png" alt=""></a>

                    </div>

                    <div class="col-md-7">
                        <input type="hidden" name="staffsid" value="" id="staffsid">
                        <div class="form-group">
                          <label for="nickname">Nickname:</label>
                          <input type="text" class="form-control" name="nickname" value="" id="nickname" required>
                        </div>

                         <div class="form-group">
                          <label for="lastname">Lastname:</label>
                          <input type="text" class="form-control" name="lastname" value="" id="lastname" required>
                        </div>

                        <div class="form-group">
                          <label for="firstname">firstname:</label>
                          <input type="text" class="form-control" name="firstname" value="" id="firstname" required>
                        </div>

                        <div class="form-group">
                          <label for="position">Job Description:</label>
                          <select class="form-control" name="position" id="position" required>
                            <option selected="selected" disabled>--Job Descriptions--</option>
                            <option>Salon Assistant</option>
                            <option>Barber</option>
                            <option>Colorist</option>
                            <option>Makeup Artist</option>
                            <option>Esthetician</option>
                            <option>Hair Stylist</option>
                            <option>Nail Technician</option>
                            <option>Salon Receptionist</option>
                            <option>Salon Management</option>
                            <option>Shampoo Technician</option>
                            <option>Security Guard</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="contactnumber">Contact number:</label>
                          <input type="number" class="form-control" name="contactnumber" value="" id="contactnumber" required>
                        </div>

                        <div class="form-group">
                          <label for="dob">Date of birth:</label>
                          <input type="date" class="form-control" name="dob" value="" id="dob" required>
                        </div>

                        <div class="form-group">
                          <label for="status">Status:</label>
                          <select class="form-control" name="status" id="status">
                            <option disabled>--Employee Status--</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                          </select>
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
