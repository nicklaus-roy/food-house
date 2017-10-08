<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    $raw_material_id = $_POST['raw_material_id'];
    $quantity = $_POST['quantity'];
    $date_received = date("Y-m-d");
    $query = $conn->query("INSERT INTO deliveries (raw_material_id, quantity, date_received) 
        VALUES ('$raw_material_id', '$quantity', '$date_received')");
    $conn->query("UPDATE raw_materials SET qty = qty+".$quantity.", delivered_qty = '$quantity' WHERE id = '$raw_material_id'");

    include($root.'/shared/update-raw-material-status.php');
    header("Location:/admin/delivery/index.php");


?>