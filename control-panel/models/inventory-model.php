<?php

class Inventory{
    function List(){
        return mysqli_query(
            connect(),
            "SELECT tbl_product.PK_ID as ProductID, tbl_inventory.PK_ID as InventoryID, tbl_product.ProductName, tbl_product.ProductDescription, tbl_inventory.Quantity, tbl_inventory.CreatedAt, tbl_inventory.CreatedBy FROM `tbl_inventory` inner join tbl_product on tbl_inventory.FK_Product = tbl_product.PK_ID where tbl_product.Deleted = 0"
        );
    }

    function View($InventoryID){
        $InventoryID = base64_decode($InventoryID);
        $InventoryID = mysqli_real_escape_string(connect(), $InventoryID);
        return mysqli_query(
            connect(),
            "SELECT tbl_product.PK_ID as ProductID, tbl_inventory.PK_ID as InventoryID, tbl_product.ProductName, tbl_product.ProductDescription, tbl_product.ProductImages, tbl_inventory.Quantity, tbl_inventory.CreatedAt, tbl_inventory.CreatedBy FROM `tbl_inventory` inner join tbl_product on tbl_inventory.FK_Product = tbl_product.PK_ID where tbl_product.Deleted = 0 and tbl_inventory.PK_ID = $InventoryID"
        );
    }

    function Add($ProductID){
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        insertData(
            "tbl_inventory",
            array(
                "FK_Product"
            ),
            array(
                $ProductID
            ),
            connect()
        );
    }

    function Edit($InventoryID, $Quantity){
        $InventoryID = base64_decode($InventoryID);
        $InventoryID = mysqli_real_escape_string(connect(), $InventoryID);
        $Quantity = mysqli_real_escape_string(connect(), $Quantity);
        editData(
            "tbl_inventory",
            array(
                "Quantity",
                $Quantity
            ),
            "PK_ID",
            $InventoryID,
            connect()
        );
    }
}

?>