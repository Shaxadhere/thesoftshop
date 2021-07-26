<?php
include_once('web-config.php');
getHeader("Investments", 'includes/header.php');
include_once('models/investments-model.php');

$model = new Investment();
$fetched = $model->List();

$MaryamInv = $model->InvCount(2);
$MaryamInv = mysqli_fetch_array($MaryamInv);

$ShehzadInv = $model->InvCount(1);
$ShehzadInv = mysqli_fetch_array($ShehzadInv);

$TotalInvestments = intval($MaryamInv[0]) + intval($ShehzadInv[0]);

$error = "";
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>

<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Investments</li>
                </ol>
            </nav>
        </div>
    </div>

<a class="btn btn-primary mb-3" href="add-investments"><i data-feather="plus"></i> Add Investments</a>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Investment</h5>
                <h6 class="card-subtitle mb-2 text-muted">PKR <?= $TotalInvestments ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Maryam's Investment</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo (empty($MaryamInv[0])) ? "No Data To Show" : "PKR " . $MaryamInv[0] ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Shehzad's Investment</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo (empty($ShehzadInv[0])) ? "No Data To Show" : "PKR " . $ShehzadInv[0] ?></h6>
            </div>
        </div>
    </div>
</div>
<br>

<div data-label="MyTable" class="df-example demo-table">
    <table id="mytable" class="table">
        <thead>
            <tr>
                <th class="wd-5p">S.No</th>
                <th class="wd-30p">Reason</th>
                <th class="wd-5p">Amount</th>
                <th class="wd-20p">Person</th>
                <th class="wd-20p">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $Sno = 1;
            while ($row = mysqli_fetch_array($fetched)) {
            ?>
                <tr>
                    <td><?= $Sno ?></td>
                    <td><?= $row['Reason'] ?></td>
                    <td><?= $row['Amount'] ?></tdal>
                    <td><?php echo ($row['FK_User'] == '1') ? "Shehzad" : "Maryam" ?></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <a id="btnGroupDrop" href="#" type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <span class="dropdown-item">
                                        <a href="InvestmentEdit?uuid=<?= base64_encode($row['PK_ID']) ?>" class="text-primary">Edit</a>
                                    </span>
                                    <span class="dropdown-item">
                                        <a href="InvestmentDelete?uuid=<?= base64_encode($row['PK_ID']) ?>" class="text-danger">Delete</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
                $Sno++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php
getFooter('includes/footer.php');
?>

<script>
    $('#mytable').DataTable({
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });
</script>