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
                                    <h3 class="box-title">View Staff From Salons</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Salon Name</th>
                                                <th>User image</th>
                                                <th>Nickname</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Job Description</th>
                                                <th>Birthdate</th>
                                                <th>Contact number</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(!empty($staffs)){?>
                                          <?php foreach($staffs as $row):?>
                                          <tr>
                                            <td><?php echo $row->staffID;?></td>
                                            <td><?php echo $row->SalonName;?></td>
                                            <td><img src="<?php echo base_url();?>assets/staffsimage/<?php echo $row->photo;?>" width="50" height="50"/></td>
                                            <td><?php echo ucfirst($row->nickName);?></td>
                                            <td><?php echo ucfirst($row->firstName);?></td>
                                            <td><?php echo ucfirst($row->lastName);?></td>
                                            <td><?php echo ucfirst($row->jobdescription);?></td>
                                            <td><?php echo date('M. d, Y',strtotime($row->dob));?></td>
                                            <td><?php echo $row->contactNo;?></td>
                                            <td><?php if($row->status==0){echo 'Inactive';}else{echo 'Active';}?></td>

                                          </tr>
                                        <?php endforeach;}?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


              </section><!-- /.content -->
          </aside><!-- /.right-side -->
