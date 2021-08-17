<?php
include_once('../web-config.php');
include_once('../models/withdrawl-model.php');

session_start();

$WithdrawlModel = new Withdrawl();

if (isset($_POST['SaveWithdrawl'])) {
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if (empty($_POST['UserID'])) {
        array_push($errors, "Please select a person");
    }
    if (empty($_POST['Amount'])) {
        array_push($errors, "Amount is required");
    }
    if ($errors == null) {
        $WithdrawlModel->Add(
            $_POST['Amount'],
            $_POST['UserID']
        );
        echo true;
    }
    else {
        echo json_encode($errors);
    }
}
