<?php
include_once('../web-config.php');
include_once('../models/product-model.php');
include_once('../models/color-model.php');
include_once('../models/size-model.php');

$ProductModel = new Product();
$ColorModel = new Color();
$SizeModel = new Size();

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

        $ColorDetails = $ColorModel->FilterByColorName($ProductDetailsArray[0]['ColorName']);
        $ColorDetails = mysqli_fetch_array($ColorDetails);
        $SizeDetails = $SizeModel->FilterBySizeName($ProductDetailsArray[0]['SizeValue']);
        $SizeDetails = mysqli_fetch_array($SizeDetails);

        $Inventory = $ProductModel->InventoryByAttributes(
            $ProductDetailsArray[0]['ProductID'],
            $SizeDetails['PK_ID'],
            $ColorDetails['PK_ID']
        );
        $Inventory = mysqli_fetch_array($Inventory);

        $result = array(
            "success" => true,
            "productDetails" => $ProductDetailsArray,
            "inventory" => $Inventory
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

        $ColorDetails = $ColorModel->FilterByColorName($Color);
        $ColorDetails = mysqli_fetch_array($ColorDetails);
        $SizeDetails = $SizeModel->FilterBySizeName($Size);
        $SizeDetails = mysqli_fetch_array($SizeDetails);

        $Inventory = $ProductModel->InventoryByAttributes(
            $ProductID,
            $SizeDetails['PK_ID'],
            $ColorDetails['PK_ID']
        );
        $Inventory = mysqli_fetch_array($Inventory);
        if ($Inventory == null) {
            array_push($errors, "Quantity must be lesser than available stocks");
            echo json_encode($errors);
            exit();
        } else {
            if ($Inventory['Quantity'] < $Quantity) {
                array_push($errors, "Quantity must be lesser than available stocks");
                echo json_encode($errors);
                exit();
            }
        }
        $AlreadyExistsInCart = false;
        $index = 0;
        $key = "";
        foreach ($Cart as $item) {
            if ($item['productId'] == $ProductID && $item['productColor'] == $Color && $item['productSize'] == $Size) {
                // echo json_encode($item);
                $key = $item['CartItemId'];
                $AlreadyExistsInCart = true;
                if ($Inventory['Quantity'] < (intval($item['productqty']) + intval($Quantity))) {
                    array_push($errors, "Quantity must be lesser than available stocks");
                    echo json_encode($errors);
                    exit();
                }
                break;
            }
            $index++;
        }
        if ($AlreadyExistsInCart) {
            $Cart = $_SESSION['CART'];
            $Cart[$key]['productqty'] = intval($Cart[$key]['productqty']) + intval($Quantity);
            $_SESSION['CART'] = $Cart;

            $result = array(
                "success" => true
            );
            echo json_encode($result);
        } else {
            $cartItemId = random_strings(10);
            $CartItem = array(
                "CartItemId" => $cartItemId,
                "productId" => $ProductID,
                "productqty" => $Quantity,
                "productColor" => $Color,
                "productSize" => $Size
            );
            $count = count($Cart);
            $count = strval($count);
            $Cart[$cartItemId] = $CartItem;
            $_SESSION['CART'] = $Cart;

            $result = array(
                "success" => true
            );
            echo json_encode($result);
        }
    } else {
        echo json_encode($errors);
    }
}

if (isset($_POST['CheckQuantity'])) {
    $errors = array();

    if (empty($_POST['ProductID'])) {
        array_push($errors, "502 - Bad request error");
    }

    if (empty($_POST['Color'])) {
        array_push($errors, "Please choose a color");
    }

    if (empty($_POST['Size'])) {
        array_push($errors, "Please choose a size");
    }

    $ProductID = base64_decode($_POST['ProductID']);
    $ProductID = mysqli_real_escape_string(connect(), $ProductID);
    $Color = mysqli_real_escape_string(connect(), $_POST['Color']);
    $Size = mysqli_real_escape_string(connect(), $_POST['Size']);

    $Product = $ProductModel->FilterByProductID(base64_encode($ProductID));
    $Product = mysqli_fetch_array($Product);

    $ColorDetails = $ColorModel->FilterByColorName($Color);
    $ColorDetails = mysqli_fetch_array($ColorDetails);
    $SizeDetails = $SizeModel->FilterBySizeName($Size);
    $SizeDetails = mysqli_fetch_array($SizeDetails);

    $Inventory = $ProductModel->InventoryByAttributes(
        $ProductID,
        $SizeDetails['PK_ID'],
        $ColorDetails['PK_ID']
    );
    $Inventory = mysqli_fetch_array($Inventory);
    if ($Inventory != null) {
        echo $Inventory['Quantity'] . " pieces available.";
    } else {
        echo "<span class='text-danger'>Out of stock</span>";
    }
}

if (isset($_POST['RemoveItemFromCart'])) {
    session_start();
    $errors = array();
    if (empty($_POST['CartItemId'])) {
        array_push($errors, "502 - Bad request error");
    }

    if ($errors == null) {
        $Cart = $_SESSION['CART'];
        $index = 0;
        foreach ($Cart as $item) {
            if ($item['CartItemId'] == $_POST['CartItemId']) {
                $CartIndex = $index;
                $key = $item['CartItemId'];
                break;
            }
            $index++;
        }
        if (isset($Cart[$key])) {
            // echo $index;
            unset($Cart[$key]);
        } else {
            // echo $index;
            unset($Cart[strval($key)]);
        }
        $_SESSION['CART'] = $Cart;
        echo true;
    }
}

if(isset($_POST['AddToWishList'])){
    $errors = array();
    session_start();
    if (!isset($_SESSION['WISHLIST']) || $_SESSION['WISHLIST'] == "") {
        $Wishlist = array();
        $_SESSION['WISHLIST'] = $Wishlist;
    }
    if(empty($_POST['ProductID'])){
        array_push($errors, "502 - Bad request error");
    }

    if($errors == null){
        $Wishlist = $_SESSION['WISHLIST'];
        if($Wishlist == null){

        }
        else{
            
        }
        foreach($Wishlist as $item){
            if($item != $_POST['ProductID']){
                array_push($Wishlist, $_POST['ProductID']);
            }
        }
        $_SESSION['WISHLIST'] = $Wishlist;
        echo true;
    }
    else{
        echo json_encode($errors);
    }

}