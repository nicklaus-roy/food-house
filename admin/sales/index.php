<?php
    include ('../layouts/master.php');

    if(isset($_GET['date_from'])){
        $date_from = $_GET['date_from'];
        $date_to = $_GET['date_to'];

        $sales_query = $conn->query("SELECT r.or_number, s.date_time, s.amount, s.qty, p.name as product_name
            FROM official_receipts r INNER JOIN sales s ON r.or_number = s.or_number 
            INNER JOIN products p ON s.product_id = p.id WHERE 
            date(s.date_time) >= '$date_from' AND date(s.date_time) <= '$date_to'");

    }

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">

<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Sales
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Sales</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-11">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row">
                            <form action="./index.php" method="GET">
                                <div class="col-sm-5">
                                    <label for="">Date from: </label>
                                    <input type="date" name = "date_from" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                    <label for="">Date to: </label>
                                    <input type="date" name = "date_to" class="form-control">
                                </div>
                                <div class="col-sm-2" style="padding-top: 6px">
                                    <br>    
                                    <button class="btn btn-primary" >Go</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered" id = "sales-table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Total Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(isset($sales_query)){
                                            while($sale = $sales_query->fetch_assoc()){?>
                                            <tr>
                                                <td><?=date_format(date_create($sale['date_time']), 'M d, Y')?></td>
                                                <td><?=$sale['product_name']?></td>
                                                <td><?=$sale['qty']?></td>
                                                <td><?=$sale['amount']?></td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
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
<script src = "/dist/buttons/js/buttons.print.min.js"></script>
<script>
    $(function(){
        $('#sales-table').DataTable({
            "ordering": false,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: 'Print Report',
                    title: 'Sales Report'
                }
            ]
        });
    });
</script>

