<?php
include_once('web-config.php');
getHeader("Home", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item">
                        <a href="dashboard-one.html#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sales Monitoring</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
        </div>
        <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase">
                <i data-feather="mail" class="wd-10 mg-r-5"></i>
                Email</button>
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5">
                <i data-feather="printer" class="wd-10 mg-r-5"></i>
                Print</button>
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5">
                <i data-feather="file" class="wd-10 mg-r-5"></i>
                Generate Report</button>
        </div>
    </div>

    <div class="row row-xs">
        <?php
        include_once('components/summarized-counts.php');
        include_once('components/recent-orders.php');
        include_once('components/recent-products.php');
        include_once('components/cash-summary.php');
        ?>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>