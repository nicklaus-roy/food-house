<?php
    include('../layouts/master.php');
?>
<link rel="stylesheet" href="/plugins/datatables/datatables.min.css">
<div class="content-wrapper">

    <section class="content-header">
        <h1>
          Add User
        </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
            <li class="active">Add User</li>
        </ol>
    </section>

    <section class="content container-fluid" >
        <div class="row">
            <div class="col-sm-11">
                <form action="/admin/users/store.php" method = "POST">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name = "last_name" id = "last_name" >
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name = "first_name" id = "first_name" >
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" class="form-control" name = "middle_name" id = "middle_name" >
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select  class="form-control" name = "role" id = "role">
                            <option value="admin" selected="">Admin</option>
                            <option value="cook">Cook</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name = "save_changes">Add</button>
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
