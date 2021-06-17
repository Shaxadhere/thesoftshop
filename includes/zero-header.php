<?php
session_start();
$UserType = 0;
if (isset($_SESSION['USER'])) {
    $UserType = $_SESSION['USER']['FK_UserType'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="ARTT CSS Academy LMS">
    <meta name="author" content="Shehzad Ahmed">
    <title></title>

    <link rel="icon" type="image/png" href="<?= getHTMLRoot() ?>/assets/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel='stylesheet'>
    <link href='<?= getHTMLRoot() ?>/assets/vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="<?= getHTMLRoot() ?>/assets/css/vertical-responsive-menu.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/responsive.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/night-mode.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/instructor-dashboard.css" rel="stylesheet">

    <link href="<?= getHTMLRoot() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= getHTMLRoot() ?>/assets/vendor/semantic/semantic.min.css">


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <header class="header clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="back_link">
                        <a href="" class="hde151">Exit Quiz</a>
                        <a href="index.html" class="hde152">Back</a>
                    </div>
                    <div class="ml_item">
                        <div style="float: none !important;" class="main_logo main_logo15" id="logo">
                            <a href="<?= getHTMLRoot() ?>"><img src="<?= getHTMLRoot() ?>/assets/logo.png" alt=""></a>
                            <a href="index.html"><img class="logo-inverse" src="<?= getHTMLRoot() ?>/assets/images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="header_right pr-0">
                        <ul>
                            <li class="ui top right pointing dropdown" tabindex="0">
                                <a href="#" class="opts_account" title="Account">
                                    <img src="<?= getHTMLRoot() ?>/Uploads/DisplayPictures/<?php echo (!empty($_SESSION['USER']['UserProfilePicture'])) ? $_SESSION['USER']['UserProfilePicture'] : "avatar.png" ?>" alt="">
                                </a>
                                <div class="menu dropdown_account">
                                    <div class="channel_my">
                                        <div class="profile_link">
                                            <img src="<?= getHTMLRoot() ?>/Uploads/DisplayPictures/<?php echo (!empty($_SESSION['USER']['UserProfilePicture'])) ? $_SESSION['USER']['UserProfilePicture'] : "avatar.png" ?>" alt="">
                                            <div class="pd_content">
                                                <div class="rhte85">
                                                    <h6><?= $_SESSION['USER']['FullName'] ?></h6>
                                                    <div class="mef78" title="Verify">
                                                        <i class='uil uil-check-circle'></i>
                                                    </div>
                                                </div>
                                                <span>
                                                    <?= $_SESSION['USER']['Email'] ?>
                                                </span>
                                            </div>
                                        </div>
                                        <a href="Profile" class="dp_link_12">View Profile</a>
                                    </div>
                                    <div class="night_mode_switch__btn">
                                        <a href="#" id="night-mode" class="btn-night-mode">
                                            <i class="uil uil-moon"></i>
                                            Night mode
                                            <span class="btn-night-mode-switch">
                                                <span class="uk-switch-button"></span>
                                            </span>
                                        </a>
                                    </div>
                                    <a href="logout" class="item channel_item">Sign Out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <div class="wrapper _bg4586 _new89">