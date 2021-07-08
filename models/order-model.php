<?php

class Order {
    function ListByCustomerID($CustomerID){
        $CustomerID = mysqli_real_escape_string(connect(), $CustomerID);
        return mysqli_query(
            connect(),
            "select * from tbl_order where CustomerID = $CustomerID and Status = 1 and Deleted = 0"
        );
    }

    function Add($CustomerID, $CustomerName, $CustomerEmail, $CustomerContact, $CustomerBillingAddress, $CustomerShippingAddress, $CustomerCity, $State, $ProductsWithQuantity, $OrderStatus){
        $CustomerID = mysqli_real_escape_string(connect(), $CustomerID);
        $CustomerName = mysqli_real_escape_string(connect(), $CustomerName);
        $CustomerEmail = mysqli_real_escape_string(connect(), $CustomerEmail);
        $CustomerContact = mysqli_real_escape_string(connect(), $CustomerContact);
        $CustomerBillingAddress = mysqli_real_escape_string(connect(), $CustomerBillingAddress);
        $CustomerShippingAddress = mysqli_real_escape_string(connect(), $CustomerShippingAddress);
        $CustomerCity = mysqli_real_escape_string(connect(), $CustomerCity);
        $State = mysqli_real_escape_string(connect(), $State);
        $ProductsWithQuantity = mysqli_real_escape_string(connect(), $ProductsWithQuantity);
        $OrderStatus = mysqli_real_escape_string(connect(), $OrderStatus);
        insertData(
            "tbl_orders",
            array(
                "CustomerID",
                "CustomerName",
                "CustomerEmail",
                "CustomerContact",
                "CustomerBillingAddress",
                "CustomerShippingAddress",
                "CustomerCity",
                "State",
                "ProductsWithQuantity", 
                "OrderStatus"
            ),
            array(
                $CustomerID,
                $CustomerName,
                $CustomerEmail,
                $CustomerContact,
                $CustomerBillingAddress,
                $CustomerShippingAddress,
                $CustomerCity,
                $State,
                $ProductsWithQuantity, 
                $OrderStatus
            ),
            connect()
        );
    }
}
