<?php
include_once('web-config.php');
session_start();
if(isset($_REQUEST['clear'])){
    $_SESSION['CART'] = "";
}

if(!isset($_SESSION['CART']) || $_SESSION['CART'] == ""){
    $Cart = array();
    $_SESSION['CART'] = $Cart;
}

echo json_encode($_SESSION['CART']);