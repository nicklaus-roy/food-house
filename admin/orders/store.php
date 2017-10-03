<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    
    

    include($root.'/shared/Item.php');

    
    date_default_timezone_set("Asia/Manila");

    
    include($root.'/shared/db_connect.php');

    

    if(isset($_POST['print-receipt'])){        
        $date_time = date("Y-m-d H:i:s");
        $amount_given = $_POST['amount_given'];
        $discount_amount = $_POST['discount_amount'];
        $discount = $_POST['discount'];
        $change = $_POST['change'];
        $sub_total = $_POST['total_sales'];
        $total_sales = $_POST['total_sales']-$discount_amount;
        $receipt = $conn->query("INSERT INTO official_receipts (amount_given, discount_amount, customer_change, total_sales) VALUES (
            $amount_given, $discount_amount, $change, '$total_sales')");
        $receipt_number = $conn->insert_id;

        $items = array();

        foreach ($_POST['order_id'] as $key => $order_id) {
            $amount = $_POST['order_amount'][$key];
            $qty = $_POST['order_qty'][$key];
            $price = $_POST['order_price'][$key];
            $amount = $_POST['order_amount'][$key];
            $name = $_POST['order_name'][$key];

            if($discount > 0){
                $remarks = "With SC/PWD Discount of ".$discount."%";
                $amount = $amount - $amount*($discount/100);
            }

            $sales = $conn->query("INSERT INTO sales (date_time, amount, qty, product_id, or_number, remarks) VALUES 
                ('$date_time', '$amount', '$qty', '$order_id', '$receipt_number', '$remarks')");
            array_push($items, new Item($qty, $price, $name, $amount));
            
        }

        include($root.'/shared/print_receipt.php');

        header("Location:/admin/orders/index.php");


    }
?>