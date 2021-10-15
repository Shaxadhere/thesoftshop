<?php
include_once('web-config.php');
getHeader(
    "Wishlist - Buy scrunchies in pakistan", //page title
    "includes/header.php", //header path
    "Wishlist", //pagetype
    "Buy scrunchies in pakistan, wishlist, buy potraits in pakistan", //page keywords
    "Wishlist", //description
    "Wishlist", //topic
    'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] //url
);
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
            $Wishlist = $_SESSION['WISHLIST'];
            if (count($Wishlist) == 0) {
            ?>
                <div class="post-content mt__50 inl_cnt_js">
                    <article class="post type-post">
                        <p>You do not have any items in your wishlist. Once you add products to your wishlist, you will see them here.</p>
                    </article>
                </div>
            <?php
                include_once('components/featured.php');
            }
            foreach ($Wishlist as $item) {
                $Product = $ProductModel->View($item);
                $Product = mysqli_fetch_array($Product);

                $ProductImages = json_decode($Product['ProductImages']);

                $ProductDetails = $ProductModel->FilterWithAttributesByProductID(base64_encode($Product['PK_ID']));
                $Colors = array();
                $ColorCodes = array();
                $Sizes = array();
                $PriceVarient = array();

                while ($Deatil = mysqli_fetch_array($ProductDetails)) {
                    array_push($Colors, $Deatil['ColorName']);
                    array_push($ColorCodes, $Deatil['ColorCode']);
                    array_push($Sizes, $Deatil['SizeValue']);
                    array_push($PriceVarient, $Deatil['PriceVarient']);
                }
                $Sizes = array_unique($Sizes);
                $Colors = array_unique($Colors);
                $ColorCodes = array_unique($ColorCodes);
                $ProductDetailsCount = count($PriceVarient);


                $IsWish = false;
                foreach ($Wishlist as $item) {
                    if ($item == base64_encode($Product['PK_ID'])) {
                        $IsWish = true;
                    }
                }
            ?>
                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1" data-id="<?= base64_encode($Product['PK_ID']) ?>">
                    <div class="product-inner pr">
                        <div class="product-image pr oh lazyload">
                            <a class="d-block" href="<?= getHTMLRoot() ?>/view-product?name=<?= $Product['ProductSlug'] ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>"></div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= isset($ProductImages[1]) ? $ProductImages[1] : $ProductImages[0] ?>"></div>
                            </div>
                            <div class="nt_add_w ts__03 pa  <?= ($IsWish) ? "wis_added" : "" ?>">
                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                            </div>
                            <div class="hover_button op__0 tc pa flex column ts__03">
                                <a data-id="<?= base64_encode($Product['PK_ID']) ?>" class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left quick-view-product" href="#"><span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span></a>
                            </div>
                            <div class="product-attr pa ts__03 cw op__0 tc">
                                <p class="truncate mg__0 w__100"><?= ($Sizes[0] == "None") ? "" : implode(", ", $Sizes); ?></p>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= getHTMLRoot() ?>/view-product?name=<?= $Product['ProductSlug'] ?>"><?= $Product['ProductName'] ?></a>
                            </h3>
                            <span class="price dib mb__5">Rs. <?= ($Product['PriceVary'] != 1) ? $Product['Price'] : $PriceVarient[0] . " - " . $PriceVarient[intval($ProductDetailsCount) - 1] ?></span>
                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                <?php
                                for ($i = 0; $i < count($Colors); $i++) {
                                    if ($Colors[$i] != "None") {
                                        echo "<span ";
                                        echo "class='lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right'>";
                                        echo "<span class='tt_txt'>" . $Colors[$i] . "</span>";
                                        echo "<span class='swatch__value' style='" . $ColorCodes[$i] . "'></span></span>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <!--end products list-->
    </div>
</div>
<!-- end featured collection -->

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