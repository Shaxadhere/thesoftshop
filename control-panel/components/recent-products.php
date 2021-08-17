<div class="col-md-6 col-xl-4 mg-t-10 mt-5">
    <div class="card ht-100p">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">Recent Products</h6>
            <div class="d-flex align-items-center tx-18">
                <a href="<?= getHTMLRoot() ?>" class="link-03 lh-0">
                    <i class="icon ion-md-refresh"></i>
                </a>
            </div>
        </div>
        <ul class="list-group list-group-flush tx-13">
            <?php
            include_once('models/product-model.php');
            $ProductModel = new Product();
            $ProductList = $ProductModel->List();
            $SNo = 1;
            while ($row = mysqli_fetch_array($ProductList)) {
                $ProductDetails = $ProductModel->FilterWithAttributesByProductID(base64_encode($row['PK_ID']));
                $Colors = array();
                $ColorCodes = array();
                $Sizes = array();
                $PriceVarient = array();
                $ProductImages = json_decode($row['ProductImages'], true);
                while ($Deatil = mysqli_fetch_array($ProductDetails)) {
                    array_push($Colors, $Deatil['ColorName']);
                    array_push($ColorCodes, $Deatil['ColorCode']);
                    array_push($Sizes, $Deatil['SizeValue']);
                    array_push($PriceVarient, $Deatil['PriceVarient']);
                }
                $ProductDetailsCount = count($PriceVarient);
            ?>
                <li class="list-group-item d-flex pd-x-20">
                    <div class="avatar"><img src="../uploads/product-images/<?= $ProductImages[0] ?>" class="rounded-circle" alt=""></div>
                    <div class="pd-l-10">
                        <p class="tx-medium mg-b-0"><?= $row['ProductName'] ?></p>
                        <small class="tx-12 tx-color-03 mg-b-0"><?= (isset($Sizes[1]) ? "Sizes vary" : "Standard sized") ?></small>
                    </div>
                    <div class="mg-l-auto text-right">
                        <p class="tx-medium mg-b-0">PKR. <?= ($row['PriceVary'] != 1) ? $row['Price'] : $PriceVarient[0] . " - " . $PriceVarient[intval($ProductDetailsCount) - 1] ?></p>
                        <small class="tx-12 tx-success mg-b-0"><?= (isset($Colors[1]) ? "Colors vary" : "Single Color") ?></small>
                    </div>
                </li>
            <?php
                $SNo++;
                if($SNo == 7){
                    break;
                }
            }
            ?>
        </ul>
        <div class="card-footer text-center tx-13">
            <a href="<?= getHTMLRoot() ?>/products" class="link-03">View All Products
                <i class="icon ion-md-arrow-down mg-l-5"></i>
            </a>
        </div>
        <!-- card-footer -->
    </div>
    <!-- card -->
</div>
<div class="col-md-6 col-xl-4 mg-t-10 mt-5">
    <div class="card ht-lg-100p">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h6 class="mg-b-0">Real-Time Sales</h6>
            <ul class="list-inline d-flex mg-b-0">
                <li class="list-inline-item d-flex align-items-center">
                    <span class="d-block wd-10 ht-10 bg-df-2 rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Today</span>
                </li>
                <li class="list-inline-item d-flex align-items-center mg-l-10">
                    <span class="d-block wd-10 ht-10 bg-df-3 rounded mg-r-5"></span>
                    <span class="tx-sans tx-uppercase tx-10 tx-medium tx-color-03">Yesterday</span>
                </li>
            </ul>
        </div>
        <!-- card-header -->
        <div class="card-body pd-b-0">
            <div class="row mg-b-20">
                <div class="col">
                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-10">$150,200
                        <small class="tx-11 tx-success letter-spacing--2">
                            <i class="icon ion-md-arrow-up"></i>
                            0.20%</small>
                    </h4>
                    <p class="tx-11 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Total Sales</p>
                </div>
                <div class="col">
                    <h4 class="tx-normal tx-rubik tx-spacing--1 mg-b-10">$21,880
                        <small class="tx-11 tx-danger letter-spacing--2">
                            <i class="icon ion-md-arrow-down"></i>
                            1.04%</small>
                    </h4>
                    <p class="tx-11 tx-uppercase tx-spacing-1 tx-medium tx-color-03">Avg. Sales Per Day</p>
                </div>
            </div>
            <div class="chart-five">
                <div>
                    <canvas id="chartBar1"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>