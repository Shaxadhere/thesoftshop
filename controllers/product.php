<?php
include_once('../web-config.php');
include_once('../models/product-model.php');

$ProductModel = new Product();

if(isset($_POST['ViewProduct'])){
    $errors = array();
    if(empty($_POST['ProductID'])){
        array_push($errors, "502 - Bad Request Error");
    }
    if($errors == null){
        $Product = $ProductModel->FilterWithAttributesByProductID(
            $_POST['ProductID']
        );
        $ProductDetailsArray = array();
        while ($row = mysqli_fetch_array($Product)){
            array_push($ProductDetailsArray, $row);
        }
        $result = array(
            "success" => true,
            "productDetails" => $ProductDetailsArray
        );
        echo json_encode($result);
    }
    else{
        $result = array(
            "success" => false,
            "error" => $errors[0]
        );
        echo json_encode($result);
    }
}

if(isset($_POST['AddToCart'])){
    $errors = array();

    if(empty($_POST['ProductID'])){
        array_push($errors, "502 - Bad request error");
    }

    if(empty($_POST['Color'])){
        array_push($errors, "Please choose a color");
    }

    if(empty($_POST['Size'])){
        array_push($errors, "Please choose a size");
    }

    if(empty($_POST['Quantity']) || $_POST['Quantity'] == "0" || $_POST['Quantity'] == 0){
        array_push($errors, "Invalid quantity");
    }
    
    if($errors == null){
        $ProductID = base64_decode($_POST['ProductID']);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        $Color = mysqli_real_escape_string(connect(), $_POST['Color']);
        $Size = mysqli_real_escape_string(connect(), $_POST['Size']);
        $Quantity = mysqli_real_escape_string(connect(), $_POST['Quantity']);
    
        $CartItem = array(
            "productId" => $ProductID,
            "productqty" => $Quantity,
            "productColor" => $Color,
            "productSize" => $Size
        );
    
        session_start();
        if(!isset($_SESSION['CART']) || $_SESSION['CART'] == ""){
            $Cart = array();
            $_SESSION['CART'] = json_encode($Cart);
        }
    
        $Cart = json_decode($_SESSION['CART']);
        array_push($Cart, $CartItem);
        $_SESSION['CART'] = json_encode($Cart);
        echo true;
    }
    else{
        echo json_encode($errors);
    }
    
}
