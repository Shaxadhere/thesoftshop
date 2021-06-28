
<!-- featured collection -->
<div class="nt_section type_featured_collection tp_se_cdt">
    <div class="kalles-otp-01__feature container">
        <div class="wrap_title des_title_2">
            <h3 class="section-title tc position-relative flex fl_center al_center fs__24 title_2">
                <span class="mr__10 ml__10">FEATURED</span>
            </h3>
            <span class="dn tt_divider">
                <span></span>
                <i class="dn clprfalse title_2 la-gem"></i>
                <span></span>
            </span>
            <span class="section-subtitle db tc sub-title">Top view in this week</span>
        </div>

        <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">
            <?php
            include_once('web-config.php');
            include_once('models/product-model.php');
            $ProductModel = new Product();
            $FeaturedProducts = $ProductModel->ListFeatured();
            while($row = mysqli_fetch_array($FeaturedProducts)){
                $Categories = json_decode($row['Categories']);
                $ProductImages = json_decode($row['ProductImages']);
            ?>
            
            <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                <div class="product-inner pr">
                    <div class="product-image position-relative oh lazyload">

                        <a class="d-block" href="product-detail-layout-01.html">
                            <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>"></div>
                        </a>
                        <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                            <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>"></div>
                        </div>
                        <div class="nt_add_w ts__03 pa ">
                            <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                <span class="tt_txt">Add to Wishlist</span>
                                <i class="facl facl-heart-o"></i>
                            </a>
                        </div>
                        <div class="hover_button op__0 tc pa flex column ts__03">
                            <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="#">
                                <span class="tt_txt">Quick view</span>
                                <i class="iccl iccl-eye"></i>
                                <span>Quick view</span>
                            </a>
                            <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left">
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
                            <a class="cd chp" href="product-detail-layout-01.html">Blush Beanie</a>
                        </h3>
                        <span class="price dib mb__5">$15.00</span>
                        <div class="swatch__list_js swatch__list lh__1 nt_swatches_on_grid">
                            <span data-bgset="<?= getHTMLRoot() ?>/assets/images/products/pr-05.jpg" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt">Grey</span><span class="swatch__value bg_color_grey"></span></span>
                            <span data-bgset="<?= getHTMLRoot() ?>/assets/images/products/pr-31.jpg" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt">Pink</span><span class="swatch__value bg_color_pink"></span></span>
                            <span data-bgset="<?= getHTMLRoot() ?>/assets/images/products/pr-32.jpg" class="lazyload nt_swatch_on_bg swatch__list--item position-relative ttip_nt tooltip_top_right"><span class="tt_txt">Black</span><span class="swatch__value bg_color_black"></span></span>
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
