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
}

?>