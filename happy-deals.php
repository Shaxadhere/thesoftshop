<?php
include_once('web-config.php');
getHeader("Happy deals", "includes/header.php");
?>
<!--shop banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/slide/banner21.jpg"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">Wishlist</h1>
        </div>
    </div>
</div>
<!--end shop banner-->
<!-- featured collection -->
<div class="nt_section type_featured_collection tp_se_cdt">
    <div class="kalles-otp-01__feature container">
        <!--products list-->
        <div class="on_list_view_false products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 nt_default">
            <?php
            include_once('models/product-model.php');
            $ProductModel = new Product();
            if (true) {
            ?>
                <div class="post-content mt__50 inl_cnt_js">
                    <article class="post type-post">
                        <p>There are no happy deals avaialble right now, once there are you will see them here. though, you can choose from our featured products here</p>
                    </article>
                </div>
            <?php
                include_once('components/featured.php');
            }
            ?>
        </div>
        <!--end products list-->
    </div>
</div>
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