<?php
    include('../layouts/master.php');

    $raw_materials = $conn->query("SELECT * FROM raw_materials ORDER BY name");
    $stock_issuances = $conn->query("SELECT si.id, si.date_issued, sum(si.quantity) as quantity, r.name material_name FROM stock_issuances si 
        INNER JOIN raw_materials r ON si.raw_material_id = r.id 
        GROUP BY r.id, si.date_issued
        ORDER BY si.id DESC");
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
            <div class="col-sm-11">
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
                    title: 'Stock Issuance Report'
                }
            ]
        });
    });
</script>
</body>
</html>
