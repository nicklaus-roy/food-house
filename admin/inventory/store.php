<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    if(isset($_POST['save_changes'])){
        $name = $_POST['name'];
        $qty = $_POST['qty'];
        $unit = $_POST['unit'];
        $status = $_POST['status'];

        $query = $conn->query("INSERT INTO raw_materials (name, qty, unit, status) VALUES ('$name', '$qty', '$unit','$status')");
        header("Location:/admin/inventory/index.php");

    }

?>