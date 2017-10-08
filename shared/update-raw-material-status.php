<?php
    $conn->query("UPDATE raw_materials SET status = 'OK' WHERE (qty-issued_qty) > reorder_point");
    $conn->query("UPDATE raw_materials SET status = 'CRITICAL' WHERE (qty-issued_qty) <= reorder_point;");
?>