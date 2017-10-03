<?php
    include('../layouts/master.php');

    $products = $conn->query("SELECT * FROM products ORDER BY name");

?>
<style>
    .order-list-input {
        border: 0;
    }
    .order-list-input.qty{
        width:50px;
    }

</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Customer Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Orders</a></li>
            <li class="active">Place Orders</li>
        </ol>
    </section>

    <section class="content container-fluid" id = "app-orders">
        <form action="./store.php" method = "POST">
            <div class="row">
                <div class="col-lg-7">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Place Order</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group"> 
                                        <label for="products-list">Products: </label>
                                        <select name="products-list" id = "products-list" v-model = "products_list" class="form-control selectpicker" data-live-search="true">
                                            <option value="#" disabled selected>Choose a product. </option>
                                            <?php
                                                while($product = $products->fetch_assoc()){
                                                    echo "<option value = '".$product['id']."' data-price = '".$product['price'].
                                                    "' data-unit = '".$product['unit']."'>".$product['name']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"> 
                                        <label for="products-qty">Qty: </label>
                                        <input id = "products-qty" type="number" class="form-control" v-model = 'products_qty'>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <br>
                                    <button v-if = "allowAddOrder" class="btn btn-success" id = "add-product" @click.prevent = "addOrder">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>                                    
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Order List</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered" id = "order-list">
                                <thead>
                                    <tr>
                                        <th style="width:50px">Qty</th>
                                        <th >Unit Price (₱)</th>
                                        <th>Product</th>
                                        <th>Amount (₱)</th>
                                        <th style="width:10px">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for = "order in orders">
                                        <td>
                                            <input type="text" class = 'order-list-input qty' name = "order_qty[]" readonly :value = "order.qty">
                                             <input type="hidden" name = "order_id[]" :value = "order.id">
                                        </td>
                                        <td>
                                            <input type="text" class = 'order-list-input' name = "order_price[]" readonly style="width: 50px" 
                                            :value = "formatCurrency(order.price)" step="0.50">
                                        </td>
                                        <td>
                                            <input type="text" class = 'order-list-input' name = "order_name[]" readonly :value = "order.name">
                                             <input type="hidden" name = "order_unit[]" :value = "order.unit">
                                        </td>
                                        <td>
                                            <input type="text" class = 'order-list-input' name = "order_amount[]" readonly 
                                            :value = "formatCurrency(order.amount)" step="0.50">
                                        </td>
                                        <td>
                                            <a href="#" style="color:red" @click = "removeOrder(order)">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Payment Details</h3>                            
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Total Sales (₱): </label>
                                <input type="number" class="form-control" name = "total_sales" id = "total_sales" readonly 
                                :value = "formatCurrency(totalSales)">
                            </div>
                            <div class="form-group">
                               <label for="discount">Discount(%):</label>
                               <input type="number" class="form-control" name = "discount" id = "discount" 
                               v-model = "discount">
                           </div>          
                           <div class="form-group">
                                <label for="discount_amount">Less Discount(₱):</label>
                                <input type="number" class="form-control" name = "discount_amount" id = "discount_amount" 
                                readonly v-model = "formatCurrency(discountAmount)">
                            </div>     
                            <div class="form-group">
                                <label for="amount_due">Total Amount Due (₱):</label>
                                <input type="number" class="form-control" name = "amount_due" id = "amount_due" 
                                :value  = "formatCurrency(amountDue)" readonly>
                            </div>  
                           <div class="form-group">
                               <label for="amount_given">Amount Given (₱):</label>
                               <input type="number" class="form-control" name = "amount_given" id = "amount_given" 
                               v-model = "amount_given">
                           </div>
                           
                           <div class="form-group">
                               <label for="change">Change (₱):</label>
                               <input type="number" class="form-control" name = "change" id = "change" readonly 
                               :value = "formatCurrency(change)">
                           </div>
                           <div class="form-group" style="text-align: right" v-show = "allowPrintReceipt">
                               <button class="btn btn-danger" id = "print-receipt" name = "print-receipt">
                                    <span class="glyphicon glyphicon-print"></span>  Receipt
                                </button>
                           </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        
    </section>

</div>


<?php
    include('../layouts/footer.php');
?>
</div>

<?php
    include('../layouts/scripts.php');
?>

<script src="./orders.js"></script>
</body>
</html>
