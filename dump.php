<?php
session_start();
// $_SESSION['CART'] = "";

if(!isset($_SESSION['CART']) || $_SESSION['CART'] == ""){
    $Cart = array();
    $_SESSION['CART'] = $Cart;
}

echo json_encode($_SESSION['CART']);
