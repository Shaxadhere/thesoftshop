<?php
include_once('web-config.php');


$tags = "watches, stickers, icecream";

$tagexplode = explode(",", $tags);

echo json_encode($tagexplode);