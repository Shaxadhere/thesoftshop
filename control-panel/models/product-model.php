<?php

class Product{
    function List(){
        return mysqli_query(
            connect(),
            "select * from tbl_product where deleted = 0 order by PK_ID desc"
        );
    }

    function LastProduct(){
        return mysqli_query(
            connect(),
            "select * from tbl_product where deleted = 0 order by PK_ID desc LIMIT 1"
        );
    }

    function GenerateSlug($ProductName){
        $ProductName = mysqli_real_escape_string(connect(), $ProductName);
        $Slug = slugify($ProductName);
        $Existence = checkExistance(
            "tbl_product",
            "ProductSlug",
            $Slug,
            connect()
        );
        if($Existence){
            $ExtraString = 1;
            do {
                $Slug = slugify($ProductName) . "-" . $ExtraString;
                $Existence = checkExistance(
                    "tbl_product",
                    "ProductSlug",
                    $Slug,
                    connect()
                );
                $ExtraString++;
            } while ($Existence);
        }
        return $Slug;
    }

    function Add($ProductName, $Price, $ProductDescription, $Categories, $ProductSlug, $ProductImagesArray, $ProductTagsArray, $CreatedBy)
    {
        $ProductName = mysqli_real_escape_string(connect(), $ProductName);
        $Price = mysqli_real_escape_string(connect(), $Price);
        $ProductDescription = mysqli_real_escape_string(connect(), $ProductDescription);
        $Categories = mysqli_real_escape_string(connect(), $Categories);
        $ProductSlug = mysqli_real_escape_string(connect(), $ProductSlug);
        $ProductImagesArray = mysqli_real_escape_string(connect(), $ProductImagesArray);
        $ProductTagsArray = mysqli_real_escape_string(connect(), $ProductTagsArray);
        $CreatedBy = mysqli_real_escape_string(connect(), $CreatedBy);
        insertData(
            "tbl_product",
            array(
                "ProductName",
                "Price",
                "ProductDescription",
                "Categories",
                "ProductSlug",
                "ProductImages",
                "ProductTags",
                "CreatedBy"
            ),
            array(
                $ProductName,
                $Price,
                $ProductDescription,
                $Categories,
                $ProductSlug,
                $ProductImagesArray,
                $ProductTagsArray,
                $CreatedBy
            ),
            connect()
        );
    }
    
    function View($ProductID)
    {
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_product` where `tbl_product`.`PK_ID` = $ProductID"
        );
    }

    function Edit($ProductID, $ProductName, $Price, $ProductDescription, $Categories, $ProductSlug, $ProductImagesArray, $ProductTagsArray)
    {
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        editData(
            "tbl_product",
            array(
                "ProductName",
                $ProductName,
                "Price",
                $Price,
                "ProductDescription",
                $ProductDescription,
                "Categories",
                $Categories,
                "ProductSlug",
                $ProductSlug,
                "ProductImages",
                $ProductImagesArray,
                "ProductTags",
                $ProductTagsArray
            ),
            "PK_ID",
            $ProductID,
            connect()
        );
    }

    function Delete($ProductID)
    {
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_product` SET `Deleted` = b'1' WHERE `tbl_product`.`PK_ID` = $ProductID"
        );
    }

    function Recover($ProductID)
    {
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_product` SET `Deleted` = b'0' WHERE `tbl_product`.`PK_ID` = $ProductID"
        );
    }

    function PermanentlyDelete($ProductID)
    {
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "DELETE FROM `tbl_product` WHERE `tbl_product`.`PK_ID` = $ProductID"
        );
    }
}
