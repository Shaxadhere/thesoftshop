<?php

class Product{
    function ListFeatured(){
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_product` WHERE tbl_product.Categories LIKE '%featured%' order by PK_ID desc limit 8"
        );
    }
}
?>