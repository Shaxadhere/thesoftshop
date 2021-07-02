<?php
include_once('web-config.php');
getHeader("Cart", "includes/header.php");
?>
<!--cart section-->
<div class="kalles-section cart_page_section container mt__60">
    <div class="frm_cart_page check-out_calculator">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7">
                <div class="checkout-section">
                    <h3 class="checkout-section__title">Billing details</h3>
                    <div class="row">
                        <p class="checkout-section__field col-lg-6 col-12">
                            <label for="f-name">First name</label>
                            <input type="text" id="f-name" value="">
                        </p>
                        <p class="checkout-section__field col-lg-6 col-12">
                            <label for="l-name">Last name</label>
                            <input type="text" id="l-name" value="">
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="company">Company name (optional)</label>
                            <input type="text" id="company" value="">
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_01">Street address *</label>
                            <input type="text" id="address_01" value="" class="mb__20" placeholder="House number and street name">
                            <input type="text" id="address_02" value="" placeholder="Apartment, suite, unit, etc. (optional)">
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_03">Town / City</label>
                            <input type="text" id="address_03" value="">
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_province_ship" id="address_province_label">State *</label>
                            <select disabled id="address_province_ship">
                                <option value="Pakistan" selected>Sindh</option>
                                <option value="Pakistan" selected>Punjab</option>
                                <option value="Pakistan" selected>Pakistan</option>
                                <option value="Pakistan" selected>Pakistan</option>
                                <option value="Pakistan" selected>Pakistan</option>
                            </select>
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_zip_ship_2">Postal/Zip Code</label>
                            <input type="text" id="address_zip_ship_2" />
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_phone">Phone</label>
                            <input type="text" id="address_phone" />
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_amail">Email</label>
                            <input type="text" id="address_amail" />
                        </p>
                    </div>
                </div>
                <div class="checkout-section">
                    <h3 class="checkout-section__title">Shipping Details</h3>
                    <div class="row">
                        <p class="checkout-section__field col-12">
                            <label for="order_comments" class="">Order notes (optional)</label>
                            <textarea id="order_comments" name="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-5 mt__50 mb__80 mt-md-0 mb-md-0">
                <div class="order-review__wrapper">
                    <h3 class="order-review__title">Your order</h3>
                    <div class="checkout-order-review">
                        <table class="checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="product-name">Black mountain hat<strong class="product-quantity">× 1</strong>
                                    </td>
                                    <td class="product-total"><span class="cart_price">$50.00</span></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="product-name">Cream women pants<strong class="product-quantity">× 1</strong>
                                    </td>
                                    <td class="product-total"><span class="cart_price">$35.00</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal cart_item">
                                    <th>Subtotal</th>
                                    <td><span class="cart_price">$85.00</span></td>
                                </tr>
                                <tr class="cart_item">
                                    <th>Shipping</th>
                                    <td><span class="cart_price">$50.00</span></td>
                                </tr>
                                <tr class="order-total cart_item">
                                    <th>Total</th>
                                    <td><strong><span class="cart_price amount">$145.00</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="checkout-payment">
                            <ul class="payment_methods">
                                <li class="payment_method">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                                    <label for="payment_method_bacs">Direct bank transfer</label>
                                    <div class="payment_box payment_method_bacs">
                                        <p>You can pay in cash to our courier when you receive the goods at your doorstep.</p>
                                    </div>
                                </li>
                            </ul>
                            <p class="checkout-payment__policy-text">Your personal data will be used to process your order, support your experience throughout shipping process, and for other purposes described in our<a href="<?= getHTMLRoot() ?>/privacy-policy"> privacy policy</a>.
                            </p>
                            <label class="checkout-payment__confirm-terms-and-conditions">
                                <span>By proceeding means you have read and agree to our <a href="<?= getHTMLRoot()?>/terms-and-conditions" class="terms-and-conditions-link">terms and conditions</a></span>&nbsp;<span class="required">*</span>
                            </label>
                            <button type="button" class="button button_primary btn checkout-payment__btn-place-order">Place order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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