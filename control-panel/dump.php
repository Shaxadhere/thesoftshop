<?php
include_once('web-config.php');


// $tags = "watches, stickers, icecream";

// $tagexplode = explode(",", $tags);

// echo json_encode($tagexplode);

session_start();
$Cart = $_SESSION['CART'];
echo json_encode($Cart);