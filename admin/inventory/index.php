<?php
    include('../layouts/master.php');

    $raw_materials = $conn->query("SELECT * FROM raw_materials");
    $user = $_SESSION['auth_user'];

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Inventory
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
                               <th>Ideal Quantity</th>
                               <th>Beg Quantity</th>
                               <th>End Quantity</th>
                               <th>Status</th>
                               <?php if($user['role'] == 'admin'):?>
                                <th>Edit Details</th>
                                <?php endif?>
                           </tr>
                       </thead>
                       <tbody>
                           <?php while($raw_material = $raw_materials->fetch_assoc()){ ?>
                            <tr>
                                <td><?=$raw_material['name']?></td>
                                <td><?=$raw_material['unit']?></td>
                                <td><?=$raw_material['reorder_level']?></td>
                                <td><?=$raw_material['qty']?></td>
                                <td>
                                    <input type="hidden" name = "raw_material_id[]" value = "<?=$raw_material['id']?>">
                                    <input type="number" name = "qty_end[]" value = "<?=$raw_material['qty_end']?>">
                                </td>
                                <td><?=$raw_material['status']?></td>
                                <?php if($user['role'] == 'admin'): ?>
                                  <td><a href="/admin/inventory/edit.php?id=<?=$raw_material['id']?>"><i class="fa fa-edit"></i></a></td>
                                <?php endif; ?>
                            </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                   <br>
                   <div style="text-align: right">
                    <?php if($user['role'] == 'admin'):?>
                      <input type="hidden" name = "approve-changes" value = "approved">
                      <button class="btn btn-primary" type = "submit">Commit Changes</button>
                    <?php else:?>
                      <button class="btn btn-primary" type = "submit">Save Changes</button>  
                    <?php endif;?>
                                        
                   </div>
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
        $('#raw-material-table').DataTable();
    });
</script>
</body>
</html>
