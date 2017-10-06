	<?php
	    include('../layouts/master.php');

	    $users = $conn->query("SELECT * FROM users");
	    $user = $_SESSION['auth_user'];

	?>
	<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
	<div class="content-wrapper">
	    <section class="content-header">
	        <h1>
	        Users
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
	            <li class="active">View Users</li>
	        </ol>
	    </section>

	    <section class="content container-fluid" id = "app-orders">
	       <div class="row">
	           <div class="col-sm-11">
	                <a href="/admin/users/create.php" class="btn btn-success">
	                    <i class="fa fa-plus fa-lg"></i>  Add User
	                </a>
	                <br>
	                <br>
                   <table class="table table-bordered" id = "users-table">
                       <thead>
                           <tr>
                               <th>Last Name</th>
                               <th>First Name</th>
                               <th>Middle Name</th>
                               <th>Role</th>
                               <th>Edit</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php while($user = $users->fetch_assoc()){ ?>
                            <tr>
                                <td><?=$user['last_name']?></td>
                                <td><?=$user['first_name']?></td>
                                <td><?=$user['middle_name']?></td>
                                <td><?=$user['role']?></td>
                                <td><a href="/admin/users/edit.php?id=<?=$user['id']?>"><i class="fa fa-edit"></i></a></td>
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
	        $('#users-table').DataTable();
	    });
	</script>
	</body>
	</html>
