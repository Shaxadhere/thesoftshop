<?php

class Category{
    function List(){
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_category` where deleted = 0"
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
            while($Existence == false){
                $Slug = slugify($ProductName) . "-" . $ExtraString;
                $ExtraString++;
            }
        }
        echo $Slug;
    }

    function Add($CategoryName, $CategorySlug, $CategoryImagesArray, $CategoryTagsArray, $CreatedBy){
        $CategoryName = mysqli_real_escape_string(connect(), $CategoryName);
        $CategorySlug = mysqli_real_escape_string(connect(), $CategorySlug);
        $CategoryImagesArray = mysqli_real_escape_string(connect(), $CategoryImagesArray);
        $CategoryTagsArray = mysqli_real_escape_string(connect(), $CategoryTagsArray);
        $CreatedBy = mysqli_real_escape_string(connect(), $CreatedBy);
        insertData(
            "tbl_category",
            array(
                "CategoryName",
                "CategorySlug",
                "CategoryImages",
                "CategoryTags",
                "CreatedBy"
            ),
            array(
                $CategoryName,
                $CategorySlug,
                $CategoryImagesArray,
                $CategoryTagsArray,
                $CreatedBy
            ),
            connect()
        );

        function View($CategoryID){
            $CategoryID = base64_decode($CategoryID);
            $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
            return mysqli_query(
                connect(),
                "SELECT * FROM `tbl_category` where `tbl_category`.`PK_ID` = $CategoryID"
            );
        }

        function Edit($CategoryID, $CategoryName, $CategorySlug, $CategoryImagesArray, $CategoryTagsArray){
            $CategoryID = base64_decode($CategoryID);
            $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
            editData(
                "tbl_category",
                array(
                    "CategoryName",
                    $CategoryName,
                    "CategorySlug",
                    $CategorySlug,
                    "CategoryImages",
                    $CategoryImagesArray,
                    "CategoryTags",
                    $CategoryTagsArray
                ),
                "PK_ID",
                $CategoryID,
                connect()
            );
        }

        function Delete($CategoryID){
            $CategoryID = base64_decode($CategoryID);
            $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
            return mysqli_query(
                connect(),
                "UPDATE `tbl_category` SET `Deleted` = b'1' WHERE `tbl_category`.`PK_ID` = $CategoryID"
            );
        }

        function Recover($CategoryID){
            $CategoryID = base64_decode($CategoryID);
            $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
            return mysqli_query(
                connect(),
                "UPDATE `tbl_category` SET `Deleted` = b'0' WHERE `tbl_category`.`PK_ID` = $CategoryID"
            );
        }

        function PermanentlyDelete($CategoryID){
            $CategoryID = base64_decode($CategoryID);
            $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
            return mysqli_query(
                connect(),
                "DELETE FROM `tbl_category` WHERE `tbl_category`.`PK_ID` = $CategoryID"
            );
        }
    }
}

?>