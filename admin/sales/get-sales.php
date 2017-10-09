<?php
    
    $sales = array();
    while($r = $sales_query->fetch_assoc()){
        $sales[] = $r;
    }
    echo json_encode($sales);
?>