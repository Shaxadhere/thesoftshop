<?php
include_once('../web-config.php');
include_once('../models/promo-code-model.php');

session_start();


$PromoCodeModel = new PromoCode();

if(isset($_POST['SavePromoCode'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }

    $errors = array();
    if(empty($_POST['Title'])){
        array_push($errors, "Title is required");
    }
    if(empty($_POST['Code'])){
        array_push($errors, "Code is required");
    }
    if($errors == null){
        $PromoCodeModel->Add(
            $_POST['Title'],
            $_POST['Description'],
            $_POST['Code'],
            $_POST['ValidityStart'],
            $_POST['ValidityEnd'],
            $_POST['MaxDiscount'],
            $_POST['DiscountPercentage'],
            $_POST['DiscountAmount'],
            $_POST['ReferredTo'],
            $_POST['UsageLimit']
        );
        redirectWindow(getHTMLRoot()."/promo-codes");
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['UpdatePromoCode'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['PromoCodeID'])){
        array_push($errors, "PromoCode not found");
    }
    if(empty($_POST['PromoCodeName'])){
        array_push($errors, "PromoCode name is required");
    }
    if(empty($_POST['PromoCodeCode'])){
        array_push($errors, "PromoCode code is required");
    }
    if($errors == null){
        $PromoCodeModel->Edit(
            $_POST['PromoCodeID'],
            $_POST['Title'],
            $_POST['Description'],
            $_POST['Code'],
            $_POST['ValidityStart'],
            $_POST['ValidityEnd'],
            $_POST['MaxDiscount'],
            $_POST['DiscountPercentage'],
            $_POST['DiscountAmount'],
            $_POST['ReferredTo'],
            $_POST['UsageLimit']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['DeletePromoCode'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['PromoCodeID'])){
        array_push($errors, "PromoCode not found");
    }
    if($errors == null){
        $PromoCodeModel->Delete(
            $_POST['PromoCodeID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['RecoverPromoCode'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['PromoCodeID'])){
        array_push($errors, "PromoCode not found");
    }
    if($errors == null){
        $PromoCodeModel->Recover(
            $_POST['PromoCodeID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['PermanentlyDeletePromoCode'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['PromoCodeID'])){
        array_push($errors, "PromoCode not found");
    }
    if($errors == null){
        $PromoCodeModel->PermanentlyDelete(
            $_POST['PromoCodeID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

?>
