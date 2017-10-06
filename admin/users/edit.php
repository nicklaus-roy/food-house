<?php
    include('../layouts/master.php');
    $id = $_GET['id'];
    $user = $conn->query("SELECT * FROM users WHERE id = '$id'")->fetch_assoc();
?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
          Edit User
        </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
            <li class="active">Edit User</li>
        </ol>
    </section>

    <section class="content container-fluid" >
        <div class="row">
            <div class="col-sm-11">
                <form action="/admin/users/update.php" method = "POST">
                    <input type="hidden" name = "user_id" value = "<?=$user['id']?>">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name = "last_name" id = "last_name" value = "<?=$user['last_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name = "first_name" id = "first_name" value = "<?=$user['first_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" class="form-control" name = "middle_name" id = "middle_name" value = "<?=$user['middle_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="role">Role: (current: <?=$user['role']?>)</label>
                        <select  class="form-control" name = "role" id = "role">
                            <option value selected disabled>Choose New Role</option>
                            <option value="admin">Admin</option>
                            <option value="cook" >Cook</option>
                            <option value="staff" >Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name = "save_changes">Update</button>
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
