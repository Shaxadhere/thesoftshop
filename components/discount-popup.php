<!--discount promotion popup-->
<div id="kalles-section-promo_pr_pp" class="kalles-section mfp-hide dn">
    <div class="js_lz_pppr popup_prpr_wrap container bgw mfp-with-anim" data-stt='{ "pp_version": 1,"day_next": 1 }'>
        <div class="wrap_title">
            <h3 class="section-title tc pr flex fl_center al_center fs__24 title_2">
                <span class="mr__10 ml__10">Wait! Can't find what you're looking for?</span>
            </h3>
            <span class="dn tt_divider"><span></span><i class="dn clprfalse title_2 la-gem"></i><span></span></span><span class="section-subtitle db tc sub-title">Maybe this will help...</span>
        </div>
        <div class="products nt_products_holder row row_pr_1 cdt_des_1 round_cd_false js_carousel nt_slider nt_cover ratio_nt position_8 space_ prev_next_0 btn_owl_1 dot_owl_1 dot_color_1 btn_vi_1" data-flickityjs='{"draggable":0,"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 1, "cellAlign": "left","wrapAround": false,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
            <?php
            include_once('models/product-model.php');
            $ProductModel = new Product();
            $RandomProducts = $ProductModel->ListRandom(8);
            while ($row = mysqli_fetch_array($RandomProducts)) {
                $ProductImages = json_decode($row['ProductImages']);

                $ProductDetails = $ProductModel->FilterWithAttributesByProductID(base64_encode($row['PK_ID']));
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
                $ProductDetailsCount = count($PriceVarient);
            ?>
                <div class="col-lg-3 col-md-4 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                    <div class="product-inner pr">
                        <div class="product-image pr oh lazyload">
                            <a class="d-block" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>">
                                </div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= (isset($ProductImages[1])) ? $ProductImages[1] : $ProductImages[0] ?>"></div>
                            </div>
                            <div class="product-attr pa ts__03 cw op__0 tc">
                                <p class="truncate mg__0 w__100"><?= ($Sizes[0] == "None") ? "" : implode(", ", $Sizes); ?></p>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>"><?= $row['ProductName'] ?></a>
                            </h3>
                            <span class="price dib mb__5">Rs. <?= ($row['PriceVary'] != 1) ? $row['Price'] : $PriceVarient[0] . " - " . $PriceVarient[intval($ProductDetailsCount) - 1] ?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!--end discount promotion popup-->