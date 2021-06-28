<?php
include_once('../web-config.php');
include_once('../models/product-model.php');

session_start();

$ProductModel = new Product();

if (isset($_POST['GenerateSlug'])) {
    if (!isset($_SESSION['ADMIN'])) {
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

//Confirm request from save product
if (isset($_POST['SaveProduct'])) {
    //check if user is admin
    if (!isset($_SESSION['ADMIN'])) {
        exit();
    }
    //initialise erros arary
    $errors = array();
    //empty input validation
    if (empty($_POST['ProductName'])) {
        array_push($errors, "Product name is required");
        redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
    }
    if (empty($_POST['ProductSlug'])) {
        array_push($errors, "Product slug is required");
        redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
    }
    //check if slug already exists
    if (checkExistance("tbl_Product", "ProductSlug", mysqli_real_escape_string(connect(), $_POST['ProductSlug']), connect())) {
        array_push($errors, "Product slug is should be unique");
        redirectWindow(getHTMLRoot() . "/products?error=$errors[0]");
    }

    //Explode comma string input
    $TagsArray = explode(",", $_POST['ProductTags']);

    //Check if at least one image is there and add images
    if ($_FILES['ProductImages'] != null) {
        $status = true;
        $Images = $_FILES['ProductImages'];
        $ImageNamesArray = array();
        // echo json_encode($Images);
        $NumberOfImages = count($_FILES['ProductImages']['name']);
        for ($i = 0; $i < $NumberOfImages; $i++) {
            $directory = "../../uploads/product-images/";
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

    //Check if there are no errors, finally add the product
    if ($errors == null) {
        $ProductModel->Add(
            $_POST['ProductName'],
            $_POST['Price'],
            $_POST['ProductDescription'],
            json_encode($_POST['Categories']),
            $_POST['ProductSlug'],
            json_encode($ImageNamesArray),
            json_encode($TagsArray),
            $_SESSION['ADMIN']['PK_ID']
        );
        
        ///Add inventory
        $LastProduct = $ProductModel->LastProduct();
        $LastProduct = mysqli_fetch_array($LastProduct);
        include_once('../models/inventory-model.php');
        $InventoryModel = new Inventory();
        for ($i=0; $i < count($_POST['Quantity']) ; $i++) {
            $InventoryModel->Add(
                $LastProduct['PK_ID'],
                $_POST['Sizes'][$i],
                $_POST['Colors'][$i],
                $_POST['Quantity'][$i],
            );
        }
        redirectWindow(getHTMLRoot() . "/products?success=Product added successfully");
    }
}
