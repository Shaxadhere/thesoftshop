<?php

class Order
{
    function List()
    {
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_orders` where Deleted = 0 order by PK_ID desc"
        );
    }
    
    function View($OrderID)
    {
        $OrderID = base64_decode($OrderID);
        $OrderID = mysqli_real_escape_string(connect(), $OrderID);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_orders` where `tbl_orders`.`PK_ID` = $OrderID"
        );
    }

    function Edit($CategoryID, $CategoryName, $CategorySlug, $CategoryImagesArray, $CategoryTagsArray)
    {
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

    function Delete($CategoryID)
    {
        $CategoryID = base64_decode($CategoryID);
        $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_category` SET `Deleted` = b'1' WHERE `tbl_category`.`PK_ID` = $CategoryID"
        );
    }

    function Recover($CategoryID)
    {
        $CategoryID = base64_decode($CategoryID);
        $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_category` SET `Deleted` = b'0' WHERE `tbl_category`.`PK_ID` = $CategoryID"
        );
    }

    function PermanentlyDelete($CategoryID)
    {
        $CategoryID = base64_decode($CategoryID);
        $CategoryID = mysqli_real_escape_string(connect(), $CategoryID);
        return mysqli_query(
            connect(),
            "DELETE FROM `tbl_category` WHERE `tbl_category`.`PK_ID` = $CategoryID"
        );
    }
}
