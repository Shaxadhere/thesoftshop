<?php
include_once('../web-config.php');
include_once('../models/order-model.php');

$OrderModel = new Order();

if(isset($_POST['SubmitOrder'])){
    $errors = array();
    if(empty($_POST['FullName'])){
        array_push($errors, "Please enter your name");
    }
    if(empty($_POST['Email'])){
        array_push($errors, "Please enter your name");
    }
    if(empty($_POST['Phone'])){
        array_push($errors, "Please enter your name");
    }
    if(empty($_POST['ShippingAddress'])){
        array_push($errors, "Please enter your name");
    }
    if(empty($_POST['City'])){
        array_push($errors, "Please enter your name");
    }
    if(empty($_POST['State'])){
        array_push($errors, "Please enter your name");
    }
}
