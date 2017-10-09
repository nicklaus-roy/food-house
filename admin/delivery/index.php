<?php
    include('../layouts/master.php');

    $raw_materials = $conn->query("SELECT * FROM raw_materials ORDER BY name");
    $cur_date = date("Y-m-d");
    $deliveries = $conn->query("SELECT d.*, r.name material_name, s.name supplier_name FROM deliveries d 
        INNER JOIN raw_materials r ON d.raw_material_id = r.id INNER JOIN suppliers s ON s.id = r.supplier_id
        WHERE d.date_received = '$cur_date'");
    $user = $_SESSION['auth_user'];

?>
<style>
  .critical-level{
    background-color: rgba(255,0,0,0.3)!important;
  }
</style>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">
    <section class="content-header">
        <h1>
        Deliveries
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Deliveries</a></li>
            <li class="active">View Deliveries</li>
        </ol>
    </section>

    <section class="content container-fluid" id = "app-orders">
       <div class="row">
           <div class="col-sm-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Delivery</h3>
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
                                <button class="btn btn-primary" id = "custom-alert">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Delivered Materials for Today</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered" id="deliveries-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Raw Material</th>
                                    <th>Quantity</th>
                                    <th>Supplier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($delivery = $deliveries->fetch_assoc()){?>
                                <tr>
                                    <td><?=date_format(date_create($delivery['date_received']), "M d, Y")?></td>
                                    <td><?=$delivery['material_name']?></td>
                                    <td><?=$delivery['quantity']?></td>
                                    <td><?=$delivery['supplier_name']?></td>
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
            if(!confirm("Are you sure you want to add "+$('#quantity').val()+" delivery on "+$("option[value="+raw_material_id+"]").text())){
                event.preventDefault();
            }
        });
    });
</script>

</body>
</html>
