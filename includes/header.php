<?php
include_once('web-config.php');
session_start();
if (!isset($_SESSION['CART']) || $_SESSION['CART'] == "") {
    $Cart = array();
    $_SESSION['CART'] = $Cart;
}

if (!isset($_SESSION['WISHLIST']) || $_SESSION['WISHLIST'] == "") {
    $Wishlist = array();
    $_SESSION['WISHLIST'] = $Wishlist;
}

if (isset($_SESSION['USER'])) {
    include_once('models/customer-model.php');
    $CustomerModel = new Customer();
    $Customer = $CustomerModel->FilterCustomerByID(base64_encode($_SESSION['USER']['PK_ID']));
    $Wishlist = json_decode($Customer['WishList'], true);
    if ($Wishlist == null || $Wishlist == "") {
        $Wishlist = array();
    }
    $_SESSION['WISHLIST'] = $Wishlist;
}
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="content-language" content="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= getHTMLRoot() ?>/assets/moreo-icon.png">
    <meta name="keywords" content="descriiiip" />
    <meta name="author" content="Shehzad Ahmed" />
    <meta name="publisher" content="Shehzad Ahmed" />
    <meta name="copyright" content="moreo.pk" />
    <meta name="description" content="Explore your aesthetic, Buy scrunchies, stickers, potraits, nostalgic vintage accessories in pakistan" />
    <meta name="page-topic" content="Home" />
    <meta name="page-type" content="Homepage" />
    <meta name="audience" content="Everyone" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="Moreo.pk" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://localhost/" />
    <meta property="og:site_name" content="Neoistone: Best Web Development and Hosting services" />
    <meta property="og:description" content="Explore your aesthetic, Buy scrunchies, stickers, potraits, nostalgic vintage accessories in pakistan" />
    <meta property="og:image" content="https://moreo.pk/assets/logo.png" />
    <meta property="og:url" content="https://moreo.pk" />
    <meta name="twitter:title" content="Moreo.pk" />
    <meta name="twitter:description" content="Explore your aesthetic, Buy scrunchies, stickers, potraits, nostalgic vintage accessories in pakistan" />
    <meta name="twitter:image" content="https://moreo.pk/assets/logo.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <title><?= getSiteDomain() ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:300,300i,400,400i,500,500i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/nouislider.min.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/drift-basic.min.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/photoswipe.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/font-icon.min.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/defined.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/home-default.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/shop.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/shopping-cart.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/shopping-cart.css">
</head>

<body class="kalles-template header_full_true des_header_3 css_scrollbar lazy_icons btnt4_style_2 zoom_tp_2 css_scrollbar template-index kalles_toolbar_true hover_img2 swatch_style_rounded swatch_list_size_small label_style_rounded wrapper_full_width header_full_true hide_scrolld_true lazyload">

    <div id="nt_wrapper">

        <!-- header -->
        <header id="ntheader" class="ntheader header_3 h_icon_iccl ">
            <div class="kalles-header__wrapper ntheader_wrapper pr z_200">
                <div class="sp_header_mid">
                    <div class="header__mid">
                        <div class="container">
                            <div class="row al_center css_h_se">
                                <div class="col-md-4 col-3 dn_lg">
                                    <a href="#" data-id="#nt_menu_canvas" class="push_side push-menu-btn  lh__1 flex al_center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
                                            <rect width="30" height="1.5"></rect>
                                            <rect y="7" width="20" height="1.5"></rect>
                                            <rect y="14" width="30" height="1.5"></rect>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-4 col-6 tc tl_lg">
                                    <div class=" branding ts__05 lh__1">
                                        <a class="dib" href="<?= getHTMLRoot() ?>">
                                            <img style="width: 160px" class="dn db_lg" src="<?= getHTMLRoot() ?>/assets/logo.png" alt="<?= getSiteDomain() ?>">
                                            <img style="width: 140px" class="logo_mobile dn_lg" src="<?= getHTMLRoot() ?>/assets/logo.png" alt="<?= getSiteDomain() ?>">
                                        </a>
                                    </div>
                                </div>
                                <div class="col dn db_lg">
                                    <nav class="nt_navigation kl_navigation tc hover_side_up nav_arrow_false">
                                        <ul id="nt_menu_id" class="nt_menu in_flex wrap al_center">
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>">Home</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/shop">Shop</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/new-arrivals">New Arrivals</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/category?name=stationary">Stationary</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/happy-deals">Happy Deals</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/category?name=accessories">Accessories</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/category?name=stickers">Stickers</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-auto col-md-4 col-3 tr col_group_btns">
                                    <div class="nt_action in_flex al_center cart_des_1">
                                        <a class="icon_search push_side cb chp" data-id="#nt_search_canvas" href="#">
                                            <i class="iccl iccl-search"></i></a>
                                        <div class="my-account ts__05 position-relative dn db_md">
                                            <?php
                                            if (isset($_SESSION['USER'])) {
                                            ?>
                                                <a class='cb chp db push_side' href='#'>
                                                    <i class='iccl iccl-user'></i>
                                                </a>
                                                <ul class="pa pe_none ts__03 bgbl ul_none tl op__0 z_100 r__0 pt__15 pb__15 pr__15 pl__15">
                                                    <li><a class="cg db" href="<?= getHTMLRoot() ?>/my-account">My Account</a></li>
                                                    <li><a class="cg db" href="<?= getHTMLRoot() ?>/logout">Logout</a>
                                                    </li>
                                                </ul>
                                            <?php
                                            } else {
                                                echo "<a class='cb chp db push_side' href='#' data-id='#nt_login_canvas'>";
                                                echo "<i class='iccl iccl-user'></i>";
                                                echo "</a>";
                                            }
                                            ?>
                                        </div>
                                        <a class="icon_like cb chp position-relative dn db_md js_link_wis" href="<?= getHTMLRoot() ?>/wishlist">
                                            <i class="iccl iccl-heart pr">
                                                <?php
                                                if (isset($_SESSION['WISHLIST'])) {
                                                    $Wishlist = $_SESSION['WISHLIST'];
                                                    $ItemCount = count($Wishlist);

                                                    if (count($_SESSION['WISHLIST']) > 0) {
                                                        echo "<span class='op__0 ts_op pa tcount bgb br__50 cw tc'>$ItemCount</span>";
                                                    }
                                                }
                                                ?>
                                            </i>
                                        </a>
                                        <div class="icon_cart pr">
                                            <a id="cart-nav" class="push_side position-relative cb chp db" href="#" data-id="#nt_cart_canvas">
                                                <i class="iccl iccl-cart pr">
                                                    <?php
                                                    if (isset($_SESSION['CART'])) {
                                                        $Cart = $_SESSION['CART'];
                                                        $ItemCount = 0;
                                                        foreach ($Cart as $cartItem) {
                                                            $ItemCount = $ItemCount + intval($cartItem['productqty']);
                                                        }
                                                        if (count($_SESSION['CART']) > 0) {
                                                            echo "<span class='op__0 ts_op pa tcount bgb br__50 cw tc'>$ItemCount</span>";
                                                        }
                                                    }
                                                    ?>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->

        <div id="nt_content">