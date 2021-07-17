<?php
include_once('../web-config.php');
include_once('../models/order-model.php');
include_once('../models/product-model.php');
include_once('../models/color-model.php');
include_once('../models/size-model.php');

$OrderModel = new Order();
$ProductModel = new Product();
$ColorModel = new Color();
$SizeModel = new Size();

if (isset($_POST['SubmitOrder'])) {
    session_start();
    if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "") {
        array_push($errors, "Your cart is empty!");
    } else {
        $Cart = $_SESSION['CART'];
        $OrderInvoice = array();
        foreach ($Cart as $item) {
            $Product = $ProductModel->FilterByProductID(base64_encode($item['productId']));
            $Product = mysqli_fetch_array($Product);

            $ProductItem = array(
                "ProductId" => $item['productId'],
                "ProductColor" => $item['productColor'],
                "ProductSize" => $item['productSize'],
                "ProductQuantity" => $item['productqty'],
                "PricePerUnit" => $Product['Price']
            );
            array_push($OrderInvoice, $ProductItem);

            $ColorDetails = $ColorModel->FilterByColorName($item['productColor']);
            $ColorDetails = mysqli_fetch_array($ColorDetails);
            $SizeDetails = $SizeModel->FilterBySizeName($item['productSize']);
            $SizeDetails = mysqli_fetch_array($SizeDetails);

            $Inventory = $ProductModel->InventoryByAttributes(
                $item['productId'],
                $SizeDetails['PK_ID'],
                $ColorDetails['PK_ID']
            );
            $Inventory = mysqli_fetch_array($Inventory);
            $NewQty = intval($Inventory['Quantity']) - intval($item['productqty']);
            $ProductModel->UpdateInventory(
                base64_encode($Inventory['PK_ID']),
                $NewQty
            );
        }
    }
    $errors = array();
    if (empty($_POST['FullName'])) {
        array_push($errors, "Please enter your name");
    }
    if (empty($_POST['Phone'])) {
        array_push($errors, "Please enter your phone number");
    }
    if (empty($_POST['ShippingAddress'])) {
        array_push($errors, "Please enter your shipping address");
    }
    if (empty($_POST['City'])) {
        array_push($errors, "Please enter your city name");
    }
    if (empty($_POST['State'])) {
        array_push($errors, "Please select state");
    }
    if (
        isHTML($_POST['FullName'])
        && isHTML($_POST['Phone'])
        && isHTML($_POST['ShippingAddress'])
        && isHTML($_POST['City'])
        && isHTML($_POST['State'])
        && isHTML($_POST['Email'])
        && isHTML($_POST['OrderNotes'])
    ) {
        array_push($errors, "Invalid input of data is strictly not allowed");
    }

    $CustomerID = (isset($_SESSION['USER'])) ? $_SESSION['USER']['PK_ID'] : "";

    if ($errors == null) {
        $OrderNumber = generateNumericString(0, 17);
        $OrderModel->Add(
            $CustomerID,
            $OrderNumber,
            $_POST['FullName'],
            $_POST['Email'],
            $_POST['Phone'],
            $_POST['ShippingAddress'],
            $_POST['ShippingAddress'],
            $_POST['City'],
            $_POST['State'],
            json_encode($OrderInvoice),
            "Recieved",
            $_POST['OrderNotes']
        );
        $result = array(
            "success" => true,
            "OrderNumber" => $OrderNumber
        );
        $_SESSION['LASTORDER'] = array(
            $CustomerID,
            $OrderNumber,
            $_POST['FullName'],
            $_POST['Email'],
            $_POST['Phone'],
            $_POST['ShippingAddress'],
            $_POST['ShippingAddress'],
            $_POST['City'],
            $_POST['State'],
            $OrderInvoice,
            "Recieved",
            $_POST['OrderNotes']
        );
        unset($_SESSION['CART']);
        echo json_encode($result);
    } else {
        echo json_encode($errors);
    }
}

if (isset($_POST['UpdateCart'])) {
    session_start();
    if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "") {
        array_push($errors, "Your cart is empty!");
    } else {
        $Cart = $_SESSION['CART'];
        $SessionIDs = $_POST['SessionIDs'];
        $Quantities = $_POST['Quantities'];
        $index = 0;
        foreach ($Cart as $item) {
            $item['productqty'] = $Quantities[$index];
            foreach ($Cart as $key) {
                if($Cart[$item['CartItemId']]){
                    $Cart[$item['CartItemId']] = $item;
                }
                if($item['productqty'] == 0){
                    unset($Cart[$item['CartItemId']]);
                }
            }
            $index++;
        }
        $_SESSION['CART'] = $Cart;
        echo true;
    }
}
