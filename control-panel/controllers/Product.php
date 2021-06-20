<?php
include_once('../web-config.php');
include_once('../models/product-model.php');

session_start();


$ProductModel = new Product();

if (isset($_POST['GenerateSlug'])) {
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $Slug = $ProductModel->GenerateSlug(
        $_POST['ProductName']
    );
    $result = array(
        "success" => true,
        "slug" => $Slug
    );
    echo json_encode($result);
}

if (isset($_POST['SaveProduct'])) {
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if (empty($_POST['ProductName'])) {
        array_push($errors, "Product name is required");
        redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
    }
    if (empty($_POST['ProductSlug'])) {
        array_push($errors, "Product slug is required");
        redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
    }
    if (checkExistance("tbl_Product", "ProductSlug", mysqli_real_escape_string(connect(), $_POST['ProductSlug']), connect())) {
        array_push($errors, "Product slug is should be unique");
        redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
    }

    $SizesArray = explode(",", $_POST['Sizes']);
    $Categories = explode(",", $_POST['Categories']);
    $TagsArray = explode(",", $_POST['ProductTags']);

    if ($_FILES['ProductImages'] != null) {
        $status = true;
        $Images = $_FILES['ProductImages'];
        $ImageNamesArray = array();
        // echo json_encode($Images);
        $NumberOfImages = count($_FILES['ProductImages']['name']);
        for ($i = 0; $i < $NumberOfImages; $i++) {
            $directory = "../uploads/product-images/";
            $target_file = $directory . basename($_FILES['ProductImages']["name"][$i]);
            $temp = explode(".", $_FILES['ProductImages']["name"][$i]);
            $SingleImageName = random_strings(20) . '.' . end($temp);
            array_push($ImageNamesArray, $SingleImageName);
            if ($_FILES['ProductImages']["size"][$i] > 5000000) {
                $status = false;
                array_push($errors, "Your thumbnail is too large");
            }
            if ($status) {
                if (!move_uploaded_file($_FILES['ProductImages']["tmp_name"][$i], $directory . $SingleImageName)) {
                    array_push($errors, "500 - Internal Server Error.");
                    redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
                }
            }
        }
    } else {
        array_push($errors, "Add at least 1 Product image");
        redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
    }

    if ($errors == null) {
        $ProductModel->Add(
            $_POST['ProductName'],
            $_POST['ProductDescription'],
            json_encode($SizesArray),
            json_encode($Categories),
            $_POST['ProductSlug'],
            json_encode($ImageNamesArray),
            json_encode($TagsArray),
            $_SESSION['ADMIN']['PK_ID']
        );
        redirectWindow(getHTMLRoot() . "/products?success=Product added successfully");
    }
}
