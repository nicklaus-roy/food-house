<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');


    $qtys_on_hand = $_POST['qty_on_hand'];    
    $raw_material_id = $_POST['raw_material_id'];   

    foreach($qtys_on_hand as $key => $qty_on_hand){
        if(isset($_POST['approve-changes'])){
            $conn->query("UPDATE raw_materials SET qty = '$qty_on_hand', delivered_qty = 0, issued_qty = 0 WHERE id = '$raw_material_id[$key]'");            
        }
    } 
    header("Location:/admin/inventory/index.php");
?>