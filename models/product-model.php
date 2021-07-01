<?php

class Product{

    function List($index, $limit, $ProductName = "", $CategoryName = "", $Sort = "PK_ID"){
        $index = mysqli_real_escape_string(connect(), $index);
        $limit = mysqli_real_escape_string(connect(), $limit);
        $Sort = mysqli_real_escape_string(connect(), $Sort);
        $ProductName = mysqli_real_escape_string(connect(), $ProductName);
        $CategoryName = mysqli_real_escape_string(connect(), $CategoryName);
        switch ($Sort) {
            case 'new-to-old':
                $OrderBy = "PK_ID";
                $Order = "desc";
                break;

            case 'old-to-new':
                $OrderBy = "PK_ID";
                $Order = "asc";
                break;

            case 'best-selling':
                $OrderBy = "PK_ID";
                $Order = "desc";
                break;

            case 'a-z':
                $OrderBy = "ProductName";
                $Order = "asc";
                break;

            case 'z-a':
                $OrderBy = "ProductName";
                $Order = "desc";
                break;

            case 'low-to-high':
                $OrderBy = "Price";
                $Order = "asc";
                break;

            case 'high-to-low':
                $OrderBy = "Price";
                $Order = "desc";
                break;

            default:
                $OrderBy = "PK_ID";
                $Order = "desc";
                break;
        }
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_product` WHERE (tbl_product.ProductName LIKE '%$ProductName%' or tbl_product.ProductTags Like '%$ProductName%') and tbl_product.Categories Like '%$CategoryName%' and Status = 1 and Deleted = 0 order by $OrderBy $Order limit $index, $limit"
        );
    }

    function getTotalNumberOfProducts(){
        return mysqli_num_rows(
            mysqli_query(
                connect(),
                "select * from tbl_product where Status = 1 and Deleted = 0"
            )
            );
    }

    function ListRandom($limit){
        $limit = mysqli_real_escape_string(connect(), $limit);
        return mysqli_query(
            connect(),
            "SELECT * FROM tbl_product ORDER BY RAND() LIMIT 4;"
        );
    }

    function ListByCategoryName($CategoryName){
        $CategoryName = mysqli_real_escape_string(connect(), $CategoryName);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_product` WHERE tbl_product.Categories LIKE '%$CategoryName%' and Status = 1 and Deleted = 0 order by PK_ID desc limit 8"
        );
    }

    function FilterByProductID($ProductID)
    {
        $ProductID = base64_decode($ProductID);
        $ProductID = mysqli_real_escape_string(connect(), $ProductID);
        return mysqli_query(
            connect(),
            "SELECT tbl_product.PK_ID as ProductID, tbl_product.ProductName, tbl_product.Price, tbl_product.ProductSlug, tbl_product.ProductDescription, tbl_product.Reviews, tbl_product.ProductCode, tbl_product.Categories, tbl_product.ProductTags, tbl_product.ProductImages from tbl_product WHERE tbl_product.Status = 1 and tbl_product.Deleted = 0 and tbl_product.PK_ID = $ProductID"
        );
    }

    function FilterByProductSlug($ProductSlug)
    {
        $ProductSlug = mysqli_real_escape_string(connect(), $ProductSlug);
        return mysqli_query(
            connect(),
            "SELECT tbl_product.PK_ID as ProductID, tbl_product.ProductName, tbl_product.Price, tbl_product.ProductSlug, tbl_product.ProductDescription, tbl_product.Reviews, tbl_product.ProductCode, tbl_product.Categories, tbl_product.ProductTags, tbl_product.ProductImages from tbl_product WHERE tbl_product.Status = 1 and tbl_product.Deleted = 0 and tbl_product.ProductSlug = '$ProductSlug'"
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

    function FilterWithAttributesByProductSlug($ProductSlug)
    {
        $ProductSlug = mysqli_real_escape_string(connect(), $ProductSlug);
        return mysqli_query(
            connect(),
            "SELECT tbl_inventory.PK_ID as InventoryID, tbl_product.PK_ID as ProductID, tbl_product.ProductName, tbl_product.Price, tbl_product.ProductSlug, tbl_product.ProductDescription, tbl_product.Reviews, tbl_product.ProductCode, tbl_product.Categories, tbl_product.ProductTags, tbl_product.ProductImages, tbl_color.ColorName, tbl_color.ColorCode, tbl_size.SizeValue from tbl_inventory INNER join tbl_product on tbl_inventory.ProductID = tbl_product.PK_ID inner join tbl_size on tbl_inventory.SizeID = tbl_size.PK_ID inner join tbl_color on tbl_inventory.ColorID = tbl_color.PK_ID WHERE tbl_product.Status = 1 and tbl_product.Deleted = 0 and tbl_product.ProductSlug = '$ProductSlug'"
        );
    }
}
