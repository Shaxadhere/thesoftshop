<?php
include_once('web-config.php');
getHeader("Thank you for your order", "includes/header.php");
if (!isset($_SESSION['LASTORDER']) || $_SESSION['LASTORDER'] == "" || $_SESSION['LASTORDER'] == null) {
    redirectWindow(getHTMLRoot() . "/errors/404");
}
if (isset($_SESSION['USER'])) {
    include_once('models/customer-model.php');
    $CustomerModel = new Customer();
    $Customer = $CustomerModel->FilterCustomerByID(base64_encode($_SESSION['USER']['PK_ID']));
}
include_once('models/product-model.php');
$ProductModel = new Product();
$LastOrder = $_SESSION['LASTORDER'];
$Invoice = $_SESSION['LASTORDER'][9];

$Subtotal = 0;
foreach ($Invoice as $invoiceItem) {
    $Product = $ProductModel->FilterByProductID(base64_encode($invoiceItem['ProductId']));
    $Product = mysqli_fetch_array($Product);
    $Subtotal = $Subtotal + intval($invoiceItem['PricePerUnit']) * intval($invoiceItem['ProductQuantity']);
}

?>
<!--cart section-->
<div class="kalles-section cart_page_section container mt__60">
    <div class="frm_cart_page check-out_calculator">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7">
                <div class="checkout-section">
                    <h3 class="checkout-section__title">Thank You! <?= $LastOrder[2] ?></h3>
                    <div class="row">
                        <div class="checkout-section__field col-lg-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="font-weight: 400;">Your order #<?= $LastOrder[1] ?> is confirmed</h5>
                                    You’ll receive an email when your order is ready.
                                </div>
                            </div>
                        </div>
                        <div class="checkout-section__field col-lg-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 style="font-weight: 400;">Customer information</h5>
                                    <div class="row mt-3">
                                        <div class="col-md-6 col-12">
                                            <b style="font-weight:600">Email</b>
                                            <p><?= $LastOrder[3] ?></p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b style="font-weight:600">Payment method</b>
                                            <p>Cash on Delivery (COD) - Rs. <?= $Subtotal + 170 ?></p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b style="font-weight:600">Shipping address</b>
                                            <p>
                                                <?= $LastOrder[2] ?><br>
                                                <?= $LastOrder[5] ?><br>
                                                <?= $LastOrder[7] ?><br>
                                                <?= $LastOrder[8] ?><br>
                                                <?= $LastOrder[4] ?><br>
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                        <b style="font-weight:600">Billing address</b>
                                            <p>
                                                <?= $LastOrder[2] ?><br>
                                                <?= $LastOrder[5] ?><br>
                                                <?= $LastOrder[7] ?><br>
                                                <?= $LastOrder[8] ?><br>
                                                <?= $LastOrder[4] ?><br>
                                            </p>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <button type="button" class="button" onclick="location.href='<?= getHTMLRoot() ?>/shop'">Continue Shopping</button>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                foreach ($Invoice as $invoiceItem) {
                                    $Product = $ProductModel->FilterByProductID(base64_encode($invoiceItem['ProductId']));
                                    $Product = mysqli_fetch_array($Product);
                                    echo "<tr class='cart_item'>";
                                    echo "<td class='product-name'>$Product[ProductName]<strong class='product-quantity'>× $invoiceItem[ProductQuantity]</strong>";
                                    echo "</td>";
                                    echo "<td class='product-total'><span class='cart_price'>Rs. " . intval($invoiceItem['PricePerUnit']) * intval($invoiceItem['ProductQuantity']) . "</span></td>";
                                    echo "</tr>";
                                    $Subtotal = $Subtotal + intval($invoiceItem['PricePerUnit']) * intval($invoiceItem['ProductQuantity']);
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