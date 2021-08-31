<?php
include_once('web-config.php');
include_once('models/order-model.php');
$OrderModel = new Order();
$Orders = $OrderModel->List();

$OrdersCount = mysqli_num_rows($Orders);
$LastWeekOrders = $OrderModel->ListFromDateToDate(date('Y-m-d', strtotime('-7 days')), date('Y-m-d'));
$LastWeekOrdersCount = mysqli_num_rows($LastWeekOrders);
$FrequentCities = $OrderModel->ListFrequentCities();
$FrequentCity = array();
while($row = mysqli_fetch_array($FrequentCities)){
    array_push($FrequentCity, $row['CustomerCity']);
}

$SalesAmount = 0;
foreach ($Orders as $row) {
    $TotalProductsWithQuantity = json_decode($row['ProductsWithQuantity'], true);
    $Bill = 0;
    foreach ($TotalProductsWithQuantity as $item) {
        $Bill = $Bill + (intval($item['ProductQuantity']) * intval($item['PricePerUnit']));
    }
    $SalesAmount = $SalesAmount + $Bill;
}

include_once('models/investments-model.php');

$InvestmentModel = new Investment();
$fetched = $InvestmentModel->List();

$MaryamInv = $InvestmentModel->InvCount(2);
$MaryamInv = mysqli_fetch_array($MaryamInv);

$ShehzadInv = $InvestmentModel->InvCount(1);
$ShehzadInv = mysqli_fetch_array($ShehzadInv);

$TotalInvestments = intval($MaryamInv[0]) + intval($ShehzadInv[0]);
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
    </div>
</div>
<div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Most Frequent Cities</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1"><?= $FrequentCity[0] ?></h3>
            <p class="tx-11 tx-color-03 mg-b-0">
                <span class="tx-medium tx-primary">
                    <?php unset($FrequentCity[0]) ?>
                    <?= implode(", ", $FrequentCity) ?>
                </span>
            </p>
        </div>
    </div>
</div>
<div class="col-sm-6 col-lg-3">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Sales Amount</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-primary tx-rubik mg-b-0 mg-r-5 lh-1">PKR <?= $SalesAmount ?></h3>
        </div>
    </div>
</div>
<div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
    <div class="card card-body">
        <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-8">Total Investments</h6>
        <div class="d-flex d-lg-block d-xl-flex align-items-end">
            <h3 class="tx-normal tx-rubik mg-b-0 mg-r-5 lh-1">PKR <?= $TotalInvestments ?></h3>
        </div>
    </div>
</div>