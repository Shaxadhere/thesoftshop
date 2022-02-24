<?php
include_once('web-config.php');
getHeader("Promo Codes", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Promo Codes</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    HTMLToast();
    ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Promo Code</h5>
                <form action="controllers/PromoCode" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="Title">Title</label>
                            <input type="text" name="Title" class="form-control" id="Title" placeholder="Please type title">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Code">Code</label>
                            <input type="text" name="Code" class="form-control" id="Code" placeholder="Please type code">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ReferredTo">Referred To</label>
                            <input type="text" name="ReferredTo" class="form-control" id="ReferredTo" placeholder="Please enter referers">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="UsageLimit">Usage Limit</label>
                            <input type="number" name="UsageLimit" class="form-control" id="UsageLimit" placeholder="Please enter usage limit">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ValidityStart">Validity Start</label>
                            <input type="date" name="ValidityStart" class="form-control" id="ValidityStart">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ValidityEnd">Validity End</label>
                            <input type="date" name="ValidityEnd" class="form-control" id="ValidityEnd">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="DiscountPercentage">Discount in %</label>
                            <input type="number" name="DiscountPercentage" class="form-control" id="DiscountPercentage" placeholder="Discount in %">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="DiscountAmount">Discount in Rupees</label>
                            <input type="number" name="DiscountAmount" class="form-control" id="DiscountAmount" placeholder="Discount in rupees">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="MaxDiscount">Max Discount</label>
                            <input type="number" name="MaxDiscount" class="form-control" id="MaxDiscount" placeholder="Discount limit">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Description">Description</label>
                            <input type="text" name="Description" class="form-control" id="Description" placeholder="Promo code description">
                        </div>
                    </div>
                    <button name="SavePromoCode" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <hr>
        <h2>Promo Codes</h2>
        <div data-label="PromoCodes" class="normal-table">
            <table id="normal-table" class="table">
                <thead>
                    <tr>
                        <th class="wd-5p">S.NO</th>
                        <th class="wd-25p">Title </th>
                        <th class="wd-20p">Code</th>
                        <th class="wd-20p">UsageLimit</th>
                        <th class="wd-20p">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once('models/promo-code-model.php');
                    $PromoCodeModel = new PromoCode();
                    $PromoCodeList = $PromoCodeModel->List();
                    $SNo = 1;
                    while ($row = mysqli_fetch_array($PromoCodeList)) {
                    ?>
                        <tr>
                            <td><?= $SNo ?></td>
                            <td><?= $row['Title'] ?></td>
                            <td><?= $row['Code'] ?></td>
                            <td><?= $row['UsedCount'] ?>/<?= $row['UsageLimit'] ?></td>
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