<?php
include_once('web-config.php');
// session_start();
// if(isset($_REQUEST['clear'])){
//     $_SESSION['CART'] = "";
// }

// if(!isset($_SESSION['CART']) || $_SESSION['CART'] == ""){
//     $Cart = array();
//     $_SESSION['CART'] = $Cart;
// }

// echo json_encode($_SESSION['CART']);

// if(isset($_REQUEST['clear'])){
//     $_SESSION['LASTORDER'] = "";
// }

// if(!isset($_SESSION['LASTORDER']) || $_SESSION['LASTORDER'] == ""){
//     $Cart = array();
//     $_SESSION['LASTORDER'] = $Cart;
// }

// echo json_encode($_SESSION['LASTORDER']);


// File and new size
// $filename = 'uploads/product-images/asd.jpg';
// $percent = 0.5;

// // Content type
// header('Content-Type: image/jpeg');

// // Get new sizes
// list($width, $height) = getimagesize($filename);
// $newwidth = $width * $percent;
// $newheight = $height * $percent;

// // Load
// $thumb = imagecreatetruecolor($newwidth, $newheight);
// $source = imagecreatefromjpeg($filename);

// // Resize
// imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// // Output
// imagejpeg($thumb);

// echo resizeImage('uploads/product-images/asd.jpg', 200, 200);


?>
<img src="<?= resizeImageT() ?>"/>