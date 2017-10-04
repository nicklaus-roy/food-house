  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Quick Links</li>
        <!-- Optionally, you can add icons to the links -->
        <?php if($_SESSION['auth_user']['role'] == 'staff'):?>
        <li>
          <a href="/admin/orders/index.php"><i class="fa fa-dashboard "></i> <span>Place Order</span></a>
        </li>
        <?php elseif ($_SESSION['auth_user']['role'] == 'admin'): ?>
        <li>
          <a href="/admin/home.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>
        <li>
          <a href="/admin/orders/index.php"><i class="fa fa-dashboard "></i> <span>Place Order</span></a>
        </li>
        <li>
          <a href="/admin/reports/sales-report.php"><i class="fa fa-line-chart"></i> <span>Sales Report</span></a>
        </li>
        <li>
          <a href="/admin/reports/best-selling-products-report.php"><i class="fa fa-bar-chart"></i> <span>Best Sellers Report</span></a>
        </li>
        <li>
          <a href="/admin/products/create.php"><i class="fa fa-tag"></i> <span>Add Product</span></a>
        </li>
        <li>
          <a href="/admin/inventory/create.php"><i class="fa fa-cube"></i> <span>Add Inventory</span></a>
        </li>
        <?php endif;?>

        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>