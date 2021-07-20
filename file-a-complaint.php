<?php
include_once('web-config.php');
getHeader("File a complaint", "includes/header.php");
?>
<!--hero banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= getHTMLRoot() ?>/assets/images/slide/banner21.jpg"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">File a Complaint</h1>
            <p class="mg__0">We are sorry for any inconvinience you had to go through</p>
        </div>
    </div>
</div>
<!--end hero banner-->
<?php
include_once('components/contact-form.php');
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