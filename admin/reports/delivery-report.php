<?php
    include('../layouts/master.php');

    $raw_materials = $conn->query("SELECT * FROM raw_materials ORDER BY name");
    $deliveries = $conn->query("SELECT d.id , d.date_received, sum(d.quantity) as quantity, r.name material_name, s.name supplier_name FROM deliveries d 
        INNER JOIN raw_materials r ON d.raw_material_id = r.id INNER JOIN suppliers s ON s.id = r.supplier_id
        GROUP BY r.id, d.date_received
        ORDER BY d.id DESC");
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

    <section class="content container-fluid">
       <div class="row">
            <div class="col-sm-11">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Delivery History</h3>
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
        $('#deliveries-table').DataTable({
            "ordering": false,
            dom: 'Blfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: 'Print Report',
                    title: 'Delivery Report'
                }
            ]
        });
    });
</script>
</body>
</html>
