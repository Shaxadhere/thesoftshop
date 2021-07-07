<?php
include_once('web-config.php');
getHeader("Cart", "includes/header.php");
include_once('models/product-model.php');
$ProductModel = new Product();
$Cart = $_SESSION['CART'];
?>
<!--cart section-->
<div class="kalles-section cart_page_section container mt__60">
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
            foreach ($Cart as $cartItem) {
            $Product = $ProductModel->FilterByProductID(base64_encode($cartItem['productId']));
            $Product = mysqli_fetch_array($Product);
            $ProductImages = json_decode($Product['ProductImages']);
            echo "<script>console.log('".json_encode($Product)."')</script>"
            ?>
                <div class="cart_item js_cart_item">
                    <div class="ld_cart_bar"></div>
                    <div class="row al_center">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="page_cart_info flex al_center">
                                <a href="product-detail-layout-01.html">
                                    <img style="width: 140px;height: 140px;object-fit: cover;padding:5px" class="lazyload w__100 lz_op_ef" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%201128%201439%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>" alt="">
                                </a>
                                <div class="mini_cart_body ml__15">
                                    <h5 class="mini_cart_title mg__0 mb__5"><a href="product-detail-layout-01.html"><?= $Product['ProductName'] ?></a></h5>
                                    <div class="mini_cart_meta">
                                        <p class="cart_selling_plan">
                                            <span>Size: <?= $cartItem['productSize'] ?></span><br>
                                            <span>Color: <?= $cartItem['productColor'] ?></span>
                                        </p>
                                    </div>
                                    <div class="mini_cart_tool mt__10">
                                        <a href="#" class="cart_ac_remove js_cart_rem ttip_nt tooltip_top_right"><span class="tt_txt">Remove this item</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 tc__ tc_lg">
                            <div class="cart_meta_prices price">
                                <div class="cart_price">Rs. <?= $Product['Price'] ?></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 tc mini_cart_actions">
                            <div class="quantity pr mr__10 qty__true">
                                <input type="number" class="input-text qty text tc qty_cart_js" name="updates[]" value="<?= $cartItem['productqty'] ?>">
                                <div class="qty tc fs__14">
                                    <button type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                        <i class="facl facl-plus"></i></button>
                                    <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0 qty_1">
                                        <i class="facl facl-minus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 tc__ tr_lg">
                            <span class="cart-item-price fwm cd js_tt_price_it">Rs. <?= intval($Product['Price']) * intval($cartItem['productqty']) ?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="cart__footer mt__60">
            <div class="row">
                <div class="col-12 tr_md tc order-md-12 order-12 col-md-12">
                    <div class="total row in_flex fl_between al_center cd fs__18 tu">
                        <div class="col-auto"><strong>Subtotal:</strong></div>
                        <div class="col-auto tr js_cat_ttprice fs__20 fwm">
                            <div class="cart_tot_price">Rs. 85</div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <p class="db txt_tax_ship mb__5">Taxes, shipping and discounts codes calculated at checkout</p>
                    <div class="clearfix"></div>
                    <button type="submit" name="update" class="button btn_update mt__10 mb__10 js_add_ld w__100">Update Cart</button>
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