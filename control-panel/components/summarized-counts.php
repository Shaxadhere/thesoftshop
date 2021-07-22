<?php
include_once('web-config.php');
include_once('models/order-model.php');
$OrderModel = new Order();
$Orders = $OrderModel->List();
$OrdersCount = mysqli_num_rows($Orders);
$LastWeekOrders = $OrderModel->ListFromDateToDate(date('Y-m-d H:i:s', strtotime('-7 days')), date('Y-m-d H:i:s'));
$LastWeekOrdersCount = mysqli_num_rows($LastWeekOrders);
?>
<div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Order Quantity</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $OrdersCount ?></h3>
            <p class="tx-11 tx-color-03 mg-b-0">
                <span class="tx-medium tx-success"><?= $LastWeekOrdersCount ?>
                </span>
                in last seven days
            </p>
        </div>
        <div class="chart-three">
            <div id="flotChart6" class="flot-chart ht-30"></div>
        </div>
        <!-- chart-three -->
    </div>
</div>
<div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Avg. Value</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">$306.20</h3>
            <p class="tx-11 tx-color-03 mg-b-0">
                <span class="tx-medium tx-danger">0.3%
                    <i class="icon ion-md-arrow-down"></i>
                </span>
                than last week
            </p>
        </div>
        <div class="chart-three">
            <div id="flotChart5" class="flot-chart ht-30"></div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-lg-3">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Conversion Rate</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">0.81%</h3>
            <p class="tx-11 tx-color-03 mg-b-0">
                <span class="tx-medium tx-success">1.2%
                    <i class="icon ion-md-arrow-up"></i>
                </span>
                than last week
            </p>
        </div>
        <div class="chart-three">
            <div id="flotChart3" class="flot-chart ht-30"></div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Unique Purchases</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">3,137</h3>
            <p class="tx-11 tx-color-03 mg-b-0">
                <span class="tx-medium tx-danger">0.7%
                    <i class="icon ion-md-arrow-down"></i>
                </span>
                than last week
            </p>
        </div>
        <div class="chart-three">
            <div id="flotChart4" class="flot-chart ht-30"></div>
        </div>
    </div>
</div>