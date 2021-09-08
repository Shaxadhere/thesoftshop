<?php
include_once('web-config.php');
getHeader(
    "Bad Request Error",//page title
    "includes/header.php",//header path
    "Error Page",//pagetype
    "buy scrunchies in pakistan, buy vintage potraits in pakistan, buy stickers in pakistan, buy nostalgic vintage accessories in pakistan",//page keywords
    "Explore your aesthetic, Buy scrunchies, stickers, nostalgic vintage accessories in pakistan",//description
    "Bad Request Error",//topic
    'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']//url
);
include_once('components/mobile-menu.php');
getFooter("includes/footer.php");
?>