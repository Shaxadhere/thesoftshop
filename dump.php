<?php

$URL = $_SERVER['QUERY_STRING'];
if (empty($URL)) {
    $NextURL = "?page=2";
}
else {
    $NextURL = $URL . "&page=2";
}

echo "URL: " . $URL . "<br>";
echo "URL: " . $NextURL;
