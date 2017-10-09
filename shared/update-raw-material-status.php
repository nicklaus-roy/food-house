<?php
    $conn->query("UPDATE raw_materials SET status = 'OK' WHERE qty_on_hand > reorder_point");
    $conn->query("UPDATE raw_materials SET status = 'CRITICAL' WHERE qty_on_hand <= reorder_point;");
?>