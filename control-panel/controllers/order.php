<?php
include_once('../web-config.php');
include_once('../models/order-model.php');
session_start();
if(!isset($_SESSION['ADMIN'])){
    exit();
}
$OrderModel = new Order();

if(isset($_POST['UpdateOrderStatus'])){
    $errors = array();
    if(empty($_POST['OrderID'])){
        array_push($errors, "502 - Bad request error");
    }

    if(empty($_POST['OrderStatus'])){
        array_push($errors, "Please select order status");
    }

    if ($errors == null) {
        $Order = $OrderModel->View(
            $_POST['OrderID']
        );
        $Order = mysqli_fetch_array($Order);
        $OrderModel->UpdateOrderStatus(
            $_POST['OrderID'],
            $_POST['OrderStatus']
        );
        $OrderMessage = "";
        $Subject = "";
        if ($_POST['OrderStatus'] == "Preparing") {
            $OrderMessage = "Your order is now processing and will be shipped to you as soon as possible. Thank you for shopping from moreo.pk!";
            $Subject = "Your order is processing";
        } else if ($_POST['OrderStatus'] == "Shipped") {
            $OrderMessage = "Your order is shipped and will be delivered to you with in 2-4 working days. Thank you for shopping from moreo.pk!";
            $Subject = "Your order is shipped";
        } else if ($_POST['OrderStatus'] == "Delivered") {
            $OrderMessage = "Your order is delivered at your provided address. Thank you for shopping from moreo.pk, We expect a visit from you again <3.";
            $Subject = "Your order is delivered";
        }
        if (!empty($Subject)) {
            $SMTPCredentials = getSMTPCredentials();
            
            include_once('../../assets/vendor/phprapid/assets/class.phpmailer.php');
            $mail = new PHPMailer();
            $message = getEmailBody(
                $Order['CustomerName'],
                $Order['OrderNumber'],
                $Order['CustomerShippingAddress'],
                $Order['CustomerContact'],
                $Order['CustomerEmail'],
                $Order['Amount'],
                $Order['DeliveryCost'],
                intval($Order['Amount']) + intval($Order['DeliveryCost']),
                $OrderMessage,
                $Subject
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
            $mail->AddAddress($Order['CustomerEmail']);
            $mail->WordWrap = 50;
            $mail->IsHTML(true);
            $mail->Subject = $Subject;
            $mail->Body = $message;
            $mail->Send();
        }
        echo true;
    } else {
        echo json_encode($errors);
    }
}