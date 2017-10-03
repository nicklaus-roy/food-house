<?php
    include ('../layouts/master.php');

?>

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

    <section class="content container-fluid" id = "app-sales">
        <div class="row">
            <div class="col-sm-11">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="">Date from: </label>
                                <input type="date" id = "date-from" class="form-control" value = "<?=date('Y-m-d')?>" v-model = "date_from" 
                                @change = "date_to=date_from">
                            </div>
                            <div class="col-sm-5">
                                <label for="">Date to: </label>
                                <input type="date" id = "date-to" class="form-control" value = "<?=date('Y-m-d')?>" v-model = "date_to" :min = "date_from">
                            </div>
                            <div class="col-sm-2" style="padding-top: 6px">
                                <br>    
                                <button class="btn btn-primary" @click = "getSales()">Go</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>Receipt Number</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for = "sale in sales">
                                            <td>{{ sale.or_number }}</td>
                                            <td>{{ sale.product_name }}</td>
                                            <td>{{ sale.qty }}</td>
                                            <td>{{ sale.amount }}</td>
                                        </tr>
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

<script src = "sales.js"></script>