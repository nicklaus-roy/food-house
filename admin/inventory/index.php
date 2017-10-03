<?php
    include('../layouts/master.php');

    $raw_materials = $conn->query("SELECT * FROM raw_materials");

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
                <a href="/admin/inventory/create.php" class="btn btn-success">
                    <i class="fa fa-plus fa-lg"></i>  Add Inventory
                </a>
                <br>
                <br>
               <table class="table table-bordered" id = "raw-material-table">
                   <thead>
                       <tr>
                           <th>Inventory</th>
                           <th>Quantity</th>
                           <th>Unit</th>
                           <th>Status</th>
                           <th>Edit</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php while($raw_material = $raw_materials->fetch_assoc()){ ?>
                        <tr>
                            <td><?=$raw_material['name']?></td>
                            <td><?=$raw_material['qty']?></td>
                            <td><?=$raw_material['unit']?></td>
                            <td><?=$raw_material['status']?></td>
                            <td><a href="/admin/inventory/edit.php?id=<?=$raw_material['id']?>"><i class="fa fa-edit"></i></a></td>
                        </tr>
                       <?php } ?>
                   </tbody>
               </table>
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
