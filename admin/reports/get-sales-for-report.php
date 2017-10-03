<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    if($_GET['selectedChart'] == 'monthlyChart'){
        $sales_query = $conn->query("SELECT SUM(amount) sales, monthname(date_time) as sales_month FROM sales GROUP BY sales_month");
    }
    else{ 
        $sales_query = $conn->query("SELECT SUM(amount) sales, year(date_time) sales_year FROM sales GROUP BY sales_year;");
    }

    $sales = array();
    if(!$sales_query){
        echo "";
    }
    else{
        while($r = $sales_query->fetch_assoc()){
            $sales[] = $r;
        }
        echo json_encode($sales);
    }
    
?>