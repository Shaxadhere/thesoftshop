<?php
include_once('web-config.php');
getHeader("My orders", "includes/header.php");
if (!isset($_SESSION['USER'])) {
    redirectWindow(getHTMLRoot());
}
include_once('models/customer-model.php');
$CustomerModel = new Customer();
$Customer = $CustomerModel->FilterCustomerByID(base64_encode($_SESSION['USER']['PK_ID']));
if (!isset($Customer)) {
    redirectWindow(getHTMLRoot());
}
?>
<style>
    table,
    td {
        border: unset !important;
    }

    tr {
        border-bottom: 1px solid #dee2e6 !important;
    }
</style>
<!--shop banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/slide/banner21.jpg"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">My Orders</h1>
            <p class="mg__0"></p>
        </div>
    </div>
</div>
<!--end shop banner-->
<div class="nt_section type_featured_collection tp_se_cdt">
    <div class="kalles-otp-01__feature container">
        <div id="root" class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">
            <div class="col-lg-9 col-md-9 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                <div class="product-inner pr">
                    <div class="card" style="width: 102%;">
                        <div class="card-body">
                            <div style="display:flex">
                            </div>
                            <table class="table table-custom mb-0">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Placed On</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody id="orders">
                                    <?php
                                    $OrderHistory = json_decode($Customer['OrderHistory']);
                                    if($OrderHistory == null || $OrderHistory == ""){
                                        $OrderHistory = array();
                                    }
                                    $OrderHistory = array_reverse($OrderHistory);
                                    
                                    include_once('models/order-model.php');
                                    include_once('models/product-model.php');

                                    $OrderModel = new Order();
                                    $ProductModel = new Product();
                                    if(count($OrderHistory) == 0){
                                        echo " <tr><td>You do not have any orders yet</td></tr>";
                                    }
                                    foreach ($OrderHistory as $item) {
                                        $Order = $OrderModel->FilterByOrderNumber($item);
                                        $Order = mysqli_fetch_array($Order);
                                        $ProductsWithQuantity = json_decode($Order['ProductsWithQuantity'], true);
                                        $Subtotal = 0;
                                        foreach ($ProductsWithQuantity as $product) {
                                            $SingleProduct = $ProductModel->View(base64_encode($product['ProductId']));
                                            $SingleProduct = mysqli_fetch_array($SingleProduct);
                                            $Subtotal = $Subtotal + (intval($product['PricePerUnit']) * intval($product['ProductQuantity']));
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $Order['OrderNumber'] ?></td>
                                            <td><?= date('D d m, Y h:i A', strtotime($Order['CreatedAt'])) ?></td>
                                            <td><?= $Order['OrderStatus'] ?></td>
                                            <td>Rs. <?= $Subtotal ?></td>
                                            <td><a href="view-order?order-number=<?= $Order['OrderNumber'] ?>">View</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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