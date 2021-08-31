<?php
include_once('../web-config.php');
include_once('../models/order-model.php');
include_once('../models/product-model.php');
include_once('../models/color-model.php');
include_once('../models/size-model.php');
include_once('../models/customer-model.php');

$CustomerModel = new Customer();
$OrderModel = new Order();
$ProductModel = new Product();
$ColorModel = new Color();
$SizeModel = new Size();

if (isset($_POST['SubmitOrder'])) {
    session_start();
    $errors = array();
    if (empty($_POST['FullName'])) {
        array_push($errors, "Please enter your name");
        echo json_encode($errors);
        exit();
    }
    if (isHTML($_POST['FullName'])) {
        array_push($errors, "Invalid input of data is strictly not allowed");
        echo json_encode($errors);
        exit();
    }
    if (empty($_POST['Phone'])) {
        array_push($errors, "Please enter your phone number");
        echo json_encode($errors);
        exit();
    }
    if (isHTML($_POST['Phone'])) {
        array_push($errors, "Invalid input of data is strictly not allowed");
        echo json_encode($errors);
        exit();
    }
    if (empty($_POST['ShippingAddress'])) {
        array_push($errors, "Please enter your shipping address");
        echo json_encode($errors);
        exit();
    }
    if (isHTML($_POST['ShippingAddress'])) {
        array_push($errors, "Invalid input of data is strictly not allowed");
        echo json_encode($errors);
        exit();
    }
    if (empty($_POST['City'])) {
        array_push($errors, "Please enter your city name");
        echo json_encode($errors);
        exit();
    }
    if (isHTML($_POST['City'])) {
        array_push($errors, "Invalid input of data is strictly not allowed");
        echo json_encode($errors);
        exit();
    }
    if (empty($_POST['State'])) {
        array_push($errors, "Please select state");
        echo json_encode($errors);
        exit();
    }
    if (isHTML($_POST['State'])) {
        array_push($errors, "Invalid input of data is strictly not allowed");
        echo json_encode($errors);
        exit();
    }
    if (isHtml($_POST['Email'])) {
        array_push($errors, "Invalid Email");
        echo json_encode($errors);
        exit();
    }
    if (empty($_POST['Email'])) {
        array_push($errors, "Email cannot be empty");
        echo json_encode($errors);
        exit();
    }
    if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid Email");
        echo json_encode($errors);
        exit();
    } else if (!validateEmail($_POST['Email'])) {
        array_push($errors, "Invalid Email");
        echo json_encode($errors);
        exit();
    }
    if (isHTML($_POST['OrderNotes'])) {
        array_push($errors, "Invalid input of data is strictly not allowed");
        echo json_encode($errors);
        exit();
    }
    if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "") {
        array_push($errors, "Your cart is empty!");
        echo json_encode($errors);
        exit();
    } else {
        $Cart = $_SESSION['CART'];
        $OrderInvoice = array();
        $DeliveryCost = 170;
        $Amount = 0;

        foreach ($Cart as $item) {
            $Product = $ProductModel->FilterByProductID(base64_encode($item['productId']));
            $Product = mysqli_fetch_array($Product);

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

            if ($Product['PriceVary'] != 1) {
                $Amount = intval($Amount) + (intval($Product['Price'] * $item['productqty']));
            } else {
                $Amount = intval($Amount) + (intval($Inventory['Price'] * $item['productqty']));
            }

            if ($Product['PriceVary'] != 1) {
                $ProductItem = array(
                    "ProductId" => $item['productId'],
                    "ProductColor" => $item['productColor'],
                    "ProductSize" => $item['productSize'],
                    "ProductQuantity" => $item['productqty'],
                    "PricePerUnit" => $Product['Price']
                );
            } else {
                $ProductItem = array(
                    "ProductId" => $item['productId'],
                    "ProductColor" => $item['productColor'],
                    "ProductSize" => $item['productSize'],
                    "ProductQuantity" => $item['productqty'],
                    "PricePerUnit" => $Inventory['Price']
                );
            }
            array_push($OrderInvoice, $ProductItem);

            $NewQty = intval($Inventory['Quantity']) - intval($item['productqty']);
            $ProductModel->UpdateInventory(
                base64_encode($Inventory['PK_ID']),
                $NewQty
            );
        }
    }
    $CustomerID = (isset($_SESSION['USER'])) ? $_SESSION['USER']['PK_ID'] : "";

    if ($errors == null) {
        $OrderNumber = generateNumericString(0, 22);

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
            $_POST['OrderNotes'],
            $DeliveryCost,
            $Amount
        );
        $result = array(
            "success" => true,
            "OrderNumber" => $OrderNumber
        );
        $Subtotal = 0;
        //calculating subtotal
        foreach ($OrderInvoice as $invoiceItem) {
            $Subtotal = $Subtotal + intval($invoiceItem['PricePerUnit']) * intval($invoiceItem['ProductQuantity']);
        }
        
        $SMTPCredentials = getSMTPCredentials();
        include_once('../assets/vendor/phprapid/assets/class.phpmailer.php');
        $mail = new PHPMailer();
        $message = getEmailBody(
            $_POST['FullName'],
            $OrderNumber, 
            $_POST['ShippingAddress'], 
            $_POST['Phone'], 
            $_POST['Email'], 
            $Subtotal, 
            170, 
            intval($Subtotal) + 170, 
            "Thank you for ordering from Moreo.pk!"
        );
        $mail->IsSMTP();
        $mail->Host = $SMTPCredentials['host'];
        $mail->Port = $SMTPCredentials['port'];
        $mail->SMTPAuth = true;
        $mail->Username = $SMTPCredentials['username'];
        $mail->Password = $SMTPCredentials['password'];
        $mail->SMTPSecure = $SMTPCredentials['protocol'];
        $mail->From = $SMTPCredentials['username'];
        $mail->FromName = $SMTPCredentials['username'];
        $mail->AddAddress($_POST['Email']);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = "Your order is recieved";
        $mail->Body = $message;
        $mail->Send();

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
        if (isset($_SESSION['USER'])) {
            $Customer = $CustomerModel->FilterCustomerByID(base64_encode($_SESSION['USER']['PK_ID']));
            $OrderHistory = json_decode($Customer['OrderHistory']);
            if (!isset($OrderHistory) || $OrderHistory == "" || $OrderHistory == null) {
                $OrderHistory = array();
            }
            array_push($OrderHistory, $OrderNumber);
            $CustomerModel->UpdateOrders($Customer['PK_ID'], json_encode($OrderHistory));
        }
        echo json_encode($result);
    } else {
        echo json_encode($errors);
    }
}


if (isset($_POST['UpdateCart'])) {
    $errors = array();
    session_start();
    if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "") {
        array_push($errors, "Your cart is empty!");
    } else {
        $Cart = $_SESSION['CART'];
        $SessionIDs = $_POST['SessionIDs'];
        $Quantities = $_POST['Quantities'];
        $index = 0;
        foreach ($Cart as $item) {
            $ProductID = $item['productId'];
            $Color = $item['productColor'];
            $Size = $item['productSize'];

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
                if ($Inventory['Quantity'] < $Quantities[$index]) {
                    array_push($errors, "Quantity must be lesser than available stocks");
                    echo json_encode($errors);
                    exit();
                }
            }

            $item['productqty'] = $Quantities[$index];
            foreach ($Cart as $key) {
                if ($Cart[$item['CartItemId']]) {
                    $Cart[$item['CartItemId']] = $item;
                }
                if ($item['productqty'] == 0) {
                    unset($Cart[$item['CartItemId']]);
                }
            }
            $index++;
        }
        $_SESSION['CART'] = $Cart;
        echo true;
    }
    if ($errors != null) {
        echo json_encode($errors);
    }
}
