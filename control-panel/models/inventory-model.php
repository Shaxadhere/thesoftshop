<?php

class Inventory{
    function List(){
        return mysqli_query(
            connect(),
            "SELECT tbl_product.PK_ID as ProductID, tbl_inventory.PK_ID as InventoryID, tbl_product.ProductName, tbl_product.ProductDescription, tbl_inventory.Quantity, tbl_inventory.CreatedAt, tbl_inventory.CreatedBy, tbl_color.ColorName, tbl_size.SizeValue FROM `tbl_inventory` inner join tbl_product on tbl_inventory.ProductID = tbl_product.PK_ID INNER join tbl_color on tbl_inventory.ColorID = tbl_color.PK_ID inner join tbl_size on tbl_inventory.SizeID = tbl_size.PK_ID where tbl_product.Deleted = 0"
        );
    }

    function View($InventoryID){
        $InventoryID = base64_decode($InventoryID);
        $InventoryID = mysqli_real_escape_string(connect(), $InventoryID);
        return mysqli_query(
            connect(),
            "SELECT tbl_product.PK_ID as ProductID, tbl_inventory.PK_ID as InventoryID, tbl_product.ProductName, tbl_product.ProductDescription, tbl_product.ProductImages, tbl_inventory.Quantity, tbl_inventory.CreatedAt, tbl_inventory.CreatedBy FROM `tbl_inventory` inner join tbl_product on tbl_inventory.ProductID = tbl_product.PK_ID where tbl_product.Deleted = 0 and tbl_inventory.PK_ID = $InventoryID"
        );
    }

    function FilterByProductID($ProductID){
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "SELECT tbl_product.PK_ID as ProductID, tbl_inventory.PK_ID as InventoryID, tbl_product.ProductName, tbl_product.ProductDescription, tbl_product.ProductImages, tbl_inventory.Quantity, tbl_inventory.CreatedAt, tbl_inventory.CreatedBy, tbl_color.PK_ID as ColorID, tbl_color.ColorName, tbl_size.PK_ID as SizeID, tbl_size.SizeValue FROM `tbl_inventory` inner join tbl_product on tbl_inventory.ProductID = tbl_product.PK_ID inner join tbl_color on tbl_inventory.ColorID = tbl_color.PK_ID inner join tbl_size on tbl_inventory.SizeID = tbl_size.PK_ID where tbl_product.Deleted = 0 and tbl_inventory.ProductID = $ProductID"
        );
    }

    function Add($ProductID, $SizeID, $ColorID, $Quantity){
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        $ColorID = mysqli_real_escape_string(connect(), $ColorID);
        $Quantity = mysqli_real_escape_string(connect(), $Quantity);
        insertData(
            "tbl_inventory",
            array(
                "ProductID",
                "SizeID",
                "ColorID",
                "Quantity"
            ),
            array(
                $ProductID,
                $SizeID,
                $ColorID,
                $Quantity
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

    function UpdateInventory($InventoryID, $ColorID, $SizeID, $Quantity){
        $InventoryID = base64_decode($InventoryID);
        $InventoryID = mysqli_real_escape_string(connect(), $InventoryID);
        $ColorID = mysqli_real_escape_string(connect(), $ColorID);
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        $Quantity = mysqli_real_escape_string(connect(), $Quantity);
        editData(
            "tbl_inventory",
            array(
                "ColorID",
                $ColorID,
                "SizeID",
                $SizeID,
                "Quantity",
                $Quantity
            ),
            "PK_ID",
            $InventoryID,
            connect()
        );
    }
}
