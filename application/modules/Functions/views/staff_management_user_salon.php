

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
                                                <th>Products image</th>
                                                <th>Products name</th>
                                                <th>Products brand</th>
                                                <th>Products price</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>


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

                    <form action="<?php echo base_url();?>Functions/Products_management_salon/addProduct" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Staff Image:</strong>

                      <br>
                      <img style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/staffsimage/user.png" alt="">

                    </div>

                    <div class="col-md-7">

                      <div class="form-group">
                        <label for="staffsname">Staffs Name:</label>
                        <select class="form-control" name="" id="staffsname">
                          <option selected disabled>--Select Staff--</option>
                        </select>
                      </div>

                        <div class="form-group">
                          <label for="productname">Username:</label>
                          <input type="text" class="form-control" name="productname" value=""  required>
                        </div>

                         <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" name="password" class="form-control" value="" required/>
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
          <div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><span id="updateLabel"></span></h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Products_management_salon/updateProduct" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Products Image:</strong>

                      <br>

                      <input type="file" name="uploadProduct" id="uploadStaff" class="form-control has-feedback-left" style="display:none;"/>
                      <a href="javascript:void(0)"><img onclick="click_staff()" style="width:150px;height:150px;" id="staff_avatar" src="<?php echo base_url();?>assets/productsimage/productssample.jpg" alt=""></a>

                    </div>

                    <div class="col-md-7">

                        <input type="hidden" name="productid" value="" id="productid"/>
                        <div class="form-group">
                          <label for="productname">Product Name:</label>
                          <input type="text" class="form-control" name="productname" value="" id="productname" required>
                        </div>

                         <div class="form-group">
                          <label for="productbrand">Product Brand:</label>
                          <input type="text" name="productbrand" class="form-control" value="" id="productbrand" required/>
                        </div>

                        <div class="form-group">
                          <label for="price">Price:</label>
                          <input type="number" class="form-control" name="price" value="" id="price" required>
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
