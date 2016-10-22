

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
                                    <h3 class="box-title">Manage Salon Announcements</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAnnouncement" style="position:absolute; z-index:1; right:300px;">Add Salon Announcements</button>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Announcement Title</th>
                                                <th>Announcement Description</th>
                                                <th>Date Posted</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(!empty($announcement)){?>
                                          <?php foreach($announcement as $row):?>
                                          <tr>

                                            <td><?php echo ucfirst($row->ann_name);?></td>
                                            <td><?php echo $row->ann_description;?></td>
                                            <td> <?php echo date('M. d, Y',strtotime($row->ann_date));?></td>
                                            <td><a href="#updateAnnouncement" data-toggle="modal" data-id="<?php echo $row->ann_id;?>" class="updateAnnouncement" style="color:green"><i class="fa fa-edit"></i> Edit </a><span style="padding-left:3px;"><a href="#" onclick="deleteAnnouncement(<?php echo $row->ann_id;?>)" style="color:red"><i class="fa fa-edit"></i> Delete</a></span></td>
                                          </tr>
                                        <?php endforeach; }?>

                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->


          <!-- Modal -->
          <div class="modal fade" id="addAnnouncement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Salon Announcements</h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Announcement_management_salon/addAnnouncement" method="post">

                    <div class="col-md-12">

                        <div class="form-group">
                          <label for="ann_title">Announcement Title:</label>
                          <input type="text" class="form-control" name="ann_title" value="" required>
                        </div>

                         <div class="form-group">
                          <label for="ann_desc">Description:</label>
                          <textarea name="ann_desc" rows="8" cols="40" class="form-control" required></textarea>
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
          <div class="modal fade" id="updateAnnouncement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><span id="updateLabel"></span></h4>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <form action="<?php echo base_url();?>Functions/Announcement_management_salon/updateAnnouncement" method="post" enctype="multipart/form-data">

                      <div class="col-md-12">
                          <input type="hidden" name="ann_id" value="" id="ann_id">
                          <div class="form-group">
                            <label for="ann_title">Announcement Title:</label>
                            <input type="text" class="form-control" name="ann_title" value="" id="ann_title" required>
                          </div>

                           <div class="form-group">
                            <label for="ann_desc">Product Brand:</label>
                            <textarea name="ann_desc" rows="6" cols="30" id="ann_desc" class="form-control"></textarea>
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
