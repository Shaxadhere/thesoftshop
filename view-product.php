<?php
include_once('web-config.php');
$ProductSlug = $_REQUEST['name'];
include_once('models/product-model.php');
$ProductModel = new Product();

$Product = $ProductModel->FilterByProductSlug($ProductSlug);
$Product = mysqli_fetch_array($Product);
$ProductDetails = $ProductModel->FilterWithAttributesByProductSlug($ProductSlug);

$Colors = array();
$ColorCodes = array();
$Sizes = array();
while ($Deatil = mysqli_fetch_array($ProductDetails)) {
    array_push($Colors, $Deatil['ColorName']);
    array_push($ColorCodes, $Deatil['ColorCode']);
    array_push($Sizes, $Deatil['SizeValue']);
}
getHeader($Product['ProductName'], "includes/header.php");
?>
<div class="sp-single sp-single-1 des_pr_layout_1 mb__60">

    <!-- breadcrumb -->
    <div class="bgbl pt__20 pb__20 lh__1">
        <div class="container">
            <div class="row al_center">
                <div class="col">
                    <nav class="sp-breadcrumb">
                        <a href="index-2.html">Home</a>
                        <i class="facl facl-angle-right"></i>
                        <a href="<?= getHTMLRoot() ?>/products">Products</a>
                        <i class="facl facl-angle-right"></i><?= $Product['ProductName'] ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->
    <div class="container container_cat cat_default">
        <div class="row product mt__40">
            <div class="col-md-12 col-12 thumb_left">
                <div class="row mb__50 pr_sticky_content">
                    <!-- product thumbnails -->
                    <div class="col-md-6 col-12 pr product-images img_action_zoom pr_sticky_img kalles_product_thumnb_slide">
                        <div class="row theiaStickySidebar">
                            <div class="col-12 col-lg col_thumb">
                                <div class="p-thumb p-thumb_ppr images sp-pr-gallery equal_nt nt_contain ratio_imgtrue position_8 nt_slider pr_carousel" data-flickity='{"initialIndex": ".media_id_001","fade":true,"draggable":">1","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 6,"pageDots": false,"rightToLeft": false }'>
                                    <?php
                                    $ProductImages = json_decode($Product['ProductImages']);
                                    foreach ($ProductImages as $image) {
                                        echo "<div " .
                                            "class='img_ptw p_ptw p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__127_66 media_id_001' " .
                                            "data-mdid='001' data-height='1440' data-width='1128' data-ratio='0.7833333333333333' data-mdtype='image' " .
                                            "data-src='" . getHtmlRoot() . "/uploads/product-images/" . $image . "' data-bgset='" . getHtmlRoot() . "/uploads/product-images/" . $image . "' " .
                                            "data-cap='$Product[ProductName] - color pink , size S'></div>";
                                    }
                                    ?>
                                </div>
                                <div class="p_group_btns pa flex">
                                    <button class="br__40 tc flex al_center fl_center show_btn_pr_gallery ttip_nt tooltip_top_left">
                                        <i class="las la-expand-arrows-alt"></i>
                                        <span class="tt_txt">Click to enlarge</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-lg-auto col_nav nav_medium t4_show">
                                <div class="p-nav ratio_imgtrue row equal_nt nt_cover position_8 nt_slider pr_carousel" data-flickityjs='{"initialIndex": ".media_id_001","cellSelector": ".n-item:not(.is_varhide)","cellAlign": "left","asNavFor": ".p-thumb","wrapAround": true,"draggable": ">1","autoPlay": 0,"prevNextButtons": 0,"percentPosition": 1,"imagesLoaded": 0,"pageDots": 0,"groupCells": 3,"rightToLeft": false,"contain":  1,"freeScroll": 0}'></div>
                                <button type="button" aria-label="Previous" class="btn_pnav_prev pe_none">
                                    <i class="las la-angle-up"></i>
                                </button>
                                <button type="button" aria-label="Next" class="btn_pnav_next pe_none">
                                    <i class="las la-angle-down"></i>
                                </button>
                            </div>
                            <div class="dt_img_zoom pa t__0 r__0 dib"></div>
                        </div>
                    </div>
                    <!-- end product thumbnails -->

                    <!-- product detail -->
                    <div class="col-md-6 col-12 product-infors pr_sticky_su">
                        <div class="theiaStickySidebar">
                            <div class="kalles-section-pr_summary kalles-section summary entry-summary mt__30">
                                <h1 class="product_title entry-title fs__16"><?= $Product['ProductName'] ?></h1>
                                <div class="flex wrap fl_between al_center price-review">
                                    <p class="price_range" id="price_ppr">Rs. <?= $Product['Price'] ?></p>
                                    <a href="#tab_reviews_product" class="rating_sp_kl dib">
                                        <div class="kalles-rating-result">
                                            <?php
                                            $Reviews = json_decode($Product['Reviews']);
                                            ?>
                                            <span class="kalles-rating-result__number">(<?= (($Reviews != null) ? count($Reviews) : "0") ?> reviews)</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="pr_short_des">
                                    <p class="mg__0"><?= $Product['ProductDescription'] ?></p>
                                </div>
                                <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
                                    <div id="callBackVariant_ppr">
                                        <div class="variations mb__40 style__circle size_medium style_color des_color_1">
                                            <div class="swatch is-color kalles_swatch_js">
                                                <h4 class="swatch__title">Color:
                                                    <span class="nt_name_current user_choose_js"><?= $Colors[0] ?></span>
                                                </h4>
                                                <ul class="swatches-select swatch__list_pr d-flex">
                                                    <?php
                                                    for ($i = 0; $i < count($Colors); $i++) {
                                                        echo "<li class='ttip_nt tooltip_top_right nt-swatch swatch_pr_item' data-escape='$Colors[$i]'>";
                                                        echo "<span class='tt_txt'>$Colors[$i]</span>";
                                                        echo "<span class='swatch__value_pr pr lazyload' style='$ColorCodes[$i]'></span>";
                                                        echo "</li>";
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="swatch is-label kalles_swatch_js">
                                                <h4 class="swatch__title">Size:
                                                    <span class="nt_name_current user_choose_js"><?= $Sizes[0] ?></span>
                                                </h4>
                                                <ul class="swatches-select swatch__list_pr d-flex">
                                                    <?php
                                                    for ($i = 0; $i < count($Sizes); $i++) {
                                                        if($Sizes[$i] != "None"){
                                                            echo "<li class='nt-swatch swatch_pr_item pr' data-escape='$Sizes[$i]'>";
                                                            echo "<span class='swatch__value_pr'>$Sizes[$i]</span>";
                                                            echo "</li>";
                                                        }
                                                    }
                                                    ?>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nt_cart_form variations_form variations_form_ppr">
                                            <div class="variations_button in_flex column w__100 buy_qv_false">
                                                <div class="flex wrap">
                                                    <div class="quantity pr mr__10 order-1 qty__true d-inline-block" id="sp_qty_ppr">
                                                        <input type="number" class="input-text qty text tc qty_pr_js qty_cart_js" name="quantity" value="1">
                                                        <div class="qty tc fs__14">
                                                            <button type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                                <i class="facl facl-plus"></i>
                                                            </button>
                                                            <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0">
                                                                <i class="facl facl-minus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="nt_add_w ts__03 pa order-3">
                                                        <a href="#" class="wishlistadd cb chp ttip_nt tooltip_top_left">
                                                            <span class="tt_txt">Add to Wishlist</span>
                                                            <i class="facl facl-heart-o"></i>
                                                        </a>
                                                    </div>
                                                    <style>
                                                    .btn-add-to-cart{
                                                        
                                                    }
                                                    </style>
                                                    <button data-product="<?= base64_encode($Product['ProductID']) ?>" type="button" data-time="6000" data-ani="shake" class="button truncate w__100 mt__20 order-4 d-inline-block animated btn-add-to-cart">
                                                        <span class="txt_add ">Add to cart</span>
                                                    </button>
                                                    <button data-product="<?= base64_encode($Product['ProductID']) ?>" type="button" data-time="6000" data-ani="shake" class="single_add_to_cart_button button truncate w__100 mt__20 order-4 d-inline-block animated btn-add-to-cart">
                                                        <span class="txt_add ">Add to cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="trust_seal_ppr" class="pr_trust_seal tl_md tc">
                                    <img class="img_tr_s1 lazyload w__100 max-width__330px" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%202244%20285%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" alt="" data-srcset="assets/images/single-product/trust_img2.png" />
                                </div>
                                <div class="extra-link mt__35 fwsb">
                                    <a class="ajax_pp_js cd chp mr__20" href="#" data-id="#popup-size-guide">Size Guide</a>
                                    <a class="ajax_pp_js cd chp mr__20" href="#" data-id="#popup-delivery-and-return">Delivery &amp; Return</a>
                                    <a class="ajax_pp_js cd chp" href="#" data-id="#popup-ask-a-question">Ask a Question</a>
                                </div>
                                <div class="product_meta">
                                    <span class="posted_in">
                                        <span class="cb">Categories:</span>
                                        <?php
                                        $Categories = json_decode($Product['Categories']);
                                        $count = count($Categories);
                                        $index = 0;
                                        foreach($Categories as $category){
                                            $index++;
                                            echo "<a href='".getHTMLRoot()."/category?name=$category' class='cg'>$category</a>";
                                            echo ($count == $index) ? "." : ", ";
                                        }
                                        ?>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="cb">Tags:</span>
                                        <?php
                                        $Tags = json_decode($Product['ProductTags']);
                                        $count = count($Tags);
                                        $index = 0;
                                        foreach($Tags as $tags){
                                            $index++;
                                            echo "<a href='".getHTMLRoot()."/products?tags=$tags' class='cg'>$tags</a>";
                                            echo ($count == $index) ? "." : ", ";
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product detail -->
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php
getFooter("includes/footer.php");
include_once('components/quick-view.php');
include_once('components/quick-shop.php');
include_once('components/mini-cart-box.php');
include_once('components/search-box.php');
include_once('components/login-box.php');
include_once('components/mobile-toolbar.php');
include_once('components/mobile-menu.php');
include_once('components/back-to-top-button.php');
?>