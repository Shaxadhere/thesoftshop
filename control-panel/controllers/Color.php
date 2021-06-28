<?php
include_once('../web-config.php');
include_once('../models/color-model.php');

session_start();


$ColorModel = new Color();

if(isset($_POST['CreateColor'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['ColorName'])){
        array_push($errors, "Color name is required");
    }
    if(empty($_POST['ColorCode'])){
        array_push($errors, "Color code is required");
    }
    if($errors == null){
        $ColorModel->Add(
            $_POST['ColorName'],
            $_POST['ColorCode'],
            $_SESSION['ADMIN']['PK_ID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['UpdateColor'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['ColorID'])){
        array_push($errors, "Color not found");
    }
    if(empty($_POST['ColorName'])){
        array_push($errors, "Color name is required");
    }
    if(empty($_POST['ColorCode'])){
        array_push($errors, "Color code is required");
    }
    if($errors == null){
        $ColorModel->Edit(
            $_POST['ColorID'],
            $_POST['ColorName'],
            $_POST['ColorCode']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['DeleteColor'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['ColorID'])){
        array_push($errors, "Color not found");
    }
    if($errors == null){
        $ColorModel->Delete(
            $_POST['ColorID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['RecoverColor'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['ColorID'])){
        array_push($errors, "Color not found");
    }
    if($errors == null){
        $ColorModel->Recover(
            $_POST['ColorID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

if(isset($_POST['PermanentlyDeleteColor'])){
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if(empty($_POST['ColorID'])){
        array_push($errors, "Color not found");
    }
    if($errors == null){
        $ColorModel->PermanentlyDelete(
            $_POST['ColorID']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}

?>
