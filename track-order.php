<?php
include_once('web-config.php');
getHeader("Checkout", "includes/header.php");
if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "" || $_SESSION['CART'] == null) {
    redirectWindow(getHTMLRoot() . "?error=Your cart is empty!");
}
if (isset($_SESSION['USER'])) {
    include_once('models/customer-model.php');
    $CustomerModel = new Customer();
    $Customer = $CustomerModel->FilterCustomerByID(base64_encode($_SESSION['USER']['PK_ID']));
}
include_once('models/product-model.php');
$ProductModel = new Product();
$Cart = $_SESSION['CART'];
?>
<!--shop banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/slide/banner21.jpg"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">Track Order</h1>
        </div>
    </div>
</div>
<!--end shop banner-->
<!--cart section-->
<div class="kalles-section cart_page_section container mt__60">
    <div class="frm_cart_page check-out_calculator">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="checkout-section">
                    <h3 class="checkout-section__title">Order Status</h3>
                    <div class="row">
                        <div class="checkout-section__field col-lg-7 col-12">
                            <img src="<?= getHTMLRoot() ?>/assets/images/rain.png" style="width:100%" />
                        </div>

                        <div class="checkout-section__field col-lg-5 col-12">
                            <div class="order-review__wrapper">
                                <h3 class="order-review__title">Your order</h3>
                                <p>Your order is being processed</p>
                                <div class="checkout-order-review">
                                    <table class="checkout-review-order-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $Subtotal = 0;
                                            foreach ($Cart as $cartItem) {
                                                $Product = $ProductModel->FilterByProductID(base64_encode($cartItem['productId']));
                                                $Product = mysqli_fetch_array($Product);
                                                echo "<tr class='cart_item'>";
                                                echo "<td class='product-name'>$Product[ProductName]<strong class='product-quantity'>× $cartItem[productqty]</strong>";
                                                echo "</td>";
                                                echo "<td class='product-total'><span class='cart_price'>Rs. " . intval($Product['Price']) * intval($cartItem['productqty']) . "</span></td>";
                                                echo "</tr>";
                                                $Subtotal = $Subtotal + intval($Product['Price']) * intval($cartItem['productqty']);
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal cart_item">
                                                <th>Subtotal</th>
                                                <td><span class="cart_price">Rs. <?= $Subtotal ?></span></td>
                                            </tr>
                                            <tr class="cart_item">
                                                <th>Shipping</th>
                                                <td><span class="cart_price">Rs. 170</span></td>
                                            </tr>
                                            <tr class="order-total cart_item">
                                                <th>Total</th>
                                                <td><strong><span class="cart_price amount">Rs. <?= $Subtotal + 170 ?></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="checkout-payment">
                                        <p class="checkout-payment__policy-text">Your personal data will be used to process your order, support your experience throughout shipping process, and for other purposes described in our<a href="<?= getHTMLRoot() ?>/privacy-policy"> privacy policy</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--end cart section-->
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