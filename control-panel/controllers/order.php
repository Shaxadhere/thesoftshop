<?php
include_once('../web-config.php');
include_once('../models/order-model.php');
session_start();
if(!isset($_SESSION['ADMIN'])){
    exit();
}
$OrderModel = new Order();

if(isset($_POST['UpdateOrderStatus'])){
    $errors = array();
    if(empty($_POST['OrderID'])){
        array_push($errors, "502 - Bad request error");
    }

    if(empty($_POST['OrderStatus'])){
        array_push($errors, "Please select order status");
    }

    if($errors == null){
        $OrderModel->UpdateOrderStatus(
            $_POST['OrderID'],
            $_POST['OrderStatus']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}