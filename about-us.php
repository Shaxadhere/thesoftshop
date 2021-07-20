<?php
include_once('web-config.php');
getHeader("About us @".getAppName().".pk Instagram Shop, cute, fancy, good quality and cheap products in pakistan", "includes/header.php");
?>
<!--hero banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= getHTMLRoot() ?>/assets/images/slide/banner21.jpg"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">About us</h1>
            <p class="mg__0">a karachi based small business, an instagram shop, place to get good quality products on cheap rates</p>
        </div>
    </div>
</div>
<!--end hero banner-->

<!--page content-->
<div class="kalles-section container mt__20 mb__60">
    <div class="row fl_center cb">
        <div class=" col-12 col-md-12 txtn mt__25">
            <h3 class="fs__20">WHO WE ARE AND WHAT WE STAND FOR</h3>
            <p class="mg__0">
                <?= getAppName() ?>.pk was built off the idea that items should be loved and used in a sustainable way. Our journey began in 2020 and we have not stopped curating products since! We pride ourselves on selecting and stocking products that are beautiful but also serve purpose.
                By handpicking all of our products in-house, our team has increased and expanded our selection of organic, handcrafted, sustainably sourced products. There's a story behind everything we sell - from the artisan who crafts it to the individual who uses it!
            </p>
        </div>
    </div>
</div>
<!--end page content-->
<?php
include_once('components/quick-view.php');
include_once('components/quick-shop.php');
include_once('components/mini-cart-box.php');
include_once('components/search-box.php');
include_once('components/login-box.php');
include_once('components/mobile-toolbar.php');
include_once('components/mobile-menu.php');
include_once('components/back-to-top-button.php');
getFooter("includes/footer.php");
?>