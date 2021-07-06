<?php
session_start();
// $_SESSION['CART'] = "";

if(!isset($_SESSION['CART']) || $_SESSION['CART'] == ""){
    $Cart = array();
    $_SESSION['CART'] = json_encode($Cart);
}

// $CartItem = array(
//     "productId" => '143',
//     "productqty" => '5',
//     "productColor" => "White",
//     "productSize" => "M"
// );

$CartItem = array(
    "productId" => '223',
    "productqty" => '2',
    "productColor" => "Black",
    "productSize" => "S"
);

// $CartItem = array(
//     "productId" => '143',
//     "productqty" => '5',
//     "productColor" => "White",
//     "productSize" => "M"
// );


$Cart = json_decode($_SESSION['CART']);
array_push($Cart, $CartItem);
$_SESSION['CART'] = json_encode($Cart);


echo ($_SESSION['CART']);
