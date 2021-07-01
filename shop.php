<?php
include_once('web-config.php');
getHeader("Shop", "includes/header.php");
?>
<!--shop banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/slide/banner21.jpg"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">Shop</h1>
            <p class="mg__0">Shop through our latest selection of very unique and best quality products</p>
        </div>
    </div>
</div>
<!--end shop banner-->

<div class="container container_cat pop_default cat_default mb__20">

    <!--grid control-->
    <div class="cat_toolbar row fl_center al_center mt__30">
        <div class="cat_filter col op__0 pe_none">
            <a href="#" data-opennt="#kalles-section-nt_filter" data-pos="left" data-remove="true" data-class="popup_filter" data-bg="hide_btn" class="has_icon btn_filter mgr"><i class="iccl fwb iccl-filter fwb mr__5"></i>Filter</a>
            <a href="#" data-id="#kalles-section-nt_filter" class="btn_filter js_filter dn mgr"><i class="iccl fwb iccl-filter fwb mr__5"></i>Filter</a>
        </div>
        <div class="cat_view col-auto">
            <div class="dn dev_desktop">
                <a href="#" data-mode="grid" data-dev="dk" data-col="6" class="pr mr__10 cat_view_page view_6"></a>
                <a href="#" data-mode="grid" data-dev="dk" data-col="4" class="pr mr__10 cat_view_page view_4"></a>
                <a href="#" data-mode="grid" data-dev="dk" data-col="3" class="pr mr__10 cat_view_page view_3 active"></a>
                <a href="#" data-mode="grid" data-dev="dk" data-col="15" class="pr mr__10 cat_view_page view_15"></a>
                <a href="#" data-mode="grid" data-dev="dk" data-col="2" class="pr cat_view_page view_2"></a>
            </div>
            <div class="dn dev_tablet dev_view_cat">
                <a href="#" data-dev="tb" data-col="6" class="pr mr__10 cat_view_page view_6"></a>
                <a href="#" data-dev="tb" data-col="4" class="pr mr__10 cat_view_page view_4"></a>
                <a href="#" data-dev="tb" data-col="3" class="pr cat_view_page view_3"></a>
            </div>
            <div class="flex dev_mobile dev_view_cat">
                <a href="#" data-dev="mb" data-col="12" class="pr mr__10 cat_view_page view_12"></a>
                <a href="#" data-dev="mb" data-col="6" class="pr cat_view_page view_6"></a>
            </div>
        </div>
        <div class="cat_sortby cat_sortby_js col tr kalles_dropdown kalles_dropdown_container">
            <a class="in_flex fl_between al_center sortby_pick kalles_dropDown_label" href="#">
                <span class="lbl-title sr_txt dn">
                    <?php
                    if (isset($_REQUEST['sort'])) {
                        switch ($_REQUEST['sort']) {
                            case 'new-to-old':
                                echo "Date, new to old";
                                break;

                            case 'old-to-new':
                                echo "Date, old to new";
                                break;

                            case 'best-selling':
                                echo "Best Selling";
                                break;

                            case 'a-z':
                                echo "Alphabetically, A-Z";
                                break;

                            case 'z-a':
                                echo "Alphabetically, Z-A";
                                break;

                            case 'low-to-high':
                                echo "Price, low to high";
                                break;

                            case 'high-to-low':
                                echo "Price, high to low";
                                break;

                            default:
                                echo "Date, new to old";
                                break;
                        }
                    } else {
                        echo "Date, new to old";
                    }
                    ?>
                </span>
                <span class="lbl-title sr_txt_mb">Sort by</span>
                <i class="ml__5 mr__5 facl facl-angle-down"></i>
            </a>
            <div class="nt_sortby dn">
                <svg class="ic_triangle_svg" viewBox="0 0 20 9" role="presentation">
                    <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                </svg>
                <div class="h3 mg__0 tc cd tu ls__2 dn_lg db">Sort by<i class="pegk pe-7s-close fs__50 ml__5"></i>
                </div>
                <div class="nt_ajaxsortby wrap_sortby kalles_dropdown_options">
                    <a onclick="location.href='<?= getHTMLRoot() ?>/shop?sort=new-to-old'" data-label="Date, new to old" class="kalles_dropdown_option truncate" href="<?= getHTMLRoot() ?>/shop?sort=new-to-old">Date, new to old</a>
                    <a onclick="location.href='<?= getHTMLRoot() ?>/shop?sort=old-to-new'" data-label="Date, old to new" class="kalles_dropdown_option truncate" href="<?= getHTMLRoot() ?>/shop?sort=old-to-new">Date, old to new</a>
                    <a onclick="location.href='<?= getHTMLRoot() ?>/shop?sort=best-selling'" data-label="Best selling" class="kalles_dropdown_option truncate" href="<?= getHTMLRoot() ?>/shop?sort=best-selling">Best selling</a>
                    <a onclick="location.href='<?= getHTMLRoot() ?>/shop?sort=a-z'" data-label="Alphabetically, A-Z" class="kalles_dropdown_option truncate" href="<?= getHTMLRoot() ?>/shop?sort=a-z">Alphabetically, A-Z</a>
                    <a onclick="location.href='<?= getHTMLRoot() ?>/shop?sort=z-a'" data-label="Alphabetically, Z-A" class="kalles_dropdown_option truncate" href="<?= getHTMLRoot() ?>/shop?sort=z-a">Alphabetically, Z-A</a>
                    <a onclick="location.href='<?= getHTMLRoot() ?>/shop?sort=low-to-high'" data-label="Price, low to high" class="kalles_dropdown_option truncate" href="<?= getHTMLRoot() ?>/shop?sort=low-to-high">Price, low to high</a>
                    <a onclick="location.href='<?= getHTMLRoot() ?>/shop?sort=high-to-low'" data-label="Price, high to low" class="kalles_dropdown_option truncate" href="<?= getHTMLRoot() ?>/shop?sort=high-to-low">Price, high to low</a>
                </div>
            </div>
        </div>
    </div>
    <!--end grid control-->

    <!--filter panel area-->
    <div class="filter_area_js filter_area lazyload">
        <div id="kalles-section-nt_filter" class="kalles-section nt_ajaxFilter section_nt_filter">
            <div class="h3 mg__0 tu bgb cw visible-sm fs__16 pr">Filter<i class="close_pp pegk pe-7s-close fs__40 ml__5"></i>
            </div>
            <div class="cat_shop_wrap">
                <div class="cat_fixcl-scroll">
                    <div class="cat_fixcl-scroll-content css_ntbar">
                        <div class="row wrap_filter">
                            <div class="col-12 col-md-3 widget">
                                <h5 class="widget-title">By Color</h5>
                                <div class="loke_scroll">
                                    <ul class="nt_filter_block nt_filter_color css_ntbar" data-filter_condition="and">
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color black">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_black lazyload"></span>
                                                </div>
                                                black
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color cyan">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_cyan lazyload"></span>
                                                </div>
                                                cyan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color green">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_green lazyload"></span>
                                                </div>
                                                green
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color grey">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_grey lazyload"></span>
                                                </div>
                                                grey
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color pink">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_pink lazyload"></span>
                                                </div>
                                                pink
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color pink clay">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_pink-clay lazyload"></span>
                                                </div>
                                                pink clay
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color sliver">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_sliver lazyload"></span>
                                                </div>
                                                sliver
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color white">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_white lazyload"></span>
                                                </div>
                                                white
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color white cream">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_white-cream lazyload" data-bg="assets/images/shop/color-white-cream.jpg"></span>
                                                </div>
                                                white cream
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color beige">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_beige lazyload"></span>
                                                </div>
                                                beige
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color blue">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_blue lazyload"></span>
                                                </div>
                                                blue
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag color brown">
                                                <div class="filter-swatch">
                                                    <span class="swatch__value bg_color_brown lazyload"></span>
                                                </div>
                                                brown
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 widget">
                                <h5 class="widget-title">By Price</h5>
                                <div class="loke_scroll">
                                    <ul class="nt_filter_block nt_filter_styleck css_ntbar" data-filter_condition="or">
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag price $50-$100">$50-$100</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag price $100-$150">$100-$150</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag price $150-$200">$150-$200</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag price $250-$300">$250-$300</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag price $350-$400">$350-$400</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag price $450-$500">$450-$500</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 widget">
                                <h5 class="widget-title">By Size</h5>
                                <div class="loke_scroll">
                                    <ul class="nt_filter_block nt_filter_styleck css_ntbar" data-filter_condition="and">
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag size s">s</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag size m">m</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag size l">l</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag size xs">xs</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag size xl">xl</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag size xxl">xxl</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 widget">
                                <h5 class="widget-title">By Brand</h5>
                                <div class="loke_scroll">
                                    <ul class="nt_filter_block nt_filter_styleck css_ntbar" data-filter_condition="and">
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag vendor ck">ck</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag vendor h&amp;m">h&amp;m</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag vendor kalles">kalles</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag vendor levi's">levi's</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag vendor monki">monki</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Narrow selection to products matching tag vendor nike">nike</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 tc mt__20 mb__20 dn">
                                <a class="button clear_filter_js" href="#">Clear All Filter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end filter panel area-->

    <!--product section-->
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="kalles-section tp_se_cdt">
                <!--products list-->
                <div class="on_list_view_false products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 nt_default">
                    <?php
                    include_once('models/product-model.php');
                    $ProductModel = new Product();
                    if (isset($_REQUEST['sort'])) {
                        switch ($_REQUEST['sort']) {
                            case 'new-to-old':
                                $Products = $ProductModel->List(0, 4);
                                break;

                            case 'old-to-new':
                                $Products = $ProductModel->List(0, 4, "PK_ID", "asc");
                                break;

                            case 'best-selling':
                                $Products = $ProductModel->List(0, 4, "PK_ID", "asc");
                                break;

                            case 'a-z':
                                $Products = $ProductModel->List(0, 4, "ProductName", "asc");
                                break;

                            case 'z-a':
                                $Products = $ProductModel->List(0, 4, "ProductName", "desc");
                                break;

                            case 'low-to-high':
                                $Products = $ProductModel->List(0, 4, "Price", "asc");
                                break;

                            case 'high-to-low':
                                $Products = $ProductModel->List(0, 4, "Price", "desc");
                                break;

                            default:
                                $Products = $ProductModel->List(0, 4);
                                break;
                        }
                    } else {
                        $Products = $ProductModel->List(0, 4);
                    }

                    while ($row = mysqli_fetch_array($Products)) {
                        $ProductImages = json_decode($row['ProductImages']);
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
                                        <p class="truncate mg__0 w__100">S, M, L</p>
                                    </div>
                                </div>
                                <div class="product-info mt__15">
                                    <h3 class="product-title pr fs__14 mg__0 fwm">
                                        <a class="cd chp" href="<?= getHTMLRoot() ?>/view-product?name=<?= $row['ProductSlug'] ?>"><?= $row['ProductName'] ?></a>
                                    </h3>
                                    <span class="price dib mb__5">Rs. <?= $row['Price'] ?></span>
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
                            <li><a class="prev page-numbers" href="#" style="color:grey">Prev</a></li>
                            <li><span class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="page-numbers" href="#">4</a></li>
                            <li><a class="next page-numbers" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <!--end navigation-->

            </div>
        </div>
    </div>
    <!--end product section-->

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