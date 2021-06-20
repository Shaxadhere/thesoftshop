<?php
include_once('../web-config.php');
include_once('../models/inventory-model.php');

session_start();

$InventoryModel = new Inventory();

if(isset($_POST['FetchInventory'])){
    if (!isset($_SESSION['ADMIN'])) {
        exit();
    }
    $errors = array();
    if(empty($_POST['InventoryID'])){
        array_push($errors, "502 - Bad request error");
    }
    if($errors== null){
        $Inventory = $InventoryModel->View(
            $_POST['InventoryID']
        );
        $Inventory = mysqli_fetch_array($Inventory);
        $result = array(
            "success" => true,
            "inventory" => $Inventory
        );
        echo json_encode($result);
    }
    else{
        $result = array(
            "success" => false,
            "errors" => $errors
        );
        echo $result;
    }
}

if (isset($_POST['UpdateInventory'])) {
    if (!isset($_SESSION['ADMIN'])) {
        exit();
    }
    $errors = array();
    if(empty($_POST['Quantity'])){
        array_push($errors, "Quantity is required");
    }
    if(empty($_POST['InventoryID'])){
        array_push($errors, "502 - Bad request error");
    }
    if($errors== null){
        $InventoryModel->Edit(
            $_POST['InventoryID'],
            $_POST['Quantity']
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}