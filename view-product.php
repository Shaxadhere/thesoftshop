<?php
include_once('web-config.php');
$ProductSlug = $_REQUEST['name'];
include_once('models/product-model.php');
include_once('models/color-model.php');
include_once('models/size-model.php');
$ProductModel = new Product();
$ColorModel = new Color();
$SizeModel = new Size();

$Product = $ProductModel->FilterByProductSlug($ProductSlug);
$Product = mysqli_fetch_array($Product);
$ProductDetails = $ProductModel->FilterWithAttributesByProductSlug($ProductSlug);

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
$Tags = json_decode($Product['ProductTags']);
getHeader(
    $Product['ProductName'] . " - " . implode(",", $Tags),
    "includes/header.php",
    "Product Page",
    implode(",", $Tags),
    $Product['ProductDescription'],
    $Product['ProductName'],
    'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
);

$ColorDetails = $ColorModel->FilterByColorName($Colors[0]);
$ColorDetails = mysqli_fetch_array($ColorDetails);
$SizeDetails = $SizeModel->FilterBySizeName($Sizes[0]);
$SizeDetails = mysqli_fetch_array($SizeDetails);

$Inventory = $ProductModel->InventoryByAttributes(
    $Product['ProductID'],
    $SizeDetails['PK_ID'],
    $ColorDetails['PK_ID']
);
$Inventory = mysqli_fetch_array($Inventory);
?>
<div class="sp-single sp-single-1 des_pr_layout_1 mb__60">

    <!-- breadcrumb -->
    <div class="bgbl pt__20 pb__20 lh__1">
        <div class="container">
            <div class="row al_center">
                <div class="col">
                    <nav class="sp-breadcrumb">
                        <a href="<?= getHTMLRoot() ?>">Home</a>
                        <i class="facl facl-angle-right"></i>
                        <a href="<?= getHTMLRoot() ?>/shop">Shop</a>
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
                                <div class="alert alert-danger" id="cart-alert-danger" style="display:none"></div>
                                <div class="alert alert-success" id="cart-alert-success" style="display:none">Product added to cart successfully!</div>
                                <h1 class="product_title entry-title fs__16"><?= $Product['ProductName'] ?></h1>
                                <div class="flex wrap fl_between al_center price-review">
                                    <p class="price_range" id="price_ppr">
                                        <?php
                                        if (empty($Product['OriginalPriceIfOnSale'])) {
                                        ?>
                                            <span class="text-danger">Rs. <?= ($Product['PriceVary'] != 1) ? $Product['Price'] : $PriceVarient[0] . " - " . $PriceVarient[intval($ProductDetailsCount) - 1] ?></span>
                                        <?php
                                        } else {
                                        ?>
                                            <del>Rs. <?= $Product['OriginalPriceIfOnSale'] ?></del>
                                            <span class="text-danger">Rs. <?= ($Product['PriceVary'] != 1) ? $Product['Price'] : $PriceVarient[0] . " - " . $PriceVarient[intval($ProductDetailsCount) - 1] ?></span>
                                        <?php
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="pr_short_des">
                                    <p class="mg__0"><?= $Product['ProductDescription'] ?></p>
                                </div>
                                <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
                                    <div id="callBackVariant_ppr">
                                        <div class="variations mb__40 style__circle size_medium style_color des_color_1">
                                            <div class="swatch is-color kalles_swatch_js">
                                                <h4 class="swatch__title">Color:
                                                    <span class="nt_name_current user_choose_js" id="color-name"><?= $Colors[0] ?></span>
                                                </h4>
                                                <ul class="swatches-select swatch__list_pr d-flex">
                                                    <?php
                                                    for ($i = 0; $i < count($Colors); $i++) {
                                                        if ($Colors[$i] != "None") {
                                                            echo "<li class='ttip_nt tooltip_top_right nt-swatch swatch_pr_item' data-escape='$Colors[$i]'>";
                                                            echo "<span class='tt_txt' >$Colors[$i]</span>";
                                                            echo "<span data-location='view-product' class='swatch__value_pr pr color-switch' style='$ColorCodes[$i]'></span>";
                                                            echo "</li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="swatch is-label kalles_swatch_js">
                                                <h4 class="swatch__title">Size:
                                                    <span class="nt_name_current user_choose_js" id="size-name"><?= $Sizes[0] ?></span>
                                                </h4>
                                                <ul class="swatches-select swatch__list_pr d-flex">
                                                    <?php
                                                    for ($i = 0; $i < count($Sizes); $i++) {
                                                        if ($Sizes[$i] != "None") {
                                                            echo "<li class='nt-swatch swatch_pr_item pr' data-escape='$Sizes[$i]'>";
                                                            echo "<span data-location='view-product' class='swatch__value_pr size-switch'>$Sizes[$i]</span>";
                                                            echo "</li>";
                                                        }
                                                    }
                                                    ?>

                                                </ul>
                                            </div>
                                        </div>
                                        <?php
                                        if ($Product['ProductType'] == "Default") {
                                        ?>
                                            <div class="nt_cart_form variations_form variations_form_ppr">
                                                <div class="variations_button in_flex column w__100 buy_qv_false">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12">
                                                            <p id="quantity-available"><?= (intval($Inventory['Quantity']) < 1) ? "<span class='text-danger'>Out of stock</span>" : $Inventory['Quantity'] . " pieces available." ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5 col-5">
                                                            <div class="quantity pr mr__10 qty__true d-inline-block" id="sp_qty_ppr">
                                                                <input type="number" class="input-text qty text tc qty_pr_js qty_cart_js" name="quantity" value="1" id="quantity">
                                                                <div class="qty tc fs__14">
                                                                    <button type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                                        <i class="facl facl-plus"></i>
                                                                    </button>
                                                                    <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0">
                                                                        <i class="facl facl-minus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6">
                                                            <button style="background-color: var(--main-color);border: none;color: #fff;width: auto;" data-location="view-product" data-product="<?= base64_encode($Product['ProductID']) ?>" type="button" data-time="1000" data-ani="shake" class="button truncate d-inline-block animated btn-add-to-cart">
                                                                <span class="txt_add">Add to cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else  if ($Product['ProductType'] == "Upload") {
                                        ?>
                                            <style>
                                                .btn_upload {
                                                    cursor: pointer;
                                                    border: 2px solid #222;
                                                    padding: 5px 25px;
                                                    background: #fff;
                                                    color: #222;
                                                    border-radius: 40px;
                                                    font-size: 14px;
                                                    font-weight: 600;
                                                    min-height: 40px;
                                                }

                                                .btn_upload input {
                                                    position: absolute;
                                                    width: 100%;
                                                    left: 0;
                                                    top: 0;
                                                    width: 100%;
                                                    height: 105%;
                                                    cursor: pointer;
                                                    opacity: 0;
                                                }
                                            </style>
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="button_outer" class="button w__100">
                                                        <div class="btn_upload" style="width: 170px;text-align-last: center;">
                                                            <input type="file" id="upload_file" name="" multiple>
                                                            Upload Image
                                                        </div>
                                                    </div>
                                                    <div class="error_msg"></div>
                                                </div>
                                            </div>
                                            <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
                                                <div id="callBackVariant_ppr">
                                                    <div class="nt_cart_form variations_form variations_form_ppr fgr_frm">
                                                        <table class="grouped-product-list group_table mb__20">
                                                            <tbody id="uploads-container">

                                                            </tbody>
                                                        </table>
                                                        <div class="variations_button">
                                                            <div class="grouped_pr_subtotal">Subtotal:
                                                                <span class="grp_subtt_js grouped-pr-list-item__price"><ins>PKR 150.00</ins></span>
                                                            </div>
                                                            <button type="submit" data-time="6000" data-ani="shake" class="single_add_to_cart_button button alt js_add_group">
                                                                <span class="txt_add ">Add to cart</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="product_meta">
                                    <span class="posted_in">
                                        <span class="cb">Categories:</span>
                                        <?php
                                        $Categories = json_decode($Product['Categories']);
                                        $count = count($Categories);
                                        $index = 0;
                                        foreach ($Categories as $category) {
                                            $index++;
                                            echo "<a href='" . getHTMLRoot() . "/category?name=$category' class='cg'>$category</a>";
                                            echo ($count == $index) ? "." : ", ";
                                        }
                                        ?>
                                    </span>
                                    <span class="tagged_as">
                                        <span class="cb">Tags:</span>
                                        <?php

                                        $count = count($Tags);
                                        $index = 0;
                                        foreach ($Tags as $tags) {
                                            $index++;
                                            echo "<a href='" . getHTMLRoot() . "/shop?name=$tags' class='cg'>$tags</a>";
                                            echo ($count == $index) ? "." : ", ";
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product detail -->

                    <!-- related collection -->
                    <div class="nt_section type_featured_collection tp_se_cdt mt-5">
                        <div class="kalles-otp-01__feature container">
                            <div class="wrap_title des_title_2">
                                <h3 class="section-title tc position-relative flex fl_center al_center fs__24 title_2">
                                    <span class="mr__10 ml__10">Related Products</span>
                                </h3>
                                <span class="dn tt_divider">
                                    <span></span>
                                    <i class="dn clprfalse title_2 la-gem"></i>
                                    <span></span>
                                </span>
                            </div>

                            <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">
                                <?php
                                $FeaturedProducts = $ProductModel->ListByCategoryNameArray($Categories, 8);
                                while ($row = mysqli_fetch_array($FeaturedProducts)) {
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

                    <?php
                    include_once('components/bestsellers.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
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
<?php
if (isset($_REQUEST['added-to-cart'])) {
    echo "<script>$('#card-alert-success').show()</script>";
}
?>
<script>
    var btnUpload = $("#upload_file"),
        btnOuter = $(".button_outer");
    btnUpload.on("change", function(e) {
        var ext = btnUpload.val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
            $(".error_msg").text("Not an Image...");
        } else {
            $(".error_msg").text("");
            // var uploadedFiles = URL.createObjectURL();

            var images = new Array();
            var uploads = e.target.files;

            for (let i = 0; i < uploads.length; i++) {
                console.log(i)
                images.push(URL.createObjectURL(uploads[i]))
                var row = "<tr class='grouped-pr-list-item'>" +
                    "<td class='grouped-pr-list-item__thumb' style='width: 100px;'>" +
                    "<a href='#'><img alt='uploaded-image' style='height: 100px;object-fit: cover;' src='" + URL.createObjectURL(uploads[i]) + "' data-src='" + URL.createObjectURL(uploads[i]) + "' class='w__100 lz_op_ef lazyloaded'></a>" +
                    "</td>" +
                    "<td class='grouped-pr-list-item__quantity'>" +
                    "<div class='quantity pr'>" +
                    "<input type='number' class='input-text qty text tc qty_pr_js' value='1' inputmode='numeric'>" +
                    "<div class='qty tc fs__14'>" +
                    "<button type='button' class='plus db cb pa pd__0 pr__15 tr r__0'>" +
                    "<i class='facl facl-plus'></i></button>" +
                    "<button type='button' class='minus db cb pa pd__0 pl__15 tl l__0'>" +
                    "<i class='facl facl-minus'></i></button>" +
                    "</div>" +
                    "</div>" +
                    "</td>" +
                    "<td class='grouped-pr-list-item__quantity'>" +
                    "<button class='btn btn-sm btn-danger rounded delete-uploaded-image'>Delete</button>" +
                    "</td>" +
                    "</tr>";
                $('#uploads-container').append(row)
            }
            console.log($('#upload_file').val())
        }
    });
    $(document).on('click', '.delete-uploaded-image', function() {
        var row = $(this).parent().parent()
        row.remove()
    })
    $(".file_remove").on("click", function(e) {
        $("#uploaded_view").removeClass("show");
        $("#uploaded_view").find("img").remove();
        btnOuter.removeClass("file_uploading");
        btnOuter.removeClass("file_uploaded");
    });
</script>