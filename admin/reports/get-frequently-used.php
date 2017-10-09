<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $best_sellers_query = $conn->query("SELECT r.id, r.name, sum(si.quantity) issued_quantity FROM raw_materials r INNER JOIN stock_issuances si ON r.id = si.raw_material_id
        GROUP BY r.id ORDER BY issued_quantity DESC LIMIT 10 ");

    $best_sellers = array();
    if(!$best_sellers_query){
        echo "";
    }
    else{
        while($r = $best_sellers_query->fetch_assoc()){
            $best_sellers[] = $r;
        }
        echo json_encode($best_sellers);
    }
    
?>