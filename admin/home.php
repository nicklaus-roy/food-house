<?php
  include('./layouts/master.php');
  $cur_date = date('Y-m-d');
  $total_sales = "0.00";
  $total_sales_query = $conn->query("SELECT sum(amount) as total_sales FROM sales WHERE date(date_time) = '$cur_date'");
  
  if($total_sales_query){
    $total_sales = $total_sales_query->fetch_assoc()['total_sales'];
  }

  $products_sold = "0";
  $products_sold_query = $conn->query("SELECT sum(qty) as products_sold FROM sales WHERE date(date_time) = '$cur_date'");
  
  if($products_sold_query){
    $products_sold = $products_sold_query->fetch_assoc()['products_sold'];
  }

  $critical_level = "0";
  $critical_level_query = $conn->query("SELECT COUNT(*) as num_critical FROM raw_materials WHERE status <> 'OK'");
  
  if($critical_level_query){
    $critical_level = $critical_level_query->fetch_assoc()['num_critical'];
  }

  $best_seller = "None";
  $best_seller_query = $conn->query("SELECT p.name as best_seller FROM sales s INNER JOIN products p ON s.product_id = p.id 
    ORDER BY s.amount DESC LIMIT 1");
  if($best_seller_query){
    $best_seller = $best_seller_query->fetch_assoc()['best_seller'];
  }



?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Admin Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-11">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="info-box">
                          <!-- Apply any bg-* class to to the icon to color it -->
                          <span class="info-box-icon bg-blue"><i class="fa fa-money"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Total Sales for today</span>
                            <span class="info-box-number">₱ <?=$total_sales?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-box">
                          <!-- Apply any bg-* class to to the icon to color it -->
                          <span class="info-box-icon bg-green"><i class="fa fa-cubes"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Critical Inventory</span>
                            <span class="info-box-number"><?=$critical_level?> items</span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="info-box">
                          <span class="info-box-icon bg-red"><i class="fa fa-cutlery"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Products Sold for today</span>
                            <span class="info-box-number"><?=$products_sold?></span>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="info-box">
                          <span class="info-box-icon bg-orange"><i class="fa fa-bar-chart"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Best Seller</span>
                            <span class="info-box-number"><?=$best_seller?></span>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
               
    </section>

</div>


<?php
    include('./layouts/footer.php');
?>
</div>

<?php
    include('./layouts/scripts.php');
?>
