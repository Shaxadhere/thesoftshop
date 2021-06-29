<?php

class Product{
    function ListFeatured(){
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_product` WHERE tbl_product.Categories LIKE '%featured%' order by PK_ID desc limit 8"
        );
    }

    function FilterWithAttributesByProductID($ProductID)
    {
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "SELECT tbl_inventory.PK_ID as InventoryID, tbl_product.PK_ID as ProductID, tbl_product.ProductName, tbl_product.Price, tbl_product.ProductSlug, tbl_product.ProductDescription, tbl_product.Reviews, tbl_product.ProductCode, tbl_product.Categories, tbl_product.ProductTags, tbl_product.ProductImages, tbl_color.ColorName, tbl_color.ColorCode, tbl_size.SizeValue from tbl_inventory INNER join tbl_product on tbl_inventory.ProductID = tbl_product.PK_ID inner join tbl_size on tbl_inventory.SizeID = tbl_size.PK_ID inner join tbl_color on tbl_inventory.ColorID = tbl_color.PK_ID WHERE tbl_product.Status = 1 and tbl_product.Deleted = 0 and tbl_inventory.ProductID = $ProductID"
        );
    }
}
?>