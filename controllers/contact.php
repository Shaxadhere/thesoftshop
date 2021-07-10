<?php
include_once('../web-config.php');
include_once('../models/message-model.php');

$MessageModel = new Message();

if (isset($_POST['contact'])) {
    $errors = array();
    if(empty($_POST['ct-name'])){
        array_push($errors, "Please enter your name first");
    }
    if(empty($_POST['ct-email'])){
        array_push($errors, "Please enter your email first");
    }
    if(empty($_POST['ct-message'])){
        array_push($errors, "Please enter a message");
    }

    if($errors == null){
        $MessageModel->Add(
            $FullName,
            $Email,
            $Phone,
            $Message
        );
        echo true;
    }
    else{
        echo json_encode($errors);
    }
}
