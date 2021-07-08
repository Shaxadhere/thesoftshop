<?php
include_once('../web-config.php');
include_once('../models/order-model.php');
include_once('models/product-model.php');

$OrderModel = new Order();
$ProductModel = new Product();

if(isset($_POST['SubmitOrder'])){
    session_start();
    if(!isset($_SESSION['CART'])){
        redirectWindow(getHTMLRoot()."?error=you cart is empty");
    }
    $errors = array();
    if(empty($_POST['FullName'])){
        array_push($errors, "Please enter your name");
    }
    if(empty($_POST['Phone'])){
        array_push($errors, "Please enter your phone number");
    }
    if(empty($_POST['ShippingAddress'])){
        array_push($errors, "Please enter your shipping address");
    }
    if(empty($_POST['City'])){
        array_push($errors, "Please enter your city name");
    }
    if(empty($_POST['State'])){
        array_push($errors, "Please select state");
    }
    if(
    isHTML($_POST['FullName']) 
    && isHTML($_POST['Phone']) 
    && isHTML($_POST['ShippingAddress']) 
    && isHTML($_POST['City']) 
    && isHTML($_POST['State'])
    && isHTML($_POST['Email'])
    && isHTML($_POST['OrderNotes'])
    ){
        array_push($errors, "Invalid input of data is strictly not allowed");
    }

    $CustomerID = (isset($_SESSION['USER'])) ? $_SESSION['USER']['PK_ID'] : "";
    $Cart = $_SESSION['CART'];
    $OrderInvoice = array();
    foreach ($Cart as $item) {
        $Product = $ProductModel->FilterByProductID(base64_encode($cartItem['productId']));
        $Product = mysqli_fetch_array($Product);

        $ProductItem = array(
            "ProductId" => $item['productId'],
            "ProductColor" => $item['productColor'],
            "ProductSize" => $item['productSize'],
            "ProductQuantity" => $item['productqty'],
            "PricePerUnit" => $Product['Price']
        );
        array_push($OrderInvoice, $ProductItem);
    }
    
    if($errors == null){
        $OrderModel->Add(
            $CustomerID,
            generateNumericString(0, 17),
            $_POST['FullName'],
            $_POST['Email'],
            $_POST['Phone'],
            $_POST['ShippingAddress'],
            $_POST['ShippingAddress'],
            $_POST['City'],
            $_POST['State'],
            json_encode($OrderInvoice),
            "Recieved",
            $_POST['OrderNotes']
        );
        echo true;
    }
}
