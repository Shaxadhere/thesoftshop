<?php
include_once('../web-config.php');
include_once('../models/size-model.php');

session_start();

$SizeModel = new Size();

if(isset($_POST['CreateSize'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['SizeValue'])){
        array_push($errors, "Size value is required");
    }
    if($errors == null){
        $SizeModel->Add(
            $_POST['SizeValue'],
            $_SESSION['ADMIN']['PK_ID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['UpdateSize'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['SizeID'])){
        array_push($errors, "Size not found");
    }
    if(empty($_POST['SizeValue'])){
        array_push($errors, "Size value is required");
    }
    if($errors == null){
        $SizeModel->Edit(
            $_POST['SizeID'],
            $_POST['SizeValue']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['DeleteSize'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['SizeID'])){
        array_push($errors, "Size not found");
    }
    if($errors == null){
        $SizeModel->Delete(
            $_POST['SizeID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['RecoverSize'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['SizeID'])){
        array_push($errors, "Size not found");
    }
    if($errors == null){
        $SizeModel->Recover(
            $_POST['SizeID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['PermanentlyDeleteSize'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['SizeID'])){
        array_push($errors, "Size not found");
    }
    if($errors == null){
        $SizeModel->PermanentlyDelete(
            $_POST['SizeID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

?>