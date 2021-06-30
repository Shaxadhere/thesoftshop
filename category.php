<?php
include_once('web-config.php');
$CategorySlug = $_REQUEST['name'];
include_once('models/category-model.php');
$CategoryModel = new Category();
$Category = $CategoryModel->FilterByCategorySlug($CategorySlug);
$Category = mysqli_fetch_array($Category);
getHeader($Category['CategoryName'], "includes/header.php");
?>
<!--shop banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/slide/banner21.jpg"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw"><?= $Category['CategoryName'] ?></h1>
            <p class="mg__0">Trendy new products with very unique style and design for your unique experience.</p>
        </div>
    </div>
</div>
<!--end shop banner-->
<!-- featured collection -->
<div class="nt_section type_featured_collection tp_se_cdt">
    <div class="kalles-otp-01__feature container">

        <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">
            <?php
            include_once('web-config.php');
            include_once('models/product-model.php');
            $ProductModel = new Product();
            $CategoryProducts = $ProductModel->ListByCategoryName($Category['CategoryName']);
            while ($row = mysqli_fetch_array($CategoryProducts)) {
                $Categories = json_decode($row['Categories']);
                $ProductImages = json_decode($row['ProductImages']);

                $ProductDetails = $ProductModel->FilterWithAttributesByProductID(base64_encode($row['PK_ID']));
                $Colors = array();
                $ColorCodes = array();
                $Sizes = array();

                while ($Deatil = mysqli_fetch_array($ProductDetails)) {
                    array_push($Colors, $Deatil['ColorName']);
                    array_push($ColorCodes, $Deatil['ColorCode']);
                    array_push($Sizes, $Deatil['SizeValue']);
                }
            ?>

                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                    <div class="product-inner pr">
                        <div class="product-image position-relative oh lazyload">

                            <a class="d-block" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>"></div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= (isset($ProductImages[1])) ? $ProductImages[1] : $ProductImages[0] ?>"></div>
                            </div>
                            <div class="nt_add_w ts__03 pa ">
                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                    <span class="tt_txt">Add to Wishlist</span>
                                    <i class="facl facl-heart-o"></i>
                                </a>
                            </div>
                            <div class="hover_button op__0 tc pa flex column ts__03 checklol">
                                <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                    <span class="tt_txt">Quick view</span>
                                    <i data-id="<?= base64_encode($row['PK_ID']) ?>" class="iccl iccl-eye quick-view-product"></i>
                                    <span>Quick view</span>
                                </a>
                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left" class="quick-shop-product">
                                    <span class="tt_txt">Quick Shop</span>
                                    <i class="iccl iccl-cart"></i>
                                    <span>Quick Shop</span>
                                </a>
                            </div>
                            <div class="product-attr pa ts__03 cw op__0 tc">
                                <p class="truncate mg__0 w__100">S, M, L</p>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title position-relative fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>"><?= $row['ProductName'] ?></a>
                            </h3>
                            <span class="price dib mb__5">Rs. <?= $row['Price'] ?></span>
                            <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                                <?php
                                for ($i = 0; $i < count($Colors); $i++) {
                                    echo "<span ";
                                    echo "class='lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right'>";
                                    echo "<span class='tt_txt'>" . $Colors[$i] . "</span>";
                                    echo "<span class='swatch__value' style='" . $ColorCodes[$i] . "'></span></span>";
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

        <div class="products-footer tc mt__40">
            <a class="se_cat_lm pr nt_cat_lm button button_default br_rd_true btn_icon_false" href="#">Load More</a>
        </div>
    </div>
</div>
<!-- end featured collection -->

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