<!-- featured collection -->
<div class="nt_section type_featured_collection tp_se_cdt">
    <div class="kalles-otp-01__feature container">
        <div class="wrap_title des_title_2">
            <h3 class="section-title tc position-relative flex fl_center al_center fs__24 title_2">
                <span class="mr__10 ml__10">Recent Products</span>
            </h3>
            <span class="dn tt_divider">
                <span></span>
                <i class="dn clprfalse title_2 la-gem"></i>
                <span></span>
            </span>
            <span class="section-subtitle db tc sub-title">Recently added products</span>
        </div>

        <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">
            <?php
            include_once('web-config.php');
            include_once('models/product-model.php');
            $ProductModel = new Product();
            $Products = $ProductModel->List(0, 8, "", "", "new-to-old");
            // $FeaturedProducts = $ProductModel->ListByCategoryName("featured");
            while ($row = mysqli_fetch_array($Products)) {
                $Categories = json_decode($row['Categories']);
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

                $Wishlist = $_SESSION['WISHLIST'];
                $IsWish = false;
                foreach ($Wishlist as $item) {
                    if ($item == base64_encode($row['PK_ID'])) {
                        $IsWish = true;
                    }
                }
            ?>

                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1" data-id="<?= base64_encode($row['PK_ID']) ?>">
                    <div class="product-inner pr">
                        <div class="product-image position-relative oh lazyload">

                            <a class="d-block" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>"></div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= (isset($ProductImages[1])) ? $ProductImages[1] : $ProductImages[0] ?>"></div>
                            </div>
                            <div class="nt_add_w ts__03 pa  <?= ($IsWish) ? "wis_added" : "" ?>">
                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right">
                                    <span class="tt_txt">Add to Wishlist</span>
                                    <i class="facl facl-heart-o"></i>
                                </a>
                            </div>
                            <div class="hover_button op__0 tc pa flex column ts__03 checklol">
                                <a data-id="<?= base64_encode($row['PK_ID']) ?>" class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left quick-view-product" href="#">
                                    <span class="tt_txt">Quick view</span>
                                    <i data-id="<?= base64_encode($row['PK_ID']) ?>" class="iccl iccl-eye quick-view-product-eye"></i>
                                    <span>Quick view</span>
                                </a>
                            </div>
                            <div class="product-attr pa ts__03 cw op__0 tc">
                                <p class="truncate mg__0 w__100"><?= ($Sizes[0] == "None") ? "" : implode(", ", $Sizes); ?></p>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title position-relative fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>"><?= $row['ProductName'] ?></a>
                            </h3>
                            <span class="price dib mb__5">Rs. <?= ($row['PriceVary'] != 1) ? $row['Price'] : $PriceVarient[0] . " - " . $PriceVarient[intval($ProductDetailsCount) - 1] ?></span>
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

    </div>
</div>
<!-- end featured collection -->