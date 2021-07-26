<?php
include_once('web-config.php');
getHeader("Add Investments", 'includes/header.php');
?>

<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Investments</li>
                </ol>
            </nav>
        </div>
    </div>
    <form class="mt-5" action="<?= getHTMLRoot() ?>/models/investments-model" method="post">
        <fieldset class="form-fieldset">
            <legend>Investment Information</legend>
            <div class="form-group">
                <label class="d-block">Reason</label>
                <input required name="Reason" type="text" class="form-control" placeholder="Enter Reason of Investment">
            </div>
            <div class="form-group">
                <label class="d-block">Amount</label>
                <input required name="Amount" type="text" class="form-control" placeholder="Enter Amount">
            </div>
            <div class="form-group">
                <label>Person</label>
                <select name="FK_User" class="custom-select" required>
                    <option value="1">Shehzad</option>
                    <option value="2">Maryam</option>
                </select>
            </div>
            <button type="submit" name="addInvestments" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</div>
<?php
getFooter('includes/footer.php');
?>