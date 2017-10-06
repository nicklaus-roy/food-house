<?php
    session_start();
    date_default_timezone_set("Asia/Manila");
    include './shared/db_connect.php';
    $username = $_POST['username'];
    $user_query = $conn->query("SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($user_query) > 0){
        $user = $user_query->fetch_assoc();
        if($user['password'] != $_POST['password']){
            $_SESSION['errors'] = "Invalid credentials.";
            header("Location:index.php");
            exit;
        }

        $_SESSION['auth_user'] = $user;
        $cur_date = date("Y-m-d");
        $cur_time = date("h:i:s");
        $id = $user['id'];
        $conn->query("INSERT INTO history_logs (user_id, activity, log_date, log_time) VALUES ('$id', 'logged in', '$cur_date', '$cur_time')");

        if($user['role'] == 'admin'){
            header("Location:/admin/home.php");
        }
        else if($user['role'] == 'cook'){
            header("Location:/admin/inventory/index.php");
        }
        else{
            header("Location:/admin/orders/index.php");
        }
    }
    else{
        $_SESSION['errors'] = "No user was found.";
        header("Location:index.php");
    }

?>