<?php

class Size
{
    function FilterBySizeName($SizeName)
    {
        $SizeName = mysqli_real_escape_string(connect(), $SizeName);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_size` where `tbl_size`.`SizeValue` = '$SizeName'"
        );
    }

}
