<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $date_from = $_GET['date_from'];
    $date_to = $_GET['date_to'];

    $sales_query = $conn->query("SELECT r.or_number, s.amount, s.qty, p.name as product_name
        FROM official_receipts r INNER JOIN sales s ON r.or_number = s.or_number 
        INNER JOIN products p ON s.product_id = p.id WHERE date(s.date_time) >= '$date_from' AND date(s.date_time) <= '$date_to'");
    $sales = array();
    while($r = $sales_query->fetch_assoc()){
        $sales[] = $r;
    }
    echo json_encode($sales);
?>