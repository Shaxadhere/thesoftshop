<?php

class Size
{
    function List()
    {
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_size` where deleted = 0"
        );
    }

    function Add($SizeValue, $CreatedBy)
    {
        $SizeValue = mysqli_real_escape_string(connect(), $SizeValue);
        $CreatedBy = mysqli_real_escape_string(connect(), $CreatedBy);
        insertData(
            "tbl_size",
            array(
                "SizeValue",
                "CreatedBy"
            ),
            array(
                $SizeValue,
                $CreatedBy
            ),
            connect()
        );
    }
    
    function View($SizeID)
    {
        $SizeID = base64_decode($SizeID);
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_size` where `tbl_size`.`PK_ID` = $SizeID"
        );
    }

    function Edit($SizeID, $SizeValue)
    {
        $SizeID = base64_decode($SizeID);
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        editData(
            "tbl_size",
            array(
                "SizeValue",
                $SizeValue
            ),
            "PK_ID",
            $SizeID,
            connect()
        );
    }

    function Delete($SizeID)
    {
        $SizeID = base64_decode($SizeID);
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_size` SET `Deleted` = b'1' WHERE `tbl_size`.`PK_ID` = $SizeID"
        );
    }

    function Recover($SizeID)
    {
        $SizeID = base64_decode($SizeID);
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_size` SET `Deleted` = b'0' WHERE `tbl_size`.`PK_ID` = $SizeID"
        );
    }

    function PermanentlyDelete($SizeID)
    {
        $SizeID = base64_decode($SizeID);
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        return mysqli_query(
            connect(),
            "DELETE FROM `tbl_size` WHERE `tbl_size`.`PK_ID` = $SizeID"
        );
    }
}
