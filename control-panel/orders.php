<?php
include_once('web-config.php');
getHeader("Orders", "includes/header.php");
include_once('models/order-model.php');
$OrderModel = new Order();
$OrderList = $OrderModel->List();
$TotalAmount = 0;
$DCAmount = 0;
$ProfitAmount = 0;
foreach ($OrderList as $row) {}
?>

<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profit Amount</h5>
                        <h6 class="card-subtitle mb-2 text-muted">PKR <?= $ProfitAmount ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delivery Charges Amount</h5>
                        <h6 class="card-subtitle mb-2 text-muted">PKR <?= $DCAmount ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Amount</h5>
                        <h6 class="card-subtitle mb-2 text-muted">PKR <?= $TotalAmount ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <h2>Orders</h2>
        <div data-label="Categories" class="normal-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.NO</th>
                        <th class="wd-15p">Order Number</th>
                        <th class="wd-25p">Customer Name</th>
                        <th class="wd-25p">Customer Contact</th>
                        <th class="wd-20p">Status</th>
                        <th class="wd-20p">Bill</th>
                        <th class="wd-20p">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SNo = 1;
                    foreach ($OrderList as $row) {
                        $TotalProductsWithQuantity = json_decode($row['ProductsWithQuantity'], true);
                        $Bill = 0;
                        foreach ($TotalProductsWithQuantity as $item) {
                            $Bill = $Bill + (intval($item['ProductQuantity']) * intval($item['PricePerUnit']));
                        }
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td><?= $row['OrderNumber'] ?></td>
                            <td><?= $row['CustomerName'] ?></td>
                            <td><?= $row['CustomerContact'] ?></td>
                            <td><?= $row['OrderStatus'] ?></td>
                            <td>Rs. <?= $Bill ?></td>
                            <td>
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropleftMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-primary" href="view-order?order=<?= base64_encode($row['PK_ID']) ?>">View Details</a>
                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                    <div class="wd-200 pd-15">
                                        <p><strong>Created By:</strong>Admin</p>
                                        <p class="mb-0"><strong>Created At:</strong><?= $row['CreatedAt'] ?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $SNo++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>