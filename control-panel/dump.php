<?php
include_once('web-config.php');
$product = "Silver Pendant Necklace";

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
    echo $Slug;
}

GenerateSlug("Silk Scrunchie");

// $x = 1;

// do {
//   echo "The number is: $x <br>";
//   $x++;
// } while ($x <= 5);