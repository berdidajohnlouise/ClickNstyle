

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
                                    <h3 class="box-title">Manage Salon Promos</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPromos" style="position:absolute; z-index:1; right:300px;">Add Salon Promos</button>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Promos image</th>
                                                <th>Promos name</th>
                                                <th>Promos detail</th>
                                                <th>Promos price</th>
                                                <th>Expiration date</th>
                                                <th>Date posted</th>
                                                <th>Options</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                          <?php if(!empty($promos)){?>
                                          <?php foreach($promos as $row):?>
                                          <tr>
                                            <td><img src="<?php echo base_url();?>assets/promosimage/<?php echo $row->Photo;?>" width="50" height="50"/></td>
                                            <td><?php echo ucfirst($row->Name);?></td>
                                            <td><?php echo ucfirst($row->promoDetails);?></td>
                                            <td>&#8369; <?php echo $row->Price;?></td>
                                            <td><?php echo date('M. d, Y',strtotime($row->expDate));?></td>
                                            <td><?php echo date('M. d, Y',strtotime($row->datePosted));?></td>
                                            <td><a href="#updatePromo" data-toggle="modal" data-id="<?php echo $row->promoID;?>" class="updatePromo" style="color:green"><i class="fa fa-edit"></i> Edit </a><span style="padding-left:3px;"><a href="#" onclick="deletePromo(<?php echo $row->promoID;?>)" style="color:red"><i class="fa fa-edit"></i> Delete</a></span></td>
                                          </tr>
                                        <?php endforeach; }?>

                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->


          <!-- Modal -->
          <div class="modal fade" id="addPromos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Salon Promos</h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Promos_management_salon/addPromo" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Services Image:</strong>

              				<br>

                      <input type="file" name="uploadimage" id="uploadImage" class="form-control has-feedback-left" style="display:none;"/>
              				<a href="javascript:void(0)"><img  onclick="click_image()" style="width:150px;height:150px;" id="img_avatar2" src="<?php echo base_url();?>assets/promosimage/promosample.jpg" alt=""></a>

                    </div>

                    <div class="col-md-7">

                        <div class="form-group">
                          <label for="promoname">Promo Name:</label>
                          <input type="text" class="form-control" name="promoname" value=""  required>
                        </div>

                         <div class="form-group">
                          <label for="promodesc">Promo Details:</label>
                          <textarea name="promodesc" class="form-control" rows="8" cols="30"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="price">Price:</label>
                          <input type="number" class="form-control" name="price" value="" required>
                        </div>

                        <div class="form-group">
                          <label for="serviceduration">Promos Expiration Date:</label>
                          <input type="date" name="expdate" class="form-control" value="">
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
          <div class="modal fade" id="updatePromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><span id="updateLabel"></span></h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Promos_management_salon/updatepromo" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                      <strong style="margin-left:5px;">Select Promos Image:</strong>

                      <br>

                      <input type="file" name="uploadPromo" id="uploadStaff" class="form-control has-feedback-left" style="display:none;"/>
                      <a href="javascript:void(0)"><img onclick="click_staff()" style="width:150px;height:150px;" id="staff_avatar" src="<?php echo base_url();?>assets/servicesimage/salonservices.jpg" alt=""></a>

                    </div>

                    <div class="col-md-7">
                        <input type="hidden" name="promoid" id="promoid" value="">
                        <div class="form-group">
                          <label for="promoname">Promo Name:</label>
                          <input type="text" class="form-control" name="promoname" value="" id="promoname"  required>
                        </div>

                         <div class="form-group">
                          <label for="promodesc">Promo Details:</label>
                          <textarea name="promodesc" class="form-control" rows="8" cols="30" id="promodesc"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="price">Price:</label>
                          <input type="number" class="form-control" name="price" value="" id="price" required>
                        </div>

                        <div class="form-group">
                          <label for="serviceduration">Promos Expiration Date:</label>
                          <input type="date" name="expdate" class="form-control" value="" id="serviceduration">
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
