<?php
include_once('web-config.php');
$CategorySlug = $_REQUEST['name'];
include_once('models/category-model.php');
$CategoryModel = new Category();
$Category = $CategoryModel->FilterByCategorySlug($CategorySlug);
if (mysqli_num_rows($Category) == 0) {
    redirectWindow(getHTMLRoot());
    exit();
}
$Category = mysqli_fetch_array($Category);
$Tags = json_decode($Category['CategoryTags']);
getHeader($Category['CategoryName'] . " - " . implode(",", $Tags), "includes/header.php");
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

        <!--products list-->
        <div class="on_list_view_false products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 nt_default">
            <?php
            include_once('models/product-model.php');
            $ProductModel = new Product();

            $CurrentPage = 1;
            if (isset($_REQUEST['page'])) {
                $CurrentPage = $_REQUEST['page'];
            }
            $ProductIndex = (intval($CurrentPage) * 4) - 4;
            if ($CurrentPage == 1) {
                $ProductIndex = 0;
            }

            $Products = $ProductModel->List($ProductIndex, 4, "", $_REQUEST['name'], "new-to-old");
            while ($row = mysqli_fetch_array($Products)) {
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
                        <div class="product-image pr oh lazyload">
                            <a class="d-block" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>">
                                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>"></div>
                            </a>
                            <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="<?= getHTMLRoot() ?>/uploads/product-images/<?= isset($ProductImages[1]) ? $ProductImages[1] : $ProductImages[0] ?>"></div>
                            </div>
                            <div class="nt_add_w ts__03 pa ">
                                <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                            </div>
                            <div class="hover_button op__0 tc pa flex column ts__03">
                                <a data-id="<?= base64_encode($row['PK_ID']) ?>" class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left quick-view-product" href="#"><span class="tt_txt">Quick view</span><i class="iccl iccl-eye"></i><span>Quick view</span></a>
                                <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left"><span class="tt_txt">Quick Shop</span><i class="iccl iccl-cart"></i><span>Quick Shop</span></a>
                            </div>
                            <div class="product-attr pa ts__03 cw op__0 tc">
                                <p class="truncate mg__0 w__100"><?= ($Sizes[0] == "None") ? "" : implode(", ", $Sizes); ?></p>
                            </div>
                        </div>
                        <div class="product-info mt__15">
                            <h3 class="product-title pr fs__14 mg__0 fwm">
                                <a class="cd chp" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>"><?= $row['ProductName'] ?></a>
                            </h3>
                            <span class="price dib mb__5">Rs. <?= $row['Price'] ?></span>
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

        <!--navigation-->
        <div class="products-footer tc mt__40">
            <nav class="nt-pagination w__100 tc paginate_ajax">
                <ul class="pagination-page page-numbers">
                    <li>
                        <?php
                        $CurrentPage = 1;
                        if (isset($_REQUEST['page'])) {
                            $CurrentPage = $_REQUEST['page'];
                        }

                        //Pagination values
                        $Products = $ProductModel->List(0, 9999999, "", $_REQUEST['name'], "new-to-old");
                        $NumberOfProducts = mysqli_num_rows($Products);
                        $PageNumbers = (intval($NumberOfProducts) / 4) + 1;

                        //Previous Button URL
                        if (isset($_REQUEST['page'])) {
                            $page = $_REQUEST['page'];
                            $URL = $_SERVER['QUERY_STRING'];
                            $prevPage = intval($page) - 1;
                            $PrevURL = str_replace("page=$page", "page=" . $prevPage, $URL);
                        } else {
                            $URL = $_SERVER['QUERY_STRING'];
                            if (empty($URL)) {
                                $PrevURL = "page=2";
                            } else {
                                $PrevURL = $URL . "&page=2";
                            }
                        }

                        if ($CurrentPage == 1) {
                            echo "<li>";
                            echo "<span class='prev page-numbers' style='color:grey'>Prev</span>";
                            echo "</li>";
                        } else {
                            echo "<li>";
                            echo "<a class='prev page-numbers' href='" . getHTMLRoot() . "/category?$PrevURL'>Prev</a>";
                            echo "</li>";
                        }

                        //Pagination
                        if (isset($_REQUEST['page'])) {
                            $page = $_REQUEST['page'];
                            $URL = $_SERVER['QUERY_STRING'];
                            $nextPage = intval($page) + 1;
                            $NewUrl = str_replace("&page=$page", "&page=" . $nextPage, $URL);
                            if (empty($URL)) {
                                echo "<script>alert('asdsa')</script>";
                                $NewUrl = str_replace("page=$page", "page=" . intval($page) + 1, $URL);
                            }
                        } else {
                            $page = 1;
                            $URL = $_SERVER['QUERY_STRING'];
                            if (empty($URL)) {
                                $NewUrl = $URL . "page=2";
                            } else {
                                $NewUrl = $URL . "&page=2";
                            }
                        }

                        for ($i = 1; $i < $PageNumbers; $i++) {

                            if (isset($_REQUEST['page'])) {
                                $NewUrl = str_replace("page=$page", "page=" . $i, $URL);
                            } else {
                                if (empty($URL)) {
                                    $NewUrl = $URL . "page=" . $i;
                                } else {
                                    $NewUrl = $URL . "&page=" . $i;
                                }
                            }

                            if (isset($_REQUEST['page'])) {
                                if ($_REQUEST['page'] == $i) {
                                    echo "<li><a href='" . getHTMLRoot() . "/category?$NewUrl' class='page-numbers current'>$i</a></li>";
                                } else {
                                    echo "<li><a href='" . getHTMLRoot() . "/category?$NewUrl' class='page-numbers'>$i</a></li>";
                                }
                            } else {
                                if ($i == "1") {
                                    echo "<li><a href='" . getHTMLRoot() . "/category?$NewUrl' class='page-numbers current'>$i</a></li>";
                                } else {
                                    echo "<li><a href='" . getHTMLRoot() . "/category?$NewUrl' class='page-numbers'>$i</a></li>";
                                }
                            }
                        }
                        $NextURL = getHTMLRoot() . "/category?" . $URL;
                        if (isset($_REQUEST['page'])) {
                            if ($_REQUEST['page'] != $NumberOfProducts) {
                                $PageNumber = intval($_REQUEST['page']) + 1;
                                $NextURL .= "page=" . $PageNumber;
                            }
                        } else {
                            if (1 != $NumberOfProducts) {
                                $PageNumber = 2;
                                $NextURL .= "page=" . $PageNumber;
                            }
                        }

                        //Next Button URL
                        if (isset($_REQUEST['page'])) {
                            $page = $_REQUEST['page'];
                            $URL = $_SERVER['QUERY_STRING'];
                            $nextPage = intval($page) + 1;
                            $NextURL = str_replace("page=$page", "page=" . $nextPage, $URL);
                        } else {
                            $URL = $_SERVER['QUERY_STRING'];
                            if (empty($URL)) {
                                $NextURL = "page=2";
                            } else {
                                $NextURL = $URL . "&page=2";
                            }
                        }



                        if ($CurrentPage == intval($PageNumbers)) {
                            echo "<li>";
                            echo "<span class='next page-numbers' style='color:grey'>Next</span>";
                            echo "</li>";
                        } else {
                            echo "<li>";
                            echo "<a class='next page-numbers' href='" . getHTMLRoot() . "/category?$NextURL'>Next</a>";
                            echo "</li>";
                        }
                        ?>
                </ul>
            </nav>
        </div>
        <!--end navigation-->
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