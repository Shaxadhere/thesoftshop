<?php
include_once('web-config.php');
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= getHTMLRoot() ?>/assets/images/k_favicon_32x.png">
    <title>TheSoftShop.pk</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:300,300i,400,400i,500,500i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/font-icon.min.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/defined.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/home-default.css">
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
                                        <a class="dib" href="home-default.html">
                                            <img style="width: 160px" class="dn db_lg" src="<?= getHTMLRoot() ?>/assets/logo.png" alt="TheSoftShop">
                                            <img style="width: 140px" class="logo_mobile dn_lg" src="<?= getHTMLRoot() ?>/assets/logo.png" alt="TheSoftShop">
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
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/new-arrivals">New Arrivals</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/category?query=stationary">Stationary</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/happy-deals">Happy Deals</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/category?query=accessories">Accessories</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/sale">Sale</a>
                                            </li>
                                            <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
                                                <a class="lh__1 flex al_center pr" href="<?= getHTMLRoot() ?>/how-to-order">How To Order</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-auto col-md-4 col-3 tr col_group_btns">
                                    <div class="nt_action in_flex al_center cart_des_1">
                                        <a class="icon_search push_side cb chp" data-id="#nt_search_canvas" href="#">
                                            <i class="iccl iccl-search"></i></a>
                                        <div class="my-account ts__05 position-relative dn db_md">
                                            <a class="cb chp db push_side" href="#" data-id="#nt_login_canvas">
                                                <i class="iccl iccl-user"></i></a>
                                        </div>
                                        <a class="icon_like cb chp position-relative dn db_md js_link_wis" href="<?= getHTMLRoot() ?>/wishlist"><i class="iccl iccl-heart pr"><span class="op__0 ts_op pa tcount bgb br__50 cw tc">3</span></i>
                                        </a>
                                        <div class="icon_cart pr">
                                            <a class="push_side position-relative cb chp db" href="#" data-id="#nt_cart_canvas"><i class="iccl iccl-cart pr"><span class="op__0 ts_op pa tcount bgb br__50 cw tc">5</span></i></a>
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