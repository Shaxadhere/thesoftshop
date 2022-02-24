<?php

class PromoCode
{
    function List()
    {
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_promocodes` where Deleted = 0"
        );
    }

    function Add($Title, $Description, $Code, $ValidityStart, $ValidityEnd, $MaxDiscount, $DiscountPercentage, $DiscountAmount, $ReferredTo)
    {
        $Title = mysqli_real_escape_string(connect(), $Title);
        $Description = mysqli_real_escape_string(connect(), $Description);
        $Code = mysqli_real_escape_string(connect(), $Code);
        $ValidityStart = mysqli_real_escape_string(connect(), $ValidityStart);
        $ValidityEnd = mysqli_real_escape_string(connect(), $ValidityEnd);
        $MaxDiscount = mysqli_real_escape_string(connect(), $MaxDiscount);
        $DiscountPercentage = mysqli_real_escape_string(connect(), $DiscountPercentage);
        $DiscountAmount = mysqli_real_escape_string(connect(), $DiscountAmount);
        $ReferredTo = mysqli_real_escape_string(connect(), $ReferredTo);
        insertData(
            "tbl_promocodes",
            array(
                "Title", "Description", "Code", "ValidityStart", "ValidityEnd", "MaxDiscount", "DiscountPercentage", "DiscountAmount", "ReferredTo"
            ),
            array(
                $Title, $Description, $Code, $ValidityStart, $ValidityEnd, $MaxDiscount, $DiscountPercentage, $DiscountAmount, $ReferredTo
            ),
            connect()
        );
    }

    function View($PromoCodeID)
    {
        $PromoCodeID = base64_decode($PromoCodeID);
        $PromoCodeID = mysqli_real_escape_string(connect(), $PromoCodeID);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_promocodes` where `tbl_promocodes`.`PK_ID` = $PromoCodeID"
        );
    }

    function Edit($PromoCodeID,  $Title, $Description, $Code, $ValidityStart, $ValidityEnd, $MaxDiscount, $DiscountPercentage, $DiscountAmount, $ReferredTo)
    {
        $PromoCodeID = base64_decode($PromoCodeID);
        $PromoCodeID = mysqli_real_escape_string(connect(), $PromoCodeID);
        editData(
            "tbl_promocodes",
            array(
                "Title",
                $Title,
                "Description",
                $Description,
                "Code",
                $Code,
                "ValidityStart",
                $ValidityStart,
                "ValidityEnd",
                $ValidityEnd,
                "MaxDiscount",
                $MaxDiscount,
                "DiscountPercentage",
                $DiscountPercentage,
                "DiscountAmount",
                $DiscountAmount,
                "ReferredTo",
                $ReferredTo
            ),
            "PK_ID",
            $PromoCodeID,
            connect()
        );
    }

    function Delete($PromoCodeID)
    {
        $PromoCodeID = base64_decode($PromoCodeID);
        $PromoCodeID = mysqli_real_escape_string(connect(), $PromoCodeID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_promocodes` SET `Deleted ` = b'1' WHERE `tbl_promocodes`.`PK_ID` = $PromoCodeID"
        );
    }

    function Recover($PromoCodeID)
    {
        $PromoCodeID = base64_decode($PromoCodeID);
        $PromoCodeID = mysqli_real_escape_string(connect(), $PromoCodeID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_promocodes` SET `Deleted ` = b'0' WHERE `tbl_promocodes`.`PK_ID` = $PromoCodeID"
        );
    }

    function PermanentlyDelete($PromoCodeID)
    {
        $PromoCodeID = base64_decode($PromoCodeID);
        $PromoCodeID = mysqli_real_escape_string(connect(), $PromoCodeID);
        return mysqli_query(
            connect(),
            "DELETE FROM `tbl_promocodes` WHERE `tbl_promocodes`.`PK_ID` = $PromoCodeID"
        );
    }
}
