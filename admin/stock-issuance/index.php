<?php
    include('../layouts/master.php');

    $raw_materials = $conn->query("SELECT * FROM raw_materials ORDER BY name");
    $cur_date = date("Y-m-d");
    $stock_issuances = $conn->query("SELECT si.*, r.name material_name FROM stock_issuances si 
        INNER JOIN raw_materials r ON si.raw_material_id = r.id WHERE si.date_issued = '$cur_date'");
    $user = $_SESSION['auth_user'];

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Stock Issuances
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Stock Issuances</a></li>
            <li class="active">View Stock Issuance</li>
        </ol>
    </section>

    <section class="content container-fluid" id = "app-orders">
       <div class="row">
           <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Issue Stock</h3>
                    </div>
                    <div class="box-body">
                        <form action="./store.php" method = "POST">
                            <div class="form-group">
                                <label for="raw_material_id">Raw Material: </label>
                                <br>
                                <select class="selectpicker" name = "raw_material_id" id = "raw_material_id" 
                                    data-live-search = "true">
                                <?php while($raw_material = $raw_materials->fetch_assoc()){?>
                                    <option value="<?=$raw_material['id']?>"><?=$raw_material['name']?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" min = "1" class="form-control" name = "quantity" id = "quantity" value = "1">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" id = "custom-alert">Issue Stock</button>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
            <!-- <div class="col-sm-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Stock Issuance History</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered" id="deliveries-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Raw Material</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($stock_issue = $stock_issuances->fetch_assoc()){?>
                                <tr>
                                    <td><?=date_format(date_create($stock_issue['date_issued']), "M d, Y")?></td>
                                    <td><?=$stock_issue['material_name']?></td>
                                    <td><?=$stock_issue['quantity']?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
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
        $('#deliveries-table').DataTable();
        $('.selectpicker').selectpicker();
    });
</script>
<script type="text/javascript">
    $(function(){
        $('#custom-alert').click(function(event){
            var raw_material_id = $('#raw_material_id ').val();
            if(!confirm("Are you sure you want to issue "+$('#quantity').val()+" "+$("option[value="+raw_material_id+"]").text())){
                event.preventDefault();
            }
        });
    });
</script>

</body>
</html>
