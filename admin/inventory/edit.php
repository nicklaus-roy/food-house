<?php
include('../layouts/master.php');

$id = $_GET['id'];
$raw_material = $conn->query("SELECT * FROM raw_materials WHERE id = '$id'")->fetch_assoc();

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

  	<section class="content-header">
		<h1>
		  Edit Inventory (<?=$raw_material['name']?>)
	  	</h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inventory</a></li>
			<li class="active">Edit Inventory</li>
		</ol>
	</section>

	<section class="content container-fluid" id = "app-orders">
	   	<div class="row">
			<div class="col-sm-4">
			  	<form action="/admin/inventory/update.php" method = "POST">
			  		<input type="hidden" name = "id" value = "<?=$raw_material['id']?>">
					<div class="form-group">
						<label for="qty">Beginning Quantity:</label>
						<input type="number" class="form-control" name = "qty" id = "qty" value="<?=$raw_material['qty']?>">
					</div> 
					<div class="form-group">
					   <label for="unit">Qty on hand:</label>
					   <input type="text" class="form-control" name = "qty_on_hand" id = "qty_on_hand" value="<?=$raw_material['qty_on_hand']?>">
				   </div>  
		 			<div class="form-group">
		 				<button class="btn btn-success" name = "save_changes" id = "custom-alert">Save Changes</button>
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
<script type="text/javascript">
	$(function(){
		$('#custom-alert').click(function(event){
			if(!confirm("Are you sure you want to update this product?")){
				event.preventDefault();
			}
		});
	});
</script>
</body>
</html>
