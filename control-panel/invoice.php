<?php
include_once('web-config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="<?= getHTMLRoot() ?>/assets/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/lib/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/dashforge.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/dashforge.dashboard.css">
    <link href="<?= getHTMLRoot() ?>/assets/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/bootstrap-tagsinput.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<style>
    * {
        font-family: "Calibri"
    }
</style>

<body>
    <div class="container-fluid" style="border: 22px solid pink;height: 845px;text-align-last: center;">
        <img class="mt-4" src="<?= getHTMLRoot() ?>/assets/inv-logo.png" style="width: 27em;" />
        <h6 class="tx-light tx-spacing-4 mt-2">EXPLORE YOUR AESTHETIC</h6>
        <div class="row mt-4">
            <div class="col-4" style="text-align-last: left;padding-left: 35px;">
                <h5 class="tx-bold tx-spacing-4">ISSUED TO</h5>
                <p>Shehzad Ahmed</p>
            </div>
            <div class="col-4" style="text-align-last: center;">
                <h5 class="tx-bold tx-spacing-4">ORDER NO.</h5>
                <p>1554849632</p>
            </div>
            <div class="col-4" style="text-align-last: right;padding-right: 35px;">
                <h5 class="tx-bold tx-spacing-4">DATE ISSUED</h5>
                <p>13-Sept-2021</p>
            </div>
        </div>
    </div>
</body>

</html>