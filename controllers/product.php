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

?>