<?php
include('../layouts/master.php');

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id = '$id'")->fetch_assoc();

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
          Edit Product
        </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
            <li class="active">Edit Product</li>
        </ol>
    </section>

    <section class="content container-fluid" id = "app-orders">
        <div class="row">
            <div class="col-sm-11">
                <form action="/admin/products/update.php" method = "POST">
                    <input type="hidden" name = "id" value = "<?=$product['id']?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name = "name" id = "name" value="<?=$product['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" name = "price" id = "price" value="<?=$product['price']?>" step = "0.5">
                    </div> 
                    <div class="form-group">
                       <label for="unit">Unit:</label>
                       <input type="text" class="form-control" name = "unit" id = "unit" value="<?=$product['unit']?>">
                   </div>  
                    <div class="form-group">
                        <label for="available">Available:</label>
                        <select  class="form-control" name = "available" id = "available">
                            <?php if($product['available'] == '1'): ?>
                                <option value="1" selected="">Available</option>
                                <option value="0">Not Available</option>
                            <?php else: ?>
                                <option value="1">Available</option>
                                <option value="0" selected=""> Not Available</option>
                            <?php endif;?>
                        </select>
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
