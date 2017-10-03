<?php
include('../layouts/master.php');

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
          Add Inventory
        </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inventory</a></li>
            <li class="active">Add Inventory</li>
        </ol>
    </section>

    <section class="content container-fluid" id = "app-orders">
        <div class="row">
            <div class="col-sm-11">
                <form action="/admin/inventory/store.php" method = "POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name = "name" id = "name">
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity:</label>
                        <input type="number" class="form-control" name = "qty" id = "qty">
                    </div> 
                    <div class="form-group">
                       <label for="unit">Unit:</label>
                       <input type="text" class="form-control" name = "unit" id = "unit">
                   </div>  
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" name = "status" id = "status">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name = "save_changes">Save Changes</button>
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

</body>
</html>
