<?php
include_once('../web-config.php');
include_once('../models/category-model.php');

$CategoryModel = new Category();

if(isset($_POST['GenerateSlug'])){
    echo $CategoryModel->GenerateSlug(
        $_POST['ProductName']
    );
}