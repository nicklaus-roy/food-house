<?php
    $conn->query("UPDATE raw_materials SET status = 'OK' WHERE qty > reorder_point");
    $conn->query("UPDATE foodjectives.raw_materials SET status = 'CRITICAL' WHERE qty <= reorder_point;");

    header("Location:/admin/delivery/index.php");
?>