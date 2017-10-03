<?php
    include('../layouts/master.php');

    $products = $conn->query("SELECT * FROM products");
?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Products
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Products</a></li>
            <li class="active">View Products</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
         <div class="col-sm-11">
            <a href="/admin/products/create.php" class="btn btn-success">
                <i class="fa fa-plus fa-lg"></i>  Add Product
            </a>
            <br>
            <br>
            <table class="table table-bordered" id = "products-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <!-- <th>Category</th> -->
                        <th>Price</th>
                        <th>Available</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                 <?php while($product = $products->fetch_assoc()){ ?>
                 <tr>
                    <td><?=$product['id']?></td>
                    <td><?=$product['name']?></td>
                    <!-- <td><?=$product['category']?></td> -->
                    <td><?=$product['price']?></td>
                    <td>
                        <?php if($product['available'] == 1):?>
                            <i class="fa fa-check fa-lg" style="color:green"></i>
                        <?php else:?>
                            <i class="fa fa-remove fa-lg" style="color:red"></i>
                        <?php endif;?>
                    </td>
                    <td><a href="/admin/products/edit.php?id=<?=$product['id']?>"><i class="fa fa-edit"></i></a></td>
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
        $('#products-table').DataTable();
    });
</script>
</body>
</html>
