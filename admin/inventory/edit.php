<?php
include('../layouts/master.php');

$id = $_GET['id'];
$raw_material = $conn->query("SELECT * FROM raw_materials WHERE id = '$id'")->fetch_assoc();

?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

  	<section class="content-header">
		<h1>
		  Edit Inventory
	  	</h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inventory</a></li>
			<li class="active">Edit Inventory</li>
		</ol>
	</section>

	<section class="content container-fluid" id = "app-orders">
	   	<div class="row">
			<div class="col-sm-11">
			  	<form action="/admin/inventory/update.php" method = "POST">
			  		<input type="hidden" name = "id" value = "<?=$raw_material['id']?>">
					<div class="form-group">
					  	<label for="name">Name:</label>
					  	<input type="text" class="form-control" name = "name" id = "name" value="<?=$raw_material['name']?>">
				  	</div>
					<div class="form-group">
						<label for="qty">Quantity:</label>
						<input type="number" class="form-control" name = "qty" id = "qty" value="<?=$raw_material['qty']?>">
					</div> 
					<div class="form-group">
					   <label for="unit">Unit:</label>
					   <input type="text" class="form-control" name = "unit" id = "unit" value="<?=$raw_material['unit']?>">
				   </div>  
		   			<div class="form-group">
				 		<label for="status">Status:</label>
				 		<input type="text" class="form-control" name = "status" id = "status" value="<?=$raw_material['status']?>">
		 			</div>
		 			<div class="form-group">
		 				<button class="btn btn-success" name = "save_changes">Save Changes</button>
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

</body>
</html>
