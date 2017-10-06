<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    $or_number = $_GET['or_number'];

    $query = $conn->query("DELETE FROM official_receipts WHERE or_number = '$or_number'");
    header("Location:/admin/receipts/index.php");

    
?>