<?php
include_once('web-config.php');
getHeader(
    "Explore your aesthetic, Buy scrunchies, stickers, nostalgic vintage accessories in pakistan",//page title
    "includes/header.php",//header path
    "Homepage",//pagetype
    "buy scrunchies in pakistan, buy vintage potraits in pakistan, buy stickers in pakistan, buy nostalgic vintage accessories in pakistan",//page keywords
    "Explore your aesthetic, Buy scrunchies, stickers, nostalgic vintage accessories in pakistan",//description
    "Home",//topic
    'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']//url
);
include_once('components/slider.php');
include_once('components/category-banner.php');
include_once('components/five-category-banner.php');

include_once('components/single-banner.php');
include_once('components/featured.php');
include_once('components/instagram.php');
include_once('components/quick-view.php');
// include_once('components/quick-shop.php');
include_once('components/mini-cart-box.php');
include_once('components/search-box.php');
include_once('components/login-box.php');
include_once('components/mobile-toolbar.php');
include_once('components/mobile-menu.php');
include_once('components/back-to-top-button.php');
include_once('components/discount-popup.php');
getFooter("includes/footer.php");
?>
<script>
    $(document).ready(function(){
        $('#spc').attr('style', 'margin-bottom: 0px !important;')
    })
</script>