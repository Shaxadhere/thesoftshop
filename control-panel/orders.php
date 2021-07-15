<?php
include_once('web-config.php');
getHeader("Orders", "includes/header.php");
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
                    include_once('models/order-model.php');
                    $OrderModel = new Order();
                    $OrderList = $OrderModel->List();
                    $SNo = 1;
                    while ($row = mysqli_fetch_array($OrderList)) {
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
                                    <a class="dropdown-item text-primary" href="#modal4" data-toggle="modal">View Details</a>
                                    <a class="dropdown-item text-primary" href="#modal4" data-toggle="modal">Edit</a>
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
<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel4">Modal Title</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-5 d-flex align-items-center justify-content-between">
                                    <span>Order No : <a href="#">#5355619</a></span>
                                    <span class="badge bg-success">Completed</span>
                                </div>
                                <div class="row mb-5 g-4">
                                    <div class="col-md-3 col-sm-6">
                                        <p class="tx-bold">Created at</p>
                                        16-06-2021 04:23 PM
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <p class="tx-bold">Name</p>
                                        Shehzad Ahmed
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <p class="tx-bold">Email</p>
                                        <a href="mailto:shaxad.here@gmail.com">shaxad.here@gmail.com</a>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <p class="tx-bold">Contact No</p>
                                        03032804856
                                    </div>
                                </div>
                                <div class="row g-4">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body d-flex flex-column gap-3">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="mb-0">Delivery Address</h5>
                                                </div>
                                                <div>143/03, Creek Road</div>
                                                <div>Karachi</div>
                                                <div>
                                                    <i class="bi bi-telephone me-2"></i> 03032804856
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body d-flex flex-column gap-3">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="mb-0">Billing Address</h5>
                                                </div>
                                                <div>143/03, Creek Road</div>
                                                <div>Karachi</div>
                                                <div>
                                                    <i class="bi bi-telephone me-2"></i> 03032804856
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../uploads/product-images/1111111111111111.png" class="rounded" width="60" height="60" alt="..." style="object-fit:cover">
                                                    </a>
                                                </td>
                                                <td>PETITE Moon Necklace</td>
                                                <td>3</td>
                                                <td>Rs. 150</td>
                                                <td>Rs. 450</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../uploads/product-images/1111111111111111.png" class="rounded" width="60" height="60" alt="..." style="object-fit:cover">
                                                    </a>
                                                </td>
                                                <td>Butterfly Necklace</td>
                                                <td>3</td>
                                                <td>Rs. 150</td>
                                                <td>Rs. 450</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../uploads/product-images/1111111111111111.png" class="rounded" width="60" height="60" alt="..." style="object-fit:cover">
                                                    </a>
                                                </td>
                                                <td>Silk Scrunchie</td>
                                                <td>3</td>
                                                <td>Rs. 150</td>
                                                <td>Rs. 450</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Price</h6>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-4 text-end">Sub Total :</div>
                                    <div class="col-4">$1.520,96</div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-4 text-end">Shipping :</div>
                                    <div class="col-4">Free</div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-4 text-end">Tax(18%) :</div>
                                    <div class="col-4">$273,77</div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-4 text-end">
                                        <strong>Total :</strong>
                                    </div>
                                    <div class="col-4">
                                        <strong>$1.794,73</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Invoice</h6>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-6 text-end">Invoice No :</div>
                                    <div class="col-6">
                                        <a href="#">#5355619</a>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-6 text-end">Seller GST :</div>
                                    <div class="col-6">12HY87072641Z0</div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-6 text-end">Purchase GST :</div>
                                    <div class="col-6">22HG9838964Z1</div>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-outline-primary">Download PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tx-13">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>
<script>
    $('#modal4').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)

    })
</script>