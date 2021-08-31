<?php
include_once('web-config.php');
session_start();
if(isset($_REQUEST['clear'])){
    $_SESSION['WISHLIST'] = "";
}

if(!isset($_SESSION['WISHLIST']) || $_SESSION['WISHLIST'] == ""){
    $Wishlist = array();
    $_SESSION['WISHLIST'] = $Wishlist;
}

echo json_encode($_SESSION['WISHLIST']);

// if(isset($_REQUEST['clear'])){
//     $_SESSION['LASTORDER'] = "";
// }

// if(!isset($_SESSION['LASTORDER']) || $_SESSION['LASTORDER'] == ""){
//     $Cart = array();
//     $_SESSION['LASTORDER'] = $Cart;
// }

// echo json_encode($_SESSION['LASTORDER']);

?>