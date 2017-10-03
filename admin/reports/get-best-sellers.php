<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $best_sellers_query = $conn->query("SELECT s.*, p.name FROM (SELECT SUM(amount) sales, monthname(date_time), product_id  FROM sales 
        GROUP BY product_id ORDER BY sales DESC) AS s INNER JOIN products p ON p.id= s.product_id LIMIT 10;");

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