<?php

class Color
{
    function List()
    {
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_color` where deleted = 0"
        );
    }

    function Add($ColorName, $ColorCode, $CreatedBy)
    {
        $ColorName = mysqli_real_escape_string(connect(), $ColorName);
        $ColorCode = mysqli_real_escape_string(connect(), $ColorCode);
        $CreatedBy = mysqli_real_escape_string(connect(), $CreatedBy);
        insertData(
            "tbl_color",
            array(
                "ColorName",
                "ColorCode",
                "CreatedBy"
            ),
            array(
                $ColorName,
                $ColorCode,
                $CreatedBy
            ),
            connect()
        );
    }
    
    function View($ColorID)
    {
        $ColorID = base64_decode($ColorID);
        $ColorID = mysqli_real_escape_string(connect(), $ColorID);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_color` where `tbl_color`.`PK_ID` = $ColorID"
        );
    }

    function Edit($ColorID, $ColorName, $ColorCode)
    {
        $ColorID = base64_decode($ColorID);
        $ColorID = mysqli_real_escape_string(connect(), $ColorID);
        editData(
            "tbl_color",
            array(
                "ColorName",
                $ColorName,
                "ColorCode",
                $ColorCode
            ),
            "PK_ID",
            $ColorID,
            connect()
        );
    }

    function Delete($ColorID)
    {
        $ColorID = base64_decode($ColorID);
        $ColorID = mysqli_real_escape_string(connect(), $ColorID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_color` SET `Deleted` = b'1' WHERE `tbl_color`.`PK_ID` = $ColorID"
        );
    }

    function Recover($ColorID)
    {
        $ColorID = base64_decode($ColorID);
        $ColorID = mysqli_real_escape_string(connect(), $ColorID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_color` SET `Deleted` = b'0' WHERE `tbl_color`.`PK_ID` = $ColorID"
        );
    }

    function PermanentlyDelete($ColorID)
    {
        $ColorID = base64_decode($ColorID);
        $ColorID = mysqli_real_escape_string(connect(), $ColorID);
        return mysqli_query(
            connect(),
            "DELETE FROM `tbl_color` WHERE `tbl_color`.`PK_ID` = $ColorID"
        );
    }
}
