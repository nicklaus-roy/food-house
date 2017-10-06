<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');
    $user_id = $_POST['user_id'];

    if(isset($_POST['save_changes'])){
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $role = $_POST['role'];

        $query = $conn->query("UPDATE users SET last_name = '$last_name', first_name = '$first_name', middle_name = '$middle_name', role = '$role'
            WHERE id = '$user_id'");
        header("Location:/admin/users/index.php");

    }

?>