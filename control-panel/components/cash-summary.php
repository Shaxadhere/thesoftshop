<?php
include_once('models/order-model.php');
$OrderModel = new Order();
$OrderList = $OrderModel->List();
$SalesAmount = 0;
foreach ($OrderList as $row) {
    $TotalProductsWithQuantity = json_decode($row['ProductsWithQuantity'], true);
    $Bill = 0;
    foreach ($TotalProductsWithQuantity as $item) {
        $Bill = $Bill + (intval($item['ProductQuantity']) * intval($item['PricePerUnit']));
    }

    $SalesAmount = $SalesAmount + $Bill;
}

include_once('models/withdrawl-model.php');
$WithdrawlModel = new Withdrawl();
$MaryamWithdrawl = $WithdrawlModel->WithdrawlCount(base64_encode(2));
if ($MaryamWithdrawl != false) {
    $MaryamWithdrawl = mysqli_fetch_array($MaryamWithdrawl);
}

$ShehzadWithdrawl = $WithdrawlModel->WithdrawlCount(base64_encode(1));
if ($ShehzadWithdrawl != false) {
    $ShehzadWithdrawl = mysqli_fetch_array($ShehzadWithdrawl);
}

$TotalWithdrawls = intval($MaryamWithdrawl[0]) + intval($ShehzadWithdrawl[0]);

?>
<div class="col-md-8 col-sm-12 mt-5">
    <div class="card">
        <div class="card-header pd-y-20 d-md-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">Cash Left / Withdrawls</h6>
            <ul class="list-inline d-flex mg-t-20 mg-sm-t-10 mg-md-t-0 mg-b-0">
                <li class="list-inline-item d-flex align-items-center">
                    <span class="d-block wd-10 ht-10 bg-primary rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Withdrawl</span>
                </li>
                <li class="list-inline-item d-flex align-items-center mg-l-5">
                    <span class="d-block wd-10 ht-10 bg-success rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Cash Left</span>
                </li>
            </ul>
        </div>
        <div class="card-body pos-relative">
            <div class="row">
                <div class="col-sm-5">
                    <h3 class="tx-primary tx-rubik tx-spacing--2 mg-b-5">PKR <?= $TotalWithdrawls ?></h3>
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">Total Withdrawl</h6>
                    <p class="mg-b-0 tx-12 tx-color-03">Sum of total cash withdrawl from moreo balance</p>
                </div>
                <div class="col-sm-5 mg-t-20 mg-sm-t-0">
                    <h3 class="tx-success tx-rubik tx-spacing--2 mg-b-5">PKR <?= intval($SalesAmount) - intval($TotalWithdrawls) ?></h3>
                    <h6 class="tx-uppercase tx-11 tx-spacing-1 tx-color-02 tx-semibold mg-b-10">Cash Left</h6>
                    <p class="mg-b-0 tx-12 tx-color-03">Cash left in the moreo account, difference between sales amount and withdrawl cash</p>
                </div>
            </div>
        </div>
    </div>
</div>