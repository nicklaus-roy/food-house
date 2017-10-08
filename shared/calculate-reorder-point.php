<?php
    $conn = mysqli_connect('localhost', 'root', 'slsc', 'foodjectives');
    if(mysqli_connect_errno()){
        die("Failed to connect :".mysqli_connect_error());
    }
    $reorder_points = $conn->query("SELECT r.id, r.name, sum(si.quantity), sum(si.quantity)/31 as daily_sales, 
        sum(si.quantity)/31*r.lead_time as reorder_qty, sum(si.quantity)/31*r.lead_time+r.safety_stock reorder_point
        FROM raw_materials r 
        LEFT JOIN stock_issuances si on si.raw_material_id = r.id
        WHERE si.date_issued >= '2017-09-08' AND si.date_issued <= '2017-10-08'
        AND r.id = '$raw_material_id'")->fetch_assoc();
    
        $reorder_quantity = $reorder_details['reorder_quantity'];
        $reorder_point = $reorder_details['reorder_point'];

        $conn->query("UPDATE raw_materials SET reorder_point = '$reorder_point',
            reorder_qty = '$reorder_quantity' WHERE id = '$raw_material_id'");
?>