<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    date_default_timezone_set("Asia/Manila");
    include($root.'/shared/db_connect.php');


    $qty_ends = $_POST['qty_end'];    
    $raw_material_id = $_POST['raw_material_id'];   

    foreach($qty_ends as $key => $qty_end){
        if(isset($_POST['approve-changes'])){
            $reorder_lvl = $conn->query("SELECT reorder_lvl FROM raw_materials WHERE id = '$raw_material_id[$key]'")->fetch_assoc();
            if($reorder_lvl['reorder_lvl'] >= $qty_end){
                $conn->query("UPDATE raw_materials SET qty = '$qty_end', qty_end = '0', status = 'NOT OK' WHERE id = '$raw_material_id[$key]'");
            }
        }
        else{
            $conn->query("UPDATE raw_materials SET qty_end = '$qty_end' WHERE id = '$raw_material_id[$key]'");
        }
    } 
    header("Location:/admin/inventory/index.php");
?>