<?php
include_once('../web-config.php');
include_once('../models/product-model.php');

$ProductModel = new Product();

if (isset($_POST['ViewProduct'])) {
    $errors = array();
    if (empty($_POST['ProductID'])) {
        array_push($errors, "502 - Bad Request Error");
    }
    if ($errors == null) {
        $Product = $ProductModel->FilterWithAttributesByProductID(
            $_POST['ProductID']
        );
        $ProductDetailsArray = array();
        while ($row = mysqli_fetch_array($Product)) {
            array_push($ProductDetailsArray, $row);
        }
        $result = array(
            "success" => true,
            "productDetails" => $ProductDetailsArray
        );
        echo json_encode($result);
    } else {
        $result = array(
            "success" => false,
            "error" => $errors[0]
        );
        echo json_encode($result);
    }
}

if (isset($_POST['AddToCart'])) {
    $errors = array();
    session_start();
    if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "") {
        $Cart = array();
        $_SESSION['CART'] = $Cart;
    }

    if (empty($_POST['ProductID'])) {
        array_push($errors, "502 - Bad request error");
    }

    if (empty($_POST['Color'])) {
        array_push($errors, "Please choose a color");
    }

    if (empty($_POST['Size'])) {
        array_push($errors, "Please choose a size");
    }

    if (empty($_POST['Quantity']) || $_POST['Quantity'] == "0" || $_POST['Quantity'] == 0) {
        array_push($errors, "Invalid quantity");
    }

    $ProductID = base64_decode($_POST['ProductID']);
    $ProductID = mysqli_real_escape_string(connect(), $ProductID);
    $Color = mysqli_real_escape_string(connect(), $_POST['Color']);
    $Size = mysqli_real_escape_string(connect(), $_POST['Size']);
    $Quantity = mysqli_real_escape_string(connect(), $_POST['Quantity']);

    $Cart = $_SESSION['CART'];

    

    if ($errors == null) {

        $Product = $ProductModel->FilterByProductID(base64_encode($ProductID));
        $Product = mysqli_fetch_array($Product);
        $ProductImages = json_decode($Product['ProductImages']);
        
        
        $AlreadyExistsInCart = false;
        $index = 0;
        foreach($Cart as $item){
            if($item['productId'] == $ProductID && $item['productColor'] == $Color && $item['productSize'] == $Size){
                $AlreadyExistsInCart = true;
                break;
            }
            $index++;
        }
        if($AlreadyExistsInCart){
            $Cart = $_SESSION['CART'];
            $Cart[$index]['productqty'] = intval($Cart[$index]['productqty']) + intval($Quantity);
            $_SESSION['CART'] = $Cart;

            $result = array(
                "success" => true,
                "NewItem" => false,
                "CartItemId" => $cartItemId,
                "Image" => $ProductImages[0],
                "ProductName" => $Product['ProductName'],
                "ProductColor" => $Color,
                "ProductSize" => $Size,
                "Quantity" => $Quantity,
                "Price" => intval($Product['Price']) * intval($Quantity)
            );
            echo json_encode($result);
        }
        else{
            $cartItemId = random_strings(10);
            $CartItem = array(
                "CartItemId" => $cartItemId,
                "productId" => $ProductID,
                "productqty" => $Quantity,
                "productColor" => $Color,
                "productSize" => $Size
            );
            array_push($Cart, $CartItem);
            $_SESSION['CART'] = $Cart;

            $result = array(
                "success" => true,
                "NewItem" => true,
                "CartItemId" => $cartItemId,
                "Image" => $ProductImages[0],
                "ProductName" => $Product['ProductName'],
                "ProductColor" => $Color,
                "ProductSize" => $Size,
                "Quantity" => $Quantity,
                "Price" => intval($Product['Price']) * intval($Quantity)
            );
            echo json_encode($result);
        }
    } else {
        echo json_encode($errors);
    }
}
 