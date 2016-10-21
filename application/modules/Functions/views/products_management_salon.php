

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
                                    <h3 class="box-title">Manage Salon Products</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct" style="position:absolute; z-index:1; right:300px;">Add Salon Product</button>
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
                                          <?php if(!empty($products)){?>
                                          <?php foreach($products as $row):?>
                                          <tr>
                                            <td><img src="<?php echo base_url();?>assets/productsimage/<?php echo $row->photo;?>" width="50" height="50"/></td>
                                            <td><?php echo ucfirst($row->pro_name);?></td>
                                            <td><?php echo ucfirst($row->pro_brand);?></td>
                                            <td>&#8369; <?php echo $row->price;?></td>
                                            <td><a href="#updateProduct" data-toggle="modal" data-id="<?php echo $row->pro_id;?>" class="updateProduct" style="color:green"><i class="fa fa-edit"></i> Edit </a><span style="padding-left:3px;"><a href="#" onclick="deleteProduct(<?php echo $row->pro_id;?>)" style="color:red"><i class="fa fa-edit"></i> Delete</a></span></td>
                                          </tr>
                                        <?php endforeach; }?>

                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->


          <!-- Modal -->
          <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Salon Products</h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Products_management_salon/addProduct" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Product Image:</strong>

              				<br>

                      <input type="file" name="uploadimage" id="uploadImage" class="form-control has-feedback-left" style="display:none;"/>
              				<a href="javascript:void(0)"><img  onclick="click_image()" style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/productsimage/productssample.jpg" alt=""></a>

                    </div>

                    <div class="col-md-7">

                        <div class="form-group">
                          <label for="productname">Product Name:</label>
                          <input type="text" class="form-control" name="productname" value=""  required>
                        </div>

                         <div class="form-group">
                          <label for="productbrand">Product Brand:</label>
                          <input type="text" name="productbrand" class="form-control" value="" required/>
                        </div>

                        <div class="form-group">
                          <label for="price">Price:</label>
                          <input type="number" class="form-control" name="price" value="" required>
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
