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

    function FilterWithAttributesByProductID($ProductID){
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "SELECT tbl_inventory.PK_ID as InventoryID, tbl_product.PK_ID as ProductID, tbl_product.ProductName, tbl_product.Price, tbl_product.PriceVary, tbl_product.ProductSlug, tbl_product.ProductDescription, tbl_product.Reviews, tbl_product.ProductCode, tbl_product.Categories, tbl_product.ProductTags, tbl_product.ProductImages, tbl_color.ColorName, tbl_color.ColorCode, tbl_size.SizeValue, tbl_inventory.Price as PriceVarient from tbl_inventory INNER join tbl_product on tbl_inventory.ProductID = tbl_product.PK_ID inner join tbl_size on tbl_inventory.SizeID = tbl_size.PK_ID inner join tbl_color on tbl_inventory.ColorID = tbl_color.PK_ID WHERE tbl_product.Status = 1 and tbl_product.Deleted = 0 and tbl_inventory.ProductID = $ProductID"
        );
    }

    function FilterWithAttributesByProductSlug($ProductSlug){
        $ProductSlug = mysqli_real_escape_string(connect(), $ProductSlug);
        return mysqli_query(
            connect(),
            "SELECT tbl_inventory.PK_ID as InventoryID, tbl_product.PK_ID as ProductID, tbl_product.ProductName, tbl_product.Price, tbl_product.PriceVary, tbl_product.ProductSlug, tbl_product.ProductDescription, tbl_product.Reviews, tbl_product.ProductCode, tbl_product.Categories, tbl_product.ProductTags, tbl_product.ProductImages, tbl_color.ColorName, tbl_color.ColorCode, tbl_size.SizeValue, tbl_inventory.Price as PriceVarient from tbl_inventory INNER join tbl_product on tbl_inventory.ProductID = tbl_product.PK_ID inner join tbl_size on tbl_inventory.SizeID = tbl_size.PK_ID inner join tbl_color on tbl_inventory.ColorID = tbl_color.PK_ID WHERE tbl_product.Status = 1 and tbl_product.Deleted = 0 and tbl_product.ProductSlug = '$ProductSlug'"
        );
    }

    function Add($ProductName, $Price, $PriceVary, $ProductDescription, $Categories, $ProductSlug, $ProductImagesArray, $ProductTagsArray, $CreatedBy)
    {
        $ProductName = mysqli_real_escape_string(connect(), $ProductName);
        $Price = mysqli_real_escape_string(connect(), $Price);
        $PriceVary = mysqli_real_escape_string(connect(), $PriceVary);
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
                "PriceVary",
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
                $PriceVary,
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
