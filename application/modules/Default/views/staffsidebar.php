<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url();?>assets/staffsimage/<?php echo $userdetails->photo;?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, <?php echo $userdetails->userName;?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>


            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

           
                            <li>
                    <a href="http://localhost/clicknstyle/Functions/staff_user">
                        <i class="fa fa-cogs"></i> <span>Account</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Staff_management_user_salon">
                        <i class="fa fa-users"></i> <span>Staff User Account</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Staff_management_salon">
                        <i class="fa fa-users"></i> <span>Staffs</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Promos_management_salon">
                        <i class="fa fa-volume-down"></i> <span>Promos</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Products_management_salon">
                        <i class="fa fa-tags"></i> <span>Products</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Services_management_salon">
                        <i class="fa fa-wrench"></i> <span>Services</span>
                    </a>
                </li>
                            <li>                    
                    <a href="http://localhost/clicknstyle/StaffUser/Announcement_management_salon">
                        <i class="fa fa-comments"></i> <span>Announcements</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Reservation_management_salon">
                        <i class="fa fa-tasks"></i> <span>Reservations</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Reservation_monitoring_salon">
                        <i class="fa fa-flag-checkered"></i> <span>Reservation Monitoring</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Subscription_management_salon">
                        <i class="fa fa-credit-card"></i> <span>Subscription</span>
                    </a>
                </li>
                            <li>
                    <a href="http://localhost/clicknstyle/StaffUser/Calendar_management_salon">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                    </a>
                </li>
            


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
