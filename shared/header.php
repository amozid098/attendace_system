<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">AUST</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Ahsanullah</b>University</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu pull-right">
        <ul class="nav navbar-nav">         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php if(!empty($_SESSION)){if(!empty($_SESSION['name'])){echo $_SESSION['name'];}}?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user.png" class="img-circle" alt="User Image">

                <p>
                  <?php if(!empty($_SESSION)){if(!empty($_SESSION['name'])){echo $_SESSION['name'];}}?> - <?php if(!empty($_SESSION)){if(!empty($_SESSION['designation'])){echo $_SESSION['designation'];}}?>
                  <small>Member since <?php if(!empty($_SESSION)){if(!empty($_SESSION['joining_date'])){echo $_SESSION['joining_date'];}}?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="emp_view_employee_details.php?id=<?php echo $_SESSION['id']*359537;?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>