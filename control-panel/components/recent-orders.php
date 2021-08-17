<!-- col -->
<div class="col-md-6 col-xl-4 mg-t-10 mt-5">
    <div class="card ht-100p">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">Recent Orders</h6>
            <div class="d-flex tx-18">
                <a href="<?= getHTMLRoot() ?>" class="link-03 lh-0">
                    <i class="icon ion-md-refresh"></i>
                </a>
            </div>
        </div>
        <ul class="list-group list-group-flush tx-13">
            <?php
            include_once('models/order-model.php');
            $OrderModel = new Order();
            $OrderList = $OrderModel->List();
            $SNo = 1;
            foreach ($OrderList as $row) {
                $TotalProductsWithQuantity = json_decode($row['ProductsWithQuantity'], true);
                $Bill = 0;
                foreach ($TotalProductsWithQuantity as $item) {
                    $Bill = $Bill + (intval($item['ProductQuantity']) * intval($item['PricePerUnit']));
                }
                $Bill = $Bill + intval($row['DeliveryCost']);
            ?>

                <li class="list-group-item d-flex pd-sm-x-20">
                    <div class="avatar d-none d-sm-block">
                        <span class="avatar-initial rounded-circle bg-teal">
                            <i class="icon ion-md-checkmark"></i>
                        </span>
                    </div>
                    <div class="pd-sm-l-10">
                        <p class="tx-medium mg-b-0"><?= $row['CustomerName'] ?></p>
                        <small class="tx-12 tx-color-03 mg-b-0"><?= date('M d, Y, h:i A', strtotime($row['CreatedAt'])) ?></small>
                    </div>
                    <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-0">PKR. <?= $Bill ?></p>
                        <small class="tx-12 tx-success mg-b-0"><?= $row['OrderStatus'] ?></small>
                    </div>
                </li>
            <?php
            $SNo++;
            if($SNo === 7){
                break;
            }
            }
            ?>
        </ul>
        <div class="card-footer text-center tx-13">
            <a href="<?= getHTMLRoot() ?>/orders" class="link-03">View All Orders
                <i class="icon ion-md-arrow-down mg-l-5"></i>
            </a>
        </div>
        <!-- card-footer -->
    </div>
    <!-- card -->
</div>
