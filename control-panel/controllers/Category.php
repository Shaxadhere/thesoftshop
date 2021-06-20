<?php
include_once('../web-config.php');
include_once('../models/category-model.php');

session_start();


$CategoryModel = new Category();

if (isset($_POST['GenerateSlug'])) {
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $Slug = $CategoryModel->GenerateSlug(
        $_POST['CategoryName']
    );
    $result = array(
        "success" => true,
        "slug" => $Slug
    );
    echo json_encode($result);
}

if (isset($_POST['SaveCategory'])) {
    if(!isset($_SESSION['ADMIN'])){
        exit();
    }
    $errors = array();
    if (empty($_POST['CategoryName'])) {
        array_push($errors, "Category name is required");
        redirectWindow(getHTMLRoot() . "/categories?error=$errors[0]");
    }
    if (empty($_POST['CategorySlug'])) {
        array_push($errors, "Category slug is required");
        redirectWindow(getHTMLRoot() . "/categories?error=$errors[0]");
    }
    if (checkExistance("tbl_category", "CategorySlug", mysqli_real_escape_string(connect(), $_POST['CategorySlug']), connect())) {
        array_push($errors, "Category slug is should be unique");
        redirectWindow(getHTMLRoot() . "/categories?error=$errors[0]");
    }

    if ($_FILES['CategoryImages'] != null) {
        $status = true;
        $Images = $_FILES['CategoryImages'];
        $ImageNamesArray = array();
        // echo json_encode($Images);
        $NumberOfImages = count($_FILES['CategoryImages']['name']);
        for ($i = 0; $i < $NumberOfImages; $i++) {
            $directory = "../uploads/category-images/";
            $target_file = $directory . basename($_FILES['CategoryImages']["name"][$i]);
            $temp = explode(".", $_FILES['CategoryImages']["name"][$i]);
            $SingleImageName = random_strings(20) . '.' . end($temp);
            array_push($ImageNamesArray, $SingleImageName);
            if ($_FILES['CategoryImages']["size"][$i] > 5000000) {
                $status = false;
                array_push($errors, "Your thumbnail is too large");
            }
            if ($status) {
                if (!move_uploaded_file($_FILES['CategoryImages']["tmp_name"][$i], $directory . $SingleImageName)) {
                    array_push($errors, "500 - Internal Server Error.");
                    redirectWindow(getHTMLRoot() . "/categories?error=$errors[0]");
                }
            }
        }
    } else {
        array_push($errors, "Add at least 1 category image");
        redirectWindow(getHTMLRoot() . "/categories?error=$errors[0]");
    }

    if ($errors == null) {
        $CategoryModel->Add(
            $_POST['CategoryName'],
            $_POST['CategorySlug'],
            json_encode($ImageNamesArray),
            "sss",
            $_SESSION['ADMIN']['PK_ID']
        );
        redirectWindow(getHTMLRoot() . "/categories?success=Category added successfully");
    }
}
