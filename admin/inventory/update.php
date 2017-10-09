<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');

    if(isset($_POST['save_changes'])){
        $id = $_POST['id'];
        $qty = $_POST['qty'];
        $qty_on_hand = $_POST['qty_on_hand'];

        $query = $conn->query("UPDATE raw_materials SET qty_on_hand = '$qty_on_hand', qty = '$qty'
            WHERE id = '$id'");

        include($root.'/shared/update-raw-material-status.php');

        header("Location:/admin/inventory/index.php");

    }
?>