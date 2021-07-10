<?php
include_once('models/product-model.php');
$ProductModel = new Product();
$Cart = $_SESSION['CART'];
?>
<!-- mini cart box -->
<div id="nt_cart_canvas" class="nt_fk_canvas dn">
    <div class="nt_mini_cart nt_js_cart flex column h__100 btns_cart_1">
        <div class="mini_cart_header flex fl_between al_center">
            <div class="h3 fwm tu fs__16 mg__0">Shopping cart</div>
            <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
        </div>
        <div class="mini_cart_wrap">
            <div class="mini_cart_content fixcl-scroll">
                <div class="fixcl-scroll-content" id="cart-root">
                    <?php
                    $Subtotal = 0;
                    if (count($Cart) == 0) {
                    ?>
                        <div class="empty tc mt__40"><i class="las la-shopping-bag pr mb__10"></i>
                            <p>Your cart is empty.</p>
                            <p class="return-to-shop mb__15">
                                <a class="button button_primary tu js_add_ld" href="<?= getHTMLRoot() ?>/shop">Return To Shop</a>
                            </p>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="mini_cart_items js_cat_items lazyload">
                            <?php
                            foreach ($Cart as $cartItem) {
                                $Product = $ProductModel->FilterByProductID(base64_encode($cartItem['productId']));
                                $Product = mysqli_fetch_array($Product);
                                $ProductImages = json_decode($Product['ProductImages']);
                            ?>
                                <div class="mini_cart_item js_cart_item flex al_center pr oh cart_item">
                                    <div class="ld_cart_bar"></div>
                                    <a href="<?= getHTMLRoot() ?>/view-product?name=<?= $Product['ProductSlug'] ?>" class="mini_cart_img">
                                        <img class="w__100 lazyload" data-src="<?= getHTMLRoot() ?>/uploads/product-images/<?= $ProductImages[0] ?>" width="120" height="153" alt="" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iMTUzIiB2aWV3Qm94PSIwIDAgMTIwIDE1MyI+PC9zdmc+">
                                    </a>
                                    <div class="mini_cart_info">
                                        <a href="<?= getHTMLRoot() ?>/view-product?name=<?= $Product['ProductSlug'] ?>" class="mini_cart_title truncate"><?= $Product['ProductName'] ?></a>
                                        <div class="mini_cart_meta">
                                            <p class="cart_meta_variant"><?= $cartItem['productSize'] ?> | <?= $cartItem['productColor'] ?></p>
                                            <div class="cart_meta_price price">
                                                <div class="cart_price">
                                                    <p class="price_range" id="price_ppr">Quantity: <strong><?= $cartItem['productqty'] ?></strong></p>
                                                    <p class="price_range" id="price_ppr">Price: Rs. <?= $Product['Price'] ?></p>
                                                    <p class="price_range" id="price_ppr"><strong>Total: Rs. <?= intval($Product['Price']) * intval($cartItem['productqty']) ?></strong></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_actions">
                                            <a data-cartItemId="<?= $cartItem['CartItemId'] ?>" href="<?= getHTMLRoot() ?>/cart" class="edit-cart-item"><span class="tt_txt">Edit this item</span>
                                                <i style="font-size: 20px;" class="pegk pe-7s-note"></i>
                                            </a>
                                            <a data-cartItemId="<?= $cartItem['CartItemId'] ?>" href="#" data-location="mini-cart" class="remove-cart-item"><span class="tt_txt">Remove this item</span>
                                                <i style="font-size: 20px;" class="pegk pe-7s-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $Subtotal = $Subtotal + intval($Product['Price']) * intval($cartItem['productqty']);
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="mini_cart_footer js_cart_footer">
                <div class="js_cat_dics"></div>
                <div class="total row fl_between al_center">
                    <div class="col-auto"><strong>Subtotal:</strong></div>
                    <div class="col-auto tr js_cat_ttprice">
                        <div class="cart_tot_price">Rs. <?= $Subtotal ?></div>
                    </div>
                </div>
                <p class="txt_tax_ship mb__5 fs__12">Taxes, shipping and discounts codes will be calculated at checkout</p>
                <a href="#" class="button mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center cd-imp dn">Update Cart</a>
                <a href="<?= getHTMLRoot() ?>/cart" class="button btn-cart mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center cd-imp">View cart</a>
                <a href="<?= getHTMLRoot() ?>/checkout" class="button btn-checkout mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center text-white">Check Out</a>
            </div>
        </div>
    </div>
</div>
<!-- end mini cart box-->