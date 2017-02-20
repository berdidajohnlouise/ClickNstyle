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
                                    <h3 class="box-title">Registered Users Accounts</h3>

                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>User image</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>User type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(!empty($useraccounts)){?>
                                          <?php foreach($useraccounts as $row):?>
                                            <tr>
                                                <td><?php echo $row->userid?></td>
                                                <td><img src="<?php echo base_url();?>assets/usersimage/<?php echo $row->user_image;?>" width="50" height="50"/></td>
                                                <td><?php echo ucfirst($row->username);?></td>
                                                <td><?php echo $row->email;?></td>
                                                <td><?php if($row->usertype==1){echo 'Salon Customer'; }else if($row->usertype==2){echo 'Salon Admin';}?></td>
                                            </tr>
                                          <?php endforeach;}?>
                                        </tbody>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

              </section><!-- /.content -->
          </aside><!-- /.right-side -->
