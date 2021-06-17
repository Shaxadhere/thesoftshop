<?php
session_start();
$UserType = 0;
if (isset($_SESSION['USER'])) {
    $UserType = $_SESSION['USER']['FK_UserType'];
}
else{
    redirectWindow("Auth/index?message=You must login to continue");
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
        <button type="button" id="toggleMenu" class="toggle_menu">
            <i class='uil uil-bars'></i>
        </button>
        <button id="collapse_menu" class="collapse_menu">
            <i class="uil uil-bars collapse_menu--icon "></i>
            <span class="collapse_menu--label"></span>
        </button>
        <div class="main_logo" id="logo">
            <a href="<?= getHTMLRoot() ?>"><img src="<?= getHTMLRoot() ?>/assets/logo.png" alt=""></a>
            <a href="<?= getHTMLRoot() ?>"><img class="logo-inverse" src="<?= getHTMLRoot() ?>/assets/images/logo.png" alt=""></a>
        </div>
        <div class="header_right">
            <ul>
                <li class="ui dropdown">
                    <a href="#" class="option_links" title="Notifications">
                        <i class='uil uil-bell'></i>
                        <span class="noti_count">3</span>
                    </a>
                    <div class="menu dropdown_mn">
                        <?php
                        include_once('Models/NotificationsModel.php');
                        $NotificationsModel = new Notifications();
                        $Notifications = $NotificationsModel->ListFilterForStudent($_SESSION['USER']['PK_ID']);
                        $Sno = 1;
                        while ($row = mysqli_fetch_array($Notifications)) {

                        ?>
                            <a href="#" class="channel_my item">
                                <div class="profile_link">
                                    <img src="<?= getHTMLRoot() ?>/assets/images/bell.png" alt="">
                                    <div class="pd_content">
                                        <h6><?= $row['NotificationText'] ?></h6>
                                        <p><?= $row['NotificationTitle'] ?></p>
                                        <span class="nm_time"><?= date('h:i A d M, Y', strtotime($row['DateTime'])) ?></span>
                                    </div>
                                </div>
                            </a>
                        <?php
                            if ($Sno == 4) {
                                break;
                            }
                            $Sno++;
                        }
                        ?>
                        <a class="vbm_btn" href="Notifications">View All
                            <i class='uil uil-arrow-right'></i>
                        </a>
                    </div>
                </li>
                <li class="ui dropdown">
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
    </header>


    <?php
    //Students Section Starts Here
    if ($UserType == 2) {
    ?>
        <nav class="vertical_nav">
            <div class="left_section menu_left" id="js-menu">
                <div class="left_section">
                    <ul>

                        <li class="menu--item">
                            <a href="<?= getHTMLRoot() ?>/dashboard" class="menu--link active" title="Home">
                                <i class='uil uil-home-alt menu--icon'></i>
                                <span class="menu--label">Home</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="Subjects" class="menu--link" title="">
                                <i class='uil uil-books menu--icon'></i>
                                <span class="menu--label">Subjects</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="AcademyMaterial" class="menu--link" title="">
                                <i class='uil uil-swatchbook menu--icon'></i>
                                <span class="menu--label">Academy Material</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ExtraMaterial" class="menu--link" title="Extra Material">
                                <i class='uil uil-book-open menu--icon'></i>
                                <span class="menu--label">Extra Material</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="left_section pt-2">
                    <ul>
                        <li class="menu--item">
                            <a href="Help" class="menu--link" title="Help">
                                <i class='uil uil-question-circle menu--icon'></i>
                                <span class="menu--label">Help</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php
    }
    //Students Section Ends Here
    ?>


    <?php
    //Admin Section Starts Here
    if ($UserType == 1) {
    ?>
        <nav class="vertical_nav">
            <div class="left_section menu_left" id="js-menu">
            
                <div class="left_section">
                    <ul>
                        <li class="menu--item">
                            <a href="<?= getHTMLRoot() ?>/dashboard" class="menu--link active" title="Home">
                                <i class='uil uil-home-alt menu--icon'></i>
                                <span class="menu--label">Home</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ManageSubjects" class="menu--link" title="Subjects">
                                <i class='uil uil-books menu--icon'></i>
                                <span class="menu--label">Subjects</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ManageTopics" class="menu--link" title="Topics">
                                <i class='uil uil-book-alt  menu--icon'></i>
                                <span class="menu--label">Topics</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ManageNotes" class="menu--link" title="Notes">
                                <i class='uil uil-notes menu--icon'></i>
                                <span class="menu--label">Notes</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ManageRecordedLectures" class="menu--link" title="Recorded Lectures">
                                <i class='uil uil-play menu--icon'></i>
                                <span class="menu--label">Recorded Lectures</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ManageAcademicMaterial" class="menu--link" title="Academic Material">
                                <i class='uil uil-swatchbook menu--icon'></i>
                                <span class="menu--label">Academy Material</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ManageExtraMaterial" class="menu--link" title="Extra Material">
                                <i class='uil uil-book-open menu--icon'></i>
                                <span class="menu--label">Extra Material</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="left_section pt-2">
                    <ul>
                        <li class="menu--item">
                            <a href="AssignSubjects" class="menu--link" title="Assign Subjects">
                                <i class='uil uil-book-medical menu--icon'></i>
                                <span class="menu--label">Assign Subjects</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="ManageStudents" class="menu--link" title="Students">
                                <i class='uil uil-users-alt menu--icon'></i>
                                <span class="menu--label">Students</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="left_section pt-2">
                    <ul>
                        <li class="menu--item">
                            <a href="Settings" class="menu--link" title="Setting">
                                <i class='uil uil-cog menu--icon'></i>
                                <span class="menu--label">Setting</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="Help" class="menu--link" title="Help">
                                <i class='uil uil-question-circle menu--icon'></i>
                                <span class="menu--label">Help</span>
                            </a>
                        </li>
                        <li class="menu--item">
                            <a href="Feedback" class="menu--link" title="Send Feedback">
                                <i class='uil uil-comment-alt-exclamation menu--icon'></i>
                                <span class="menu--label">Send Feedback</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php
    }
    //Admin Section Ends Here
    ?>
    <div class="wrapper mb-5">