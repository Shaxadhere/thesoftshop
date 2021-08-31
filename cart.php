<?php
include_once('web-config.php');
getHeader(
    "Cart",
    "includes/header.php",
    "Cart",
    "Moreo.pk buy scruncies in pakistan, scrunchies on sale in pakistan",
    "Cart",
    "Cart",
    'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
);
include_once('models/product-model.php');
include_once('models/color-model.php');
include_once('models/size-model.php');
$ProductModel = new Product();
$ColorModel = new Color();
$SizeModel = new Size();
$Cart = $_SESSION['CART'];
?>
<div id="cart-root">
    <?php
    if (count($Cart) == 0) {
    ?>
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh cat_bg_img page_head_">
                <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/slide/banner21.jpg"></div>
                <div class="container pr z_100">
                    <h1 class="mb__5 cw">Cart</h1>
                    <p class="mg__0"></p>
                </div>
            </div>
        </div>
        <div class="empty tc mt__60 mb__60"><i class="las la-shopping-bag pr mb__10"></i>
            <p>Your cart is empty.</p>
            <p class="return-to-shop mb__15">
                <a class="button button_primary tu js_add_ld" href="<?= getHTMLRoot() ?>/shop">Return To Shop</a>
            </p>
        </div>
    <?php
    } else {
    ?>
        <!--cart section-->
        <div class="kalles-section cart_page_section container mt__60 cart-items-container">
            <form action="<?= getHTMLRoot() ?>/checkout" method="post" class="frm_cart_ajax_true frm_cart_page nt_js_cart pr oh ">
                <div class="cart_header">
                    <div class="row al_center">
                        <div class="col-5">Product</div>
                        <div class="col-3 tc">Price</div>
                        <div class="col-2 tc">Quantity</div>
                        <div class="col-2 tc tr_md">Total</div>
                    </div>
                </div>
                <div class="cart_items js_cat_items">
                    <?php
                    $Subtotal = 0;
                    foreach ($Cart as $cartItem) {
                        $Product = $ProductModel->FilterByProductID(base64_encode($cartItem['productId']));
                        $Product = mysqli_fetch_array($Product);
                        $ProductImages = json_decode($Product['ProductImages']);

                        $Color = $cartItem['productColor'];
                        $Size = $cartItem['productSize'];

                        $ColorDetails = $ColorModel->FilterByColorName($Color);
                        $ColorDetails = mysqli_fetch_array($ColorDetails);
                        $SizeDetails = $SizeModel->FilterBySizeName($Size);
                        $SizeDetails = mysqli_fetch_array($SizeDetails);

                        $Inventory = $ProductModel->InventoryByAttributes(
                            $Product['ProductID'],
                            $SizeDetails['PK_ID'],
                            $ColorDetails['PK_ID']
                        );
                        $Inventory = mysqli_fetch_array($Inventory);
                    ?>
                        <div class="cart_item js_cart_item cart-item-single" data-cartItemId="<?= $cartItem['CartItemId'] ?>">
                            <div class="ld_cart_bar"></div>
                            <div class="row al_center">
                                <div class="col-12 col-md-12 col-lg-5">
                                    <div class="page_cart_info flex al_center">
                                        <a href="<?= getHTMLRoot() ?>/view-product?name=<?= $Product['ProductSlug'] ?>">
                                            <img style="width: 140px;height: 140px;object-fit: cover;padding:5px" class="lazyload w__100 lz_op_ef" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%201128%201439%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>" alt="">
                                        </a>
                                        <div class="mini_cart_body ml__15">
                                            <h5 class="mini_cart_title mg__0 mb__5">
                                                <a href="<?= getHTMLRoot() ?>/view-product?name=<?= $Product['ProductSlug'] ?>">
                                                    <?= $Product['ProductName'] ?>
                                                </a>
                                            </h5>
                                            <div class="mini_cart_meta">
                                                <p class="cart_selling_plan">
                                                    <span class="product-size">Size: <?= $cartItem['productSize'] ?></span><br>
                                                    <span class="product-color">Color: <?= $cartItem['productColor'] ?></span><br>
                                                    <span class="qty"><?= $Inventory['Quantity'] ?> pieces available</span>
                                                </p>
                                            </div>
                                            <div class="mini_cart_tool mt__10">
                                                <a data-cartItemId="<?= $cartItem['CartItemId'] ?>" href="#" data-location="cart" class="remove-cart-item"><span class="tt_txt">Remove this item</span>
                                                    <i style="font-size: 20px;" class="pegk pe-7s-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-3 tc__ tc_lg">
                                    <div class="cart_meta_prices price">
                                        <div class="cart_price">Rs. <?= ($Product['PriceVary'] != 1) ? $Product['Price'] : $Inventory['Price'] ?></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 tc mini_cart_actions">
                                    <div class="quantity pr mr__10 qty__true">
                                        <input type="number" data-product="<?= $cartItem['productId'] ?>" data-size="<?= $cartItem['productSize'] ?>" data-color="<?= $cartItem['productColor'] ?>" data-session-id="<?= $cartItem['CartItemId'] ?>" data-unit-price="<?= ($Product['PriceVary'] != 1) ? $Product['Price'] : $Inventory['Price'] ?>" data-location="cart" class="input-text qty text tc qty_cart_js quantity-field" name="updates[]" value="<?= $cartItem['productqty'] ?>">
                                        <div class="qty tc fs__14">
                                            <button data-location="cart" type="button" class="plus db cb pa pd__0 pr__15 tr r__0 plus-quantity">
                                                <i class="facl facl-plus"></i>
                                            </button>
                                            <button data-location="cart" type="button" class="minus db cb pa pd__0 pl__15 tl l__0 qty_1 minus-quantity">
                                                <i class="facl facl-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 tc__ tr_lg">
                                    <span class="cart-item-price fwm cd js_tt_price_it">Rs. <?= ($Product['PriceVary'] != 1) ? intval($Product['Price']) * intval($cartItem['productqty']) : intval($Inventory['Price']) * intval($cartItem['productqty']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                        $Sub = ($Product['PriceVary'] != 1) ? intval($Product['Price']) * intval($cartItem['productqty']) : intval($Inventory['Price']) * intval($cartItem['productqty']);
                        $Subtotal = $Subtotal + $Sub;
                    }
                    ?>
                </div>
                <div class="cart__footer mt__60">
                    <div class="row">
                        <div class="col-12 tr_md tc order-md-12 order-12 col-md-12">
                            <div class="total row in_flex fl_between al_center cd fs__18 tu">
                                <div class="col-auto"><strong>Subtotal:</strong></div>
                                <div class="col-auto tr js_cat_ttprice fs__20 fwm">
                                    <div class="cart_tot_price">Rs. <?= $Subtotal ?></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <p class="db txt_tax_ship mb__5">Taxes, shipping and discounts codes calculated at checkout</p>
                            <p class="db txt_tax_ship mb__5 text-danger" id="errors" style="display:none"></p>
                            <div class="clearfix"></div>
                            <button type="button" name="update" class="button btn_update mt__10 mb__10 js_add_ld w__100" id="btn-update-cart" style="display:none;width: auto;">Update Cart</button>
                            <button type="submit" onclick="location.href='<?= getHTMLRoot() ?>/checkout'" data-confirm="ck_lumise" name="checkout" class="btn_checkout button button_primary tu mt__10 mb__10 js_add_ld w__100">Check Out</button>
                            <div class="clearfix"></div>
                            <div class="cat_img_trust mt__10">
                                <img class="lz_op_ef lazyload w-50" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%20476%2052%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="<?= getHTMLRoot() ?>/uploads/product-images/cart_image.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end cart section-->
    <?php
    }
    ?>
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