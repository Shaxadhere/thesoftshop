<?php

class PromoCode
{
    function View($PromoCode)
    {
        $PromoCode = mysqli_real_escape_string(connect(), $PromoCode);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_promocodes` where `tbl_promocodes`.`Code` = '$PromoCode'"
        );
    }
}
