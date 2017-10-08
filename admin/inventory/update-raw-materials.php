<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');


    $qtys_on_hand = $_POST['qty_on_hand'];    
    $raw_material_id = $_POST['raw_material_id'];   

    foreach($qtys_on_hand as $key => $qty_on_hand){
        if(isset($_POST['commit-changes'])){
            $before_raw_material = $conn->query("SELECT qty, delivered_qty, issued_qty FROM raw_materials 
                WHERE id = '$raw_material_id[$key]'")->fetch_assoc();
            $changed_values = $before_raw_material['qty'].','.$before_raw_material['delivered_qty'].','.$before_raw_material['issued_qty'];
            $conn->query("UPDATE raw_materials SET qty = '$qty_on_hand', delivered_qty = 0, issued_qty = 0, changed_values = '$changed_values' 
                WHERE id = '$raw_material_id[$key]'");

        }
        else if(isset($_POST['rollback-changes'])){
            $before_raw_material = $conn->query("SELECT changed_values FROM raw_materials 
                WHERE id = '$raw_material_id[$key]'")->fetch_assoc();
            $changed_values = explode(',', $before_raw_material['changed_values']);
            $conn->query("UPDATE raw_materials SET qty = '$changed_values[0]', delivered_qty = '$changed_values[1]', issued_qty = '$changed_values[2]' 
                WHERE id = '$raw_material_id[$key]'");
        }
    } 
    header("Location:/admin/inventory/index.php");
?>