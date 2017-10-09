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
    $conn->query("UPDATE raw_materials SET qty_on_hand = qty_on_hand+".$quantity." WHERE id = '$raw_material_id'");

    include($root.'/shared/calculate-reorder-point.php');
    include($root.'/shared/update-raw-material-status.php');

    $_SESSION['message'] = "Delivery updated.";
    header("Location:/admin/inventory/index.php");


?>