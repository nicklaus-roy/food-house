<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    if(isset($_POST['save_changes'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $qty = $_POST['qty'];
        $unit = $_POST['unit'];
        $status = $_POST['status'];

        $query = $conn->query("UPDATE raw_materials SET name = '$name', qty = '$qty', unit = '$unit', status = '$status' WHERE id = '$id'");
        header("Location:/admin/inventory/index.php");

    }
?>