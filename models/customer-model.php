<?php

class Customer
{
    function FilterCustomerByID($UserID)
    {
        $UserID = base64_decode($UserID);
        $UserID = mysqli_real_escape_string(connect(), $UserID);
        return mysqli_fetch_array(
            mysqli_query(
                connect(),
                "SELECT * FROM `tbl_customer` where `tbl_customer`.`PK_ID` = $UserID"
            )
        );
    }

    function UpdateOrders($CustomerID, $OrderHistory){
        $CustomerID = mysqli_real_escape_string(connect(), $CustomerID);
        $OrderHistory = mysqli_real_escape_string(connect(), $OrderHistory);
        return mysqli_query(
            connect(),
            "UPDATE tbl_customer set OrderHistory = '$OrderHistory' where PK_ID = $CustomerID"
        );
    }
}
