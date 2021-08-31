<?php
include_once('web-config.php');
getHeader(
    "Checkout",//page title
    "includes/header.php",//header path
    "Checkout",//pagetype
    "Moreo, Moreo.pk Buy scrunchies in pakistan",//page keywords
    "Checkout",//description
    "Checkout",//topic
    'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']//url
);
if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "" || $_SESSION['CART'] == null) {
    redirectWindow(getHTMLRoot() . "?error=Your cart is empty!");
}
if (isset($_SESSION['USER'])) {
    include_once('models/customer-model.php');
    $CustomerModel = new Customer();
    $Customer = $CustomerModel->FilterCustomerByID(base64_encode($_SESSION['USER']['PK_ID']));
}
include_once('models/product-model.php');
include_once('models/color-model.php');
include_once('models/size-model.php');
$ProductModel = new Product();
$ColorModel = new Color();
$SizeModel = new Size();
$Cart = $_SESSION['CART'];
?>
<!--cart section-->
<div class="kalles-section cart_page_section container mt__60">
    <div class="frm_cart_page check-out_calculator">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7">
                <div class="checkout-section">
                    <h3 class="checkout-section__title">Billing details</h3>
                    <div class="row">
                        <div id="errors" class="alert alert-danger checkout-section__field col-lg-12 col-12" style="display: none;"></div>
                        <p class="checkout-section__field col-lg-12 col-12">
                            <label for="f-name">Full name *</label>
                            <input required placeholder="Please type your name" type="text" id="checkout-full-name" value="<?= (isset($Customer)) ? $Customer['FullName'] : "" ?>">
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_phone">Phone *</label>
                            <input required placeholder="Please type your phone number" type="text" id="checkout-phone" value="<?= (isset($Customer)) ? $Customer['Contact'] : "" ?>" />
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_email">Email</label>
                            <input type="text" id="checkout-email" value="<?= (isset($Customer)) ? $Customer['Email'] : "" ?>" />
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_01">Shipping address *</label>
                            <input required type="text" id="checkout-shipping-address" value="<?= (isset($Customer)) ? $Customer['ShippingAddress'] : "" ?>" class="mb__20" placeholder="House number and street name">
                        </p>
                        <p class="checkout-section__field col-12">
                            <label for="address_province_ship" id="checkout-state-label">State *</label>
                            <select required id="checkout-state">
                                <option value="">Select state</option>
                                <option value="Azad Kashmir">Azad Kashmir</option>
                                <option value="Balochistan">Balochistan</option>
                                <option value="Fedrally Administrated Tribal Areas">Fedrally Administrated Tribal Areas</option>
                                <option value="Sindh">Sindh</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Gilgit Baltistan">Gilgit Baltistan</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                            </select>
                        </p>
                        <p class="checkout-section__field col-lg-12 col-12">
                            <label for="f-name">City *</label>
                            <input required placeholder="Please type your city name" type="text" id="checkout-city" value="<?= (isset($Customer)) ? $Customer['City'] : "" ?>">
                        </p>
                    </div>
                </div>
                <div class="checkout-section">
                    <h3 class="checkout-section__title">Shipping Details</h3>
                    <div class="row">
                        <p class="checkout-section__field col-12">
                            <label for="order_comments" class="">Order notes (optional)</label>
                            <textarea id="checkout-order-notes" name="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
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
                                <?php
                                $Subtotal = 0;
                                foreach ($Cart as $cartItem) {
                                    $Product = $ProductModel->FilterByProductID(base64_encode($cartItem['productId']));
                                    $Product = mysqli_fetch_array($Product);

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

                                    echo "<tr class='cart_item'>";
                                    echo "<td class='product-name'>$Product[ProductName]<strong class='product-quantity'>× $cartItem[productqty]</strong>";
                                    echo "</td>";
                                    echo "<td class='product-total'><span class='cart_price'>Rs. ";
                                    echo ($Product['PriceVary'] != 1) ? intval($Product['Price']) * intval($cartItem['productqty']) : intval($Inventory['Price']) * intval($cartItem['productqty']);
                                    echo "</span></td>";
                                    echo "</tr>";
                                    $Sub = ($Product['PriceVary'] != 1) ? intval($Product['Price']) * intval($cartItem['productqty']) : intval($Inventory['Price']) * intval($cartItem['productqty']);
                                    $Subtotal = $Subtotal + $Sub;
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
                            <ul class="payment_methods">
                                <li class="payment_method">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                                    <label for="payment_method_bacs">Cash on delivery</label>
                                    <div class="payment_box payment_method_bacs">
                                        <p>You can pay in cash to our courier when you receive the goods at your doorstep.</p>
                                    </div>
                                </li>
                            </ul>
                            <p class="checkout-payment__policy-text">Your personal data will be used to process your order, support your experience throughout shipping process, and for other purposes described in our<a href="<?= getHTMLRoot() ?>/privacy-policy"> privacy policy</a>.
                            </p>
                            <label class="checkout-payment__confirm-terms-and-conditions">
                                <span>By proceeding means you have read and agree to our <a href="<?= getHTMLRoot() ?>/terms-and-conditions" class="terms-and-conditions-link">terms and conditions</a></span>&nbsp;<span class="required">*</span>
                            </label>
                            <button type="button" id="checkout-btn" class="button button_primary btn checkout-payment__btn-place-order">Place order</button>
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