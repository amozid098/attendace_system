<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="images/user.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php if (!empty($_SESSION)) {
    if (!empty($_SESSION['name'])) {
        echo $_SESSION['name'];
    }
} ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Employees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="emp_add_employee.php"><i class="fa fa-circle-o"></i>Add Employees</a></li>
                    <li><a href="emp_view_employee.php"><i class="fa fa-circle-o"></i> View Employees</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Attendance</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="atnd_add_attendance.php"><i class="fa fa-circle-o"></i>Add Attendance</a></li>
                    <li><a href="atnd_view_attendance_group_wise.php"><i class="fa fa-circle-o"></i>View Attendance</a></li>
                    <li><a href="atnd_view_attendance_day_wise_attendance.php"><i class="fa fa-circle-o"></i> Day Wise Attendance Status </a></li>
                    <li><a href="atnd_view_attendance_employee_wise.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-circle-o"></i> Employee Wise Attendance</a></li>
                </ul>
            </li>  
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="emp_edit_employee.php?id=<?php echo $_SESSION['id']*359537; ?>"><i class="fa fa-circle-o"></i> Update Profile</a></li>
                    <li><a href="emp_edit_password.php?id=<?php echo $_SESSION['id']*359537;?>"><i class="fa fa-circle-o"></i> Update Password</a></li>
                </ul>
            </li>      
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>