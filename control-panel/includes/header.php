<?php
include_once('web-config.php');
session_start();
if (!isset($_SESSION['ADMIN'])) {
    redirectWindow("auth/index?error=you must login to continue");
}

include_once('models/user-model.php');
$UserModel = new User();
$User = $UserModel->FetchUser(base64_encode($_SESSION['ADMIN']['PK_ID']));
$User = mysqli_fetch_array($User);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Moreo.pk Admin Panel">
    <meta name="author" content="Shehzad Ahmed">
    <link rel="shortcut icon" type="image/x-icon" href="<?= getHTMLRoot() ?>/assets/moreo-dashboard-icon.png">
    <title>Dashboard | Moreo.pk</title>
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
    <style>
        .ui-state-highlight {
            max-width: 16.66667% !important;
            width: 100%;
            height: 138px !important;
        }

        .select2-selection__choice {
            background-color: #0168fa !important;
            border: transparent !important;
            border-radius: 0.1875rem !important;
            padding: 3px 10px 3px 20px !important;
        }

        .select2-search select2-search--inline {
            padding: 0 0 0 13px !important;
        }

        td {
            vertical-align: middle !important;
            display: table-cell !important;
        }
    </style>
</head>

<body>
    <aside class="aside aside-fixed">
        <div class="aside-header">
            <a href="<?= getHTMLRoot() ?>" class="aside-logo">Moreo<span>.pk</span>
            </a>
            <a href="<?= getHTMLRoot() ?>" class="aside-menu-link">
                <i data-feather="menu"></i>
                <i data-feather="x"></i>
            </a>
        </div>
        <div class="aside-body">
            <div class="aside-loggedin">
                <div class="d-flex align-items-center justify-content-start">
                    <a href="<?= getHTMLRoot() ?>" class="avatar"><img src="<?= getHTMLRoot()  ?>/uploads/display-pictures/<?= (!empty($User['DisplayPicture'])) ? $User['DisplayPicture'] : "default.png" ?>" class="rounded-circle" alt=""></a>
                    <div class="aside-alert-link">
                        <a href="<?= getHTMLRoot() ?>" class="new" data-toggle="tooltip" title="You have 2 unread messages">
                            <i data-feather="message-square"></i>
                        </a>
                        <a href="<?= getHTMLRoot() ?>" class="new" data-toggle="tooltip" title="You have 4 new notifications">
                            <i data-feather="bell"></i>
                        </a>
                        <a href="<?= getHTMLRoot() ?>/logout" data-toggle="tooltip" title="Sign out">
                            <i data-feather="log-out"></i>
                        </a>
                    </div>
                </div>
                <div class="aside-loggedin-user">
                    <a href="#" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
                        <h6 class="tx-semibold mg-b-0"><?= $User['FullName'] ?></h6>
                    </a>
                    <p class="tx-color-03 tx-12 mg-b-0"><?= ($User['FK_UserType'] == 1) ? "Administrator" : "Unknown Role" ?></p>
                </div>
            </div>
            <ul class="nav nav-aside">
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/dashboard") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/dashboard" class="nav-link">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-label mg-t-25">Product Management</li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/products") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/products" class="nav-link">
                        <i data-feather="shopping-bag"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/categories") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/categories" class="nav-link">
                        <i data-feather="package"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/colors") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/colors" class="nav-link">
                        <i data-feather="droplet"></i>
                        <span>Colors</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/sizes") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/sizes" class="nav-link">
                        <i data-feather="bar-chart-2"></i>
                        <span>Sizes</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/inventory") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/inventory" class="nav-link">
                        <i data-feather="box"></i>
                        <span>Inventory</span>
                    </a>
                </li>
                <li class="nav-label mg-t-25">Sales Management</li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/customers") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/customers" class="nav-link">
                        <i data-feather="users"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/orders") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/orders" class="nav-link">
                        <i data-feather="package"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/sales") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/sales" class="nav-link">
                        <i data-feather="activity"></i>
                        <span>Sales</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/investments") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/investments" class="nav-link">
                        <i data-feather="dollar-sign"></i>
                        <span>Investments</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == getHTMLRoot() . "/withdrawls") ? "active" : "" ?>">
                    <a href="<?= getHTMLRoot() ?>/withdrawls" class="nav-link">
                        <i data-feather="dollar-sign"></i>
                        <span>Withdrawls</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="content ht-100v pd-0">
        <div class="content-header">
            <div class="content-search">
                <i data-feather="search"></i>
                <input type="search" class="form-control" placeholder="Search...">
            </div>
            <nav class="nav">
                <a href="<?= getHTMLRoot() ?>" class="nav-link">
                    <i data-feather="help-circle"></i>
                </a>
                <a href="<?= getHTMLRoot() ?>" class="nav-link">
                    <i data-feather="grid"></i>
                </a>
                <a href="<?= getHTMLRoot() ?>" class="nav-link">
                    <i data-feather="align-left"></i>
                </a>
            </nav>
        </div>
        <!-- content-header -->