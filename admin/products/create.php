<?php
include('../layouts/master.php');
?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
          Add Product
        </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
            <li class="active">Add Product</li>
        </ol>
    </section>

    <section class="content container-fluid" >
        <div class="row">
            <div class="col-sm-11">
                <form action="/admin/products/store.php" method = "POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name = "name" id = "name" >
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" name = "price" id = "price"  step = "0.5">
                    </div> 
                    <div class="form-group">
                       <label for="unit">Unit:</label>
                       <input type="text" class="form-control" name = "unit" id = "unit">
                   </div>  
                    <div class="form-group">
                        <label for="available">Available:</label>
                        <select  class="form-control" name = "available" id = "available">
                                <option value="1" selected="">Available</option>
                                <option value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name = "save_changes">Add</button>
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
