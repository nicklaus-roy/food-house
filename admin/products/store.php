<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    if(isset($_POST['save_changes'])){
        $id = "PRD-".(explode("-", $conn->query('SELECT id FROM products ORDER BY id DESC LIMIT 1')->fetch_assoc()['id'])[1]+1);
        $name = $_POST['name'];
        $price = $_POST['price'];
        $unit = $_POST['unit'];
        $available = $_POST['available'];

        $query = $conn->query("INSERT INTO products (id, name, price, unit, available) VALUES ('$id', '$name', '$price', '$unit', '$available')");
        header("Location:/admin/products/index.php");

    }
?>