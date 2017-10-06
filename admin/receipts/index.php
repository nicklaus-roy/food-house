<?php
    include('../layouts/master.php');

    $receipts = $conn->query("SELECT * FROM official_receipts ORDER BY or_number DESC");
    $user = $_SESSION['auth_user'];

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
        Receipts
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Receipts</a></li>
            <li class="active">View Receipts</li>
        </ol>
    </section>

    <section class="content container-fluid" id = "app-orders">
       <div class="row">
           <div class="col-sm-11">
               <table class="table table-bordered" id = "receipts-table">
                   <thead>
                       <tr>
                           <th>OR Num</th>
                           <th>Amount Given</th>
                           <th>Discount Amount</th>
                           <th>Customer Change</th>
                           <th>Total Sales</th>
                           <th>Customer</th>
                           <th></th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php while($receipt = $receipts->fetch_assoc()){ ?>
                        <tr class = "<?php echo $receipt['status'] == 'OK' ? '':'critical-level'?>">
                            <td><?=$receipt['or_number']?></td>
                            <td><?=$receipt['amount_given']?></td>
                            <td><?=$receipt['discount_amount']?></td>
                            <td><?=$receipt['customer_change']?></td>
                            <td><?=$receipt['total_sales']?></td>
                            <td><?=$receipt['customer']?></td>
                            <?php if($user['role'] == 'admin'): ?>
                              <td><i style = "cursor: pointer;" class="fa fa-remove remove-receipt" data-number = "<?=$receipt['or_number']?>"></i></td>
                            <?php endif; ?>
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
        $('#receipts-table').DataTable();
        $('table').on('click', 'i.remove-receipt', function(event){
        	console.log("yes");
        	if(confirm("Are you sure?")){
        		var or_number = $(this).attr('data-number');
        		window.location.replace("/admin/receipts/delete.php?or_number="+or_number+"");
        	}
        	else{
        		console.log("No");
        	}
        });
    });
</script>
</body>
</html>
