<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    if(isset($_POST['save_changes'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $unit = $_POST['unit'];
        $available = $_POST['available'];

        $query = $conn->query("UPDATE products SET name = '$name', price = '$price', unit = '$unit', available = '$available' WHERE id = '$id'");
        header("Location:/admin/products/index.php");

    }
?>