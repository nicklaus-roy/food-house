<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    if(isset($_POST['save_changes'])){
        $last_name = $_POST['last_name'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $role = $_POST['role'];
        $username = $first_name." ".$last_name;

        $query = $conn->query("INSERT INTO users (last_name, first_name, middle_name, role, username, password, image_url) 
            VALUES ('$last_name', '$first_name', '$middle_name','$role', '$username', 'password', '/images/user.jpg')");
        header("Location:/admin/users/index.php");

    }

?>