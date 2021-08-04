<?php

class Category{
    function List(){
        return mysqli_query(
            connect(),
            "select * from tbl_category where tbl_category.Status = 1 and tbl_category.Deleted = 0 order by PK_ID desc"
        );
    }

    function FilterByCategorySlug($CategorySlug){
        $CategorySlug = mysqli_real_escape_string(connect(), $CategorySlug);
        return mysqli_query(
            connect(),
            "select * from tbl_category where tbl_category.CategorySlug = '$CategorySlug' and tbl_category.Status = 1 and tbl_category.Deleted = 0"
        );
    }

    function ListRandom($Current, $limit){
        $limit = mysqli_real_escape_string(connect(), $limit);
        return mysqli_query(
            connect(),
            "SELECT * FROM tbl_category where Deleted = 0 and CategoryName <> '$Current' and CategoryName <> 'New Arrivals' and CategoryName <> 'Stationary' and CategoryName <> 'Accessories' and CategoryName <> 'Stickers' and CategoryName <> 'Featured' ORDER BY RAND() LIMIT $limit"
        );
    }
}

?>