

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
                                    <h3 class="box-title">Manage Salon Services</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addService" style="position:absolute; z-index:1; right:300px;">Add Salon Services</button>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Service image</th>
                                                <th>Service name</th>
                                                <th>Service description</th>
                                                <th>Service Price</th>
                                                <th>Service Duration</th>
                                                <th>Service Type</th>
                                                <th>Options</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(!empty($services)){?>
                                          <?php foreach($services as $row):?>
                                          <tr>
                                            <td><img src="<?php echo base_url();?>assets/servicesimage/<?php echo $row->service_photo;?>" width="50" height="50"/></td>
                                            <td><?php echo ucfirst($row->servicename);?></td>
                                            <td><?php echo ucfirst($row->description);?></td>
                                            <td>&#8369; <?php echo $row->price;?></td>
                                            <td><?php echo ucfirst($row->duration);?></td>
                                            <td><?php echo ucfirst($row->service_type);?></td>
                                            <td><a href="#updateService" data-toggle="modal" data-id="<?php echo $row->serviceID;?>" class="updateService" style="color:green"><i class="fa fa-edit"></i> Edit </a><span style="padding-left:3px;"><a href="#" onclick="deleteService(<?php echo $row->serviceID;?>)" style="color:red"><i class="fa fa-edit"></i> Delete</a></span></td>
                                          </tr>
                                        <?php endforeach;}?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->


          <!-- Modal -->
          <div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Services</h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Services_management_salon/addServices" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Services Image:</strong>

              				<br>

                      <input type="file" name="uploadimage" id="uploadImage" class="form-control has-feedback-left" style="display:none;"/>
              				<a href="javascript:void(0)"><img  onclick="click_image()" style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/servicesimage/salonservices.jpg" alt=""></a>

                    </div>

                    <div class="col-md-7">

                        <div class="form-group">
                          <label for="servicename">Service name:</label>
                          <input type="text" class="form-control" name="servicename" value=""  required>
                        </div>

                         <div class="form-group">
                          <label for="servicedesc">Service Description:</label>
                          <textarea name="servicedesc" class="form-control" rows="8" cols="30"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="price">Price:</label>
                          <input type="number" class="form-control" name="price" value="" required>
                        </div>

                        <div class="form-group">
                          <label for="serviceduration">Service Duration:</label>
                          <select class="form-control" name="serviceduration" required>
                            <option selected="selected" disabled>--Service Duration--</option>
                            <option>15 minutes</option>
                            <option>30 minutes</option>
                            <option>1 Hour</option>
                            <option>1 Hour and 15 minutes</option>
                            <option>1 Hour and 30 minutes</option>
                            <option>2 Hours</option>
                            <option>2 Hours and 15 minutes</option>
                            <option>2 Hours and 30 minutes</option>
                            <option>3 Hours</option>
                            <option>3 Hours and 15 minutes</option>
                            <option>3 Hours and 30 minutes</option>
                            <option>4 Hours</option>
                            <option>4 Hours and 15 minutes</option>
                            <option>4 Hours and 30 minutes</option>
                            <option>5 Hours</option>
                            <option>5 Hours and 15 minutes</option>
                            <option>5 Hours and 30 minutes</option>
                          </select>
                        </div>


                        <div class="form-group">
                          <label for="servicetype">Service Type:</label>
                          <select class="form-control" name="servicetype" required>
                            <option selected="selected" disabled>--Service Type--</option>
                            <option>Hair</option>
                            <option>Manicure</option>
                            <option>Pedicure</option>
                            <option>Makeup</option>
                            <option>Massage</option>
                            <option>Facial</option>
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



          <!-- update staff modal -->


          <!-- Modal -->
          <div class="modal fade" id="updateService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><span id="updateLabel"></span></h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Services_management_salon/updateservices" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Service Image:</strong>

                      <br>

                      <input type="file" name="uploadServices" id="uploadStaff" class="form-control has-feedback-left" style="display:none;"/>
                      <a href="javascript:void(0)"><img onclick="click_staff()" style="width:150px;height:150px;" id="staff_avatar" src="<?php echo base_url();?>assets/servicesimage/salonservices.jpg" alt=""></a>

                    </div>

                    <div class="col-md-7">
                        <input type="hidden" name="serviceid" id="serviceid" value="">
                        <div class="form-group">
                          <label for="servicename">Service name:</label>
                          <input type="text" class="form-control" name="servicename" value="" id="servicename"  required>
                        </div>

                         <div class="form-group">
                          <label for="servicedesc">Service Description:</label>
                          <textarea name="servicedesc" class="form-control" rows="8" id="servicedesc" cols="30"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="price">Price:</label>
                          <input type="number" class="form-control" name="price" id="price" value="" required>
                        </div>

                        <div class="form-group">
                          <label for="serviceduration">Service Duration:</label>
                          <select class="form-control" name="serviceduration" id="duration" required>
                            <option selected="selected" disabled>--Service Duration--</option>
                            <option>15 minutes</option>
                            <option>30 minutes</option>
                            <option>1 Hour</option>
                            <option>1 Hour and 15 minutes</option>
                            <option>1 Hour and 30 minutes</option>
                            <option>2 Hours</option>
                            <option>2 Hours and 15 minutes</option>
                            <option>2 Hours and 30 minutes</option>
                            <option>3 Hours</option>
                            <option>3 Hours and 15 minutes</option>
                            <option>3 Hours and 30 minutes</option>
                            <option>4 Hours</option>
                            <option>4 Hours and 15 minutes</option>
                            <option>4 Hours and 30 minutes</option>
                            <option>5 Hours</option>
                            <option>5 Hours and 15 minutes</option>
                            <option>5 Hours and 30 minutes</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="servicetype">Service Type:</label>
                          <select class="form-control" name="servicetype" id="servicetype" required>
                            <option selected="selected" disabled>--Service Type--</option>
                            <option>Hair</option>
                            <option>Manicure</option>
                            <option>Pedicure</option>
                            <option>Makeup</option>
                            <option>Massage</option>
                            <option>Facial</option>
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
