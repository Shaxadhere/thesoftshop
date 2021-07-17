<?php
include_once('web-config.php');
getHeader("My Account", "includes/header.php");
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
            <h1 class="mb__5 cw">Manage My Account</h1>
            <p class="mg__0"></p>
        </div>
    </div>
</div>
<!--end shop banner-->
<!-- featured collection -->
<div class="nt_section type_featured_collection tp_se_cdt">
    <div class="kalles-otp-01__feature container">
        <div id="root" class="products nt_products_holder row fl_center row_pr_1 cdt_des_5 round_cd_true nt_cover ratio_nt position_8 space_30">
            <div class="col-lg-3 col-md-6 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                <div class="product-inner pr">
                    <div class="card" style="width: 18rem; height:185px">
                        <div class="card-body">
                            <div style="display:flex">
                                <h5 class="card-title">Personal Profile</h5><a id="edit-personal-profile" style="padding: 10px 0px 0px 10px; color:#56cfe1" href="#" class="card-link">Edit</a>
                            </div>
                            <p class="card-text" style="margin-bottom:1px !important"><?= $Customer['FullName'] ?></p>
                            <p class="card-text" style="margin-bottom:1px !important"><?= $Customer['Email'] ?></p>
                            <p class="card-text" style="margin-bottom:1px !important"><?= $Customer['Contact'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                <div class="product-inner pr">
                    <div class="card" style="width: 18rem; height:185px">
                        <div class="card-body">
                            <div style="display:flex">
                                <h5 class="card-title">Shipping Address</h5><a id="edit-shipping-address" style="padding: 10px 0px 0px 10px; color:#56cfe1" href="#" class="card-link">Edit</a>
                            </div>
                            <p class="card-text"><?= (empty($Customer['ShippingAddress'])) ? "No addresses" : $Customer['ShippingAddress'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                <div class="product-inner pr">
                    <div class="card" style="width: 18rem; height:185px">
                        <div class="card-body">
                            <div style="display:flex">
                                <h5 class="card-title">Billing Address</h5><a id="edit-billing-address" style="padding: 10px 0px 0px 10px; color:#56cfe1" href="#" class="card-link">Edit</a>
                            </div>
                            <p class="card-text"><?= (empty($Customer['BillingAddress'])) ? "No addresses" : $Customer['BillingAddress'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                <div class="product-inner pr">
                    <div class="card" style="width: 102%;">
                        <div class="card-body">
                            <div style="display:flex">
                                <h5 class="card-title">Recent Orders</h5><a id="view-recent-orders" style="padding: 10px 0px 0px 10px; color:#56cfe1" href="<?= getHTMLRoot() ?>/my-orders" class="card-link">View All</a>
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
                                    $OrderHistory = array_reverse($OrderHistory);
                                    include_once('models/order-model.php');
                                    $OrderModel = new Order();
                                    foreach ($OrderHistory as $item) {
                                        $Order = $OrderModel->FilterByOrderNumber($item);
                                        $Order = mysqli_fetch_array($Order);
                                    ?>
                                        <tr>
                                            <td><?= $Order['OrderNumber'] ?></td>
                                            <td><?= date('D d m, Y h:i A', strtotime($Order['CreatedAt'])) ?></td>
                                            <td><?= $Order['OrderStatus'] ?></td>
                                            <td>Rs. 999<?= "" ?></td>
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
<!-- end featured collection -->
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