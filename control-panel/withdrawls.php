<?php
include_once('web-config.php');
getHeader("Withdrawls", "includes/header.php");
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
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Withdrawls</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    HTMLToast();
    ?>

    <div class="container-fluid">
        <form class="mt-3" action="<?= getHTMLRoot() ?>/models/investments-model" method="post">
            <fieldset class="form-fieldset">
                <legend>Withdrawl Information</legend>
                <div class="form-group">
                    <label class="d-block">Amount</label>
                    <input required name="Amount" id="Amount" type="text" class="form-control" placeholder="Enter Amount">
                </div>
                <div class="form-group">
                    <label>Person</label>
                    <select name="UserID" id="UserID" class="custom-select" required>
                        <option value="1">Shehzad</option>
                        <option value="2">Maryam</option>
                    </select>
                </div>
                <button type="button" id="SaveWithdrawl" name="SaveWithdrawl" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sales Amount</h5>
                        <h6 class="card-subtitle mb-2 text-muted">PKR <?= $SalesAmount ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cash Left</h5>
                        <h6 class="card-subtitle mb-2 text-muted">PKR <?= intval($SalesAmount) - intval($TotalWithdrawls) ?></h6>
                    </div>
                </div>
            </div>
            </div>
            <div class="row mt-3">
                
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Withdrawls</h5>
                        <h6 class="card-subtitle mb-2 text-muted">PKR <?= $TotalWithdrawls ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Maryam's Withdrawls</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo (empty($MaryamWithdrawl[0])) ? "No Data To Show" : "PKR " . $MaryamWithdrawl[0] ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Shehzad's Withdrawls</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo (empty($ShehzadWithdrawl[0])) ? "No Data To Show" : "PKR " . $ShehzadWithdrawl[0] ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h2>Withdrawls</h2>
        <div data-label="Withdrawls" class="normal-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.NO</th>
                        <th class="wd-25p">Amount</th>
                        <th class="wd-20p">Person</th>
                        <th class="wd-20p">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $WithdrawlList = $WithdrawlModel->List();
                    $SNo = 1;
                    while ($row = mysqli_fetch_array($WithdrawlList)) {
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td>PKR <?= $row['Amount'] ?></td>
                            <td><?= ($row['UserID'] == 1) ? "Shehzad" : "Maryam" ?></td>
                            <td>
                                <button class="btn btn-link dropdown-toggle" type="button" id="dropleftMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Options
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item text-primary" href="#">Edit</a>
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
<script>
    $(document).on('click', '#SaveWithdrawl', function(){
        $.ajax({
            type: "POST",
            url: "/control-panel/controllers/Withdrawl",
            data: {
                SaveWithdrawl: true,
                Amount: $("#Amount").val(),
                UserID: $("#UserID").val()
            },
            success: function(response) {
                if(response == true){
                    window.location.reload()
                }
                else{
                    var errors = JSON.parse(response)
                    $('#error-container').show()
                    $('#error').html(errors[0])
                }
            }
        })
    })
</script>