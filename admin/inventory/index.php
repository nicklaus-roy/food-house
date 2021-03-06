<?php
    include('../layouts/master.php');

    $cur_date = date("Y-m-d");
    $raw_materials = $conn->query("SELECT * FROM raw_materials");
    $user = $_SESSION['auth_user'];
?>

<style>
  .critical-level{
    background-color: rgba(255,0,0,0.3)!important;
  }
</style>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Inventory (<?=date('M d, Y')?>)
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inventory</a></li>
            <li class="active">View Inventory</li>
        </ol>
    </section>

    <section class="content container-fluid" id = "app-orders">
       <div class="row">
           <div class="col-sm-11">
                <?php if($user['role'] == 'admin'): ?>
                <a href="/admin/inventory/create.php" class="btn btn-success">
                    <i class="fa fa-plus fa-lg"></i>  Add Inventory
                </a>
              <?php endif;?>
                <br>
                <br>
                <form action="/admin/inventory/update-raw-materials.php" method="POST">
                   <table class="table table-bordered" id = "raw-material-table">
                       <thead>
                           <tr>
                               <th>Inventory</th>
                               <th>Unit</th>
                               <th>Reorder Quantity</th>
                               <th>Reorder Point</th>
                               <th>Beg Quantity</th>
                               <th>Quantity on Hand</th>
                               <th>Status</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php while($raw_material = $raw_materials->fetch_assoc()){ ?>
                            <tr class = "<?php echo $raw_material['status'] == 'OK' ? '':'critical-level'?>">
                                <td><?=$raw_material['name']?></td>
                                <td><?=$raw_material['unit']?></td>
                                <td><?=$raw_material['reorder_qty']?></td>
                                <td><?=$raw_material['reorder_point']?></td>
                                <td><?=$raw_material['qty']?></td>
                                <td>
                                    <input type="hidden" name = "raw_material_id[]" value = "<?=$raw_material['id']?>">
                                    <input type="hidden" name = "qty_on_hand[]" 
                                      value = "<?=$raw_material['qty_on_hand']?>">
                                    <?=$raw_material['qty_on_hand']?>
                                </td>
                                <td><?=$raw_material['status']?></td>
                                <td><a href="./edit.php?id=<?=$raw_material['id']?>">Update</a></td>
                            </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                   <br>
               </form>
           </div>
       </div>
        
    </section>

</div>


<?php
    include('../layouts/footer.php');
?>
</div>

<?php
    include('../layouts/scripts.php');
?>

<script src = "/plugins/datatables/datatables.min.js"></script>
<script>
    $(function(){
        $('#raw-material-table').DataTable({
        });
    });
</script>
</body>
</html>
