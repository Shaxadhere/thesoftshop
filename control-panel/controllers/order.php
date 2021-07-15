<?php
include_once('../web-config.php');
include_once('../models/order-model.php');
include_once('../models/product-model.php');

session_start();
if(!isset($_SESSION['ADMIN'])){
    exit();
}

$OrderModel = new Order();
$ProductModel = new Product();

if(isset($_POST['ViewOrder'])){
    $errors = array();
    if(empty($_POST['OrderID'])){
        array_push($errors, "502 - Bad request error");
    }

    if($errors == null){
        $OrderDetails = $OrderModel->View($_POST['OrderID']);
        $OrderDetails = mysqli_fetch_array($OrderDetails);
        $ProductsWithQuantity = json_decode($OrderDetails['ProductsWithQuantity'], true);
        $Products = array();
        foreach($ProductsWithQuantity as $product){
            $SingleProduct = $ProductModel->View(base64_encode($product['ProductId']));
            $SingleProduct = mysqli_fetch_array($SingleProduct);
            array_push($Products, $SingleProduct);
        }
        
        $result = array(
            "success" => true,
            "orderDetails" => $OrderDetails,
            "products" => $Products
        );
    }
    else{
        $result = array(
            "success" => false,
            "errors" => $errors
        );
    }
    echo json_encode($result);
}