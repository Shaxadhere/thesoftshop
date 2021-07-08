<?php
include_once('web-config.php');
session_start();
// if(isset($_REQUEST['clear'])){
//     $_SESSION['CART'] = "";
// }

// if(!isset($_SESSION['CART']) || $_SESSION['CART'] == ""){
//     $Cart = array();
//     $_SESSION['CART'] = $Cart;
// }

// echo json_encode($_SESSION['CART']);

if(isset($_REQUEST['clear'])){
    $_SESSION['LASTORDER'] = "";
}

if(!isset($_SESSION['LASTORDER']) || $_SESSION['LASTORDER'] == ""){
    $Cart = array();
    $_SESSION['LASTORDER'] = $Cart;
}

echo json_encode($_SESSION['LASTORDER']);