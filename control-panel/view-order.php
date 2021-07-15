<?php
include_once('web-config.php');
getHeader("Orders", "includes/header.php");
include_once('models/order-model.php');
include_once('models/product-model.php');

$OrderModel = new Order();
$ProductModel = new Product();

if (!isset($_REQUEST['order'])) {
    redirectWindow(getHTMLRoot() . "/orders");
    exit();
}
$OrderID = $_REQUEST['order'];
$OrderDetails = $OrderModel->View($OrderID);
$OrderDetails = mysqli_fetch_array($OrderDetails);
$ProductsWithQuantity = json_decode($OrderDetails['ProductsWithQuantity'], true);
$Products = array();
$Subtotal = 0;
foreach ($ProductsWithQuantity as $product) {
    $SingleProduct = $ProductModel->View(base64_encode($product['ProductId']));
    $SingleProduct = mysqli_fetch_array($SingleProduct);
    $Subtotal = $Subtotal + (intval($product['PricePerUnit']) * intval($product['ProductQuantity']));
    array_push($Products, $SingleProduct);
}


for ($i = 0; $i < count($Products); $i++) {
}
?>

<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/orders" ?>">Orders</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Order</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <span>Order No : <a href="#" id="order-number">#<?= $OrderDetails['OrderNumber'] ?></a></span>
                            <span class="badge bg-success" id="order-status"><?= $OrderDetails['OrderStatus'] ?></span>
                        </div>
                        <div class="row mb-5 g-4">
                            <div class="col-md-3 col-sm-6">
                                <p class="tx-bold">Created at</p>
                                <span id="created-at"><?= date('D d m,Y H:i A', strtotime($OrderDetails['CreatedAt'])) ?></span>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <p class="tx-bold">Name</p>
                                <span id="customer-name"><?= $OrderDetails['CustomerName'] ?></span>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <p class="tx-bold">Email</p>
                                <a href="mailto:<?= $OrderDetails['CustomerEmail'] ?>" id="customer-email"><?= $OrderDetails['CustomerEmail'] ?></a>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <p class="tx-bold">Contact No</p>
                                <span id="customer-contact"><?= $OrderDetails['CustomerContact'] ?></span>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-0">Delivery Address</h5>
                                        </div>
                                        <div id="delivery-address">
                                            <div><?= $OrderDetails['CustomerShippingAddress'] ?> <?= $OrderDetails['CustomerCity'] ?>, <?= $OrderDetails['State'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-0">Billing Address</h5>
                                        </div>
                                        <div id="billing-address">
                                            <div><?= $OrderDetails['CustomerBillingAddress'] ?> <?= $OrderDetails['CustomerCity'] ?>, <?= $OrderDetails['State'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select class="custom-select">
                                    <option value="Recieved" <?= ($OrderDetails['OrderStatus'] == "Recieved") ? "selected" : "" ?>>Recieved</option>
                                    <option value="Preparing" <?= ($OrderDetails['OrderStatus'] == "Preparing") ? "selected" : "" ?>>Preparing</option>
                                    <option value="Shipped" <?= ($OrderDetails['OrderStatus'] == "Shipped") ? "selected" : "" ?>>Shipped</option>
                                    <option value="Delivered" <?= ($OrderDetails['OrderStatus'] == "Delivered") ? "selected" : "" ?>>Delivered</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <button style="width:100%" type="button" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Price</h6>
                        <div class="row justify-content-center mb-3">
                            <div class="col-6 text-end">Sub Total :</div>
                            <div class="col-6" id="sub-total">Rs. <?= $Subtotal ?></div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-6 text-end">Shipping :</div>
                            <div class="col-6" id="shipping-price">Rs. <?= getShippingCharges() ?></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6 text-end">
                                <strong>Total :</strong>
                            </div>
                            <div class="col-6">
                                <strong id="total-price">Rs. <?= $Subtotal + getShippingCharges() ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title mb-4">Order Notes</h6>
                        <span id="order-notes">
                            <?= $OrderDetails['OrderNotes'] ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card widget">
                    <h5 class="card-header">Order Items</h5>
                    <div class="card-body">
                        <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                            <table class="table table-custom mb-0">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="products">
                                    <?php
                                    for ($i = 0; $i < count($Products); $i++) {
                                        $ProductImages = json_decode($Products[$i]['ProductImages']);
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="../uploads/product-images/<?= $ProductImages[0] ?>" class="rounded" width="60" height="60" alt="..." style="object-fit:cover">
                                                </a>
                                            </td>
                                            <td>
                                                <div class="tx-bold">
                                                    <?= $Products[$i]['ProductName'] ?>
                                                </div>
                                                <div style="color:grey">
                                                    Color: <?= $ProductsWithQuantity[$i]['ProductColor'] ?> | Size: <?= $ProductsWithQuantity[$i]['ProductSize'] ?>
                                                </div>
                                            </td>
                                            <td><?= $ProductsWithQuantity[$i]['ProductQuantity'] ?></td>
                                            <td>Rs. <?= $ProductsWithQuantity[$i]['PricePerUnit'] ?></td>
                                            <td>Rs. <?= intval($ProductsWithQuantity[$i]['ProductQuantity']) * intval($ProductsWithQuantity[$i]['PricePerUnit']) ?></td>
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
?>