	<?php
	    include('../layouts/master.php');

	    $history_logs = $conn->query("SELECT hl.*, concat(u.last_name, ', ', u.first_name) as full_name 
	    	FROM history_logs hl INNER JOIN users u ON hl.user_id = u.id");
	    $history_log = $_SESSION['auth_history_log'];

	?>
	<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
	<div class="content-wrapper">
	    <section class="content-header">
	        <h1>
	        History Logs
	        </h1>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="fa fa-dashboard"></i> History</a></li>
	            <li class="active">Logs</li>
	        </ol>
	    </section>

	    <section class="content container-fluid" id = "app-orders">
	       <div class="row">
	           <div class="col-sm-11">
                   <table class="table table-bordered" id = "history-logs-table">
                       <thead>
                           <tr>
                               <th>User</th>
                               <th>Activity</th>
                               <th>Date</th>
                               <th>Time</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php while($history_log = $history_logs->fetch_assoc()){ ?>
                            <tr>
                                <td><?=$history_log['full_name']?></td>
                                <td><?=$history_log['activity']?></td>
                                <td><?=date_format(date_create($history_log['log_date']), "M d, Y")?></td>
                                <td><?=date_format(date_create($history_log['log_time']), "h:i:s a")?></td>
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
	        $('#history-logs-table').DataTable();
	    });
	</script>
	</body>
	</html>
