<?php
    session_start();
    date_default_timezone_set("Asia/Manila");
    include './shared/db_connect.php';
    $cur_date = date("Y-m-d");
    $cur_time = date("H:i:s");
    $id = $_SESSION['auth_user']['id'];
    $conn->query("INSERT INTO history_logs (user_id, activity, log_date, log_time) VALUES ('$id', 'logged out', '$cur_date', '$cur_time')");
    session_destroy();
    header("Location:/index.php");
?>