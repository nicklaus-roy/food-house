<?php
  $user = $_SESSION['auth_user'];
?>
<header class="main-header">
    <!-- Logo -->

    <a href="/admin/home.php" class="logo" style="padding-left: 0px">
      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>F</b>DJ</span>
      <!-- logo for regular state and mobile devices -->
      <img src="/images/foodject.png" alt="" width="50px" height="45px">
      <span class="logo-lg" style="display: inline"><b>Food</b>Jectives</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <?php if($_SESSION['auth_user']['role'] == 'admin'):?>
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="/admin/sales/index.php">
              <i class="fa fa-money fa-lg"></i>
            </a>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="/admin/inventory/index.php">
              <i class="fa fa-cubes fa-lg"></i>
              <!-- <span class="label label-warning">10</span> -->
            </a>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="/admin/products/index.php">
              <i class="fa fa-tags fa-lg"></i>
              <!-- <span class="label label-warning">10</span> -->
            </a>
          </li>
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bar-chart"></i>
              <!-- <span class="label label-warning">10</span> -->
            </a>
            <ul class="dropdown-menu">
              <li>
                <ul class="menu">
                  <li>
                    <a href="/admin/reports/sales-report.php">
                      <i class="fa fa-line-chart fa-lg"></i>  Sales Report
                    </a>
                  </li>
                  <li>
                    <a href="/admin/reports/best-selling-products-report.php">
                      <i class="fa fa-bar-chart-o fa-lg"></i>  Best Selling Products
                    </a>
                  </li>

                </ul>
              </li>
            </ul>
          </li>
                <?php endif;?>

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?=$user['image_url']?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?=$user['first_name']." ".$user['last_name']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?=$user['image_url']?>" class="img-circle" alt="User Image" 
                style = "width:125px;height:125px">

                <p>
                  <?=$user['first_name']." ".$user['last_name']?> - <?=$user['role']?>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/admin/users/index.php" class="btn btn-default btn-flat">View Users</a>
                </div>
                <div class="pull-right">
                  <a href="/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>