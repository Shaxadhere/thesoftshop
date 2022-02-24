<?php
include_once('../web-config.php');
include_once('../models/promo-code-model.php');

session_start();


$PromoCodeModel = new PromoCode();

if(isset($_POST['CreatePromoCode'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    
    $errors = array();
    if(empty($_POST['PromoCodeName'])){
        array_push($errors, "PromoCode name is required");
    }
    if(empty($_POST['PromoCodeCode'])){
        array_push($errors, "PromoCode code is required");
    }
    if($errors == null){
        $PromoCodeModel->Add(
            $_POST['PromoCodeName'],
            $_POST['PromoCodeCode'],
            $_SESSION['ADMIN']['PK_ID']
        );
        echo true;
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
            $_POST['PromoCodeName'],
            $_POST['PromoCodeCode']
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
