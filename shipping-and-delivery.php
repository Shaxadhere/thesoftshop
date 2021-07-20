<?php
include_once('web-config.php');
getHeader("Shipping and delivery", "includes/header.php");
?>
<!--hero banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= getHTMLRoot() ?>/assets/images/slide/banner24.jfif"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">Shipping & Delivery</h1>
        </div>
    </div>
</div>
<!--end hero banner-->

<!--page content-->
<div class="container mt__40 mb__40 cb">
    <div class="kalles-term-exp mb__30">
        <h3 class="fs__18 mt-0">1. SHIPPING & DELIVERY POLICY</h3>
        <p class="mb-2">When an order is placed, it will be shipped to an address designated by the purchaser as long as that shipping address is within the state of Pakistan. &nbsp;All purchases from this website are made pursuant to a shipment contract. &nbsp;As a result, risk of loss and title for items purchased from this website pass to you upon delivery of the items to the carrier. &nbsp;You are responsible for filing any claims with carriers for damaged and/or lost shipments.</p>
    </div>
    <div class="kalles-term-exp mb__30">
        <h3 class="fs__18 mt-0">2. ORDER STATUS & TRACKING</h3>
        <p>All orders placed from Monday to Friday (excluding public holidays) will be processed and shipped within 5-7 working days, from our warehouse. 
            This could vary with circumstances such as online security checks, shipping restrictions, packing and dispatching of order. 
            An email confirmation will be sent for all orders once received, dispatched and delivered. 
            Although any order can be tracked with the Tracking ID sent to customer's provided phone number by this shippment company.
        </p>
    </div>
    <div class="kalles-term-exp mb__30">
        <h3 class="fs__18 mt-0">3. Delivery Charges</h3>
        <p>You are responsible for delivery charges. All items will be delivered with the best delivery option according to the city given in your address, we include shipping charges in the order invoice.</p>
    </div>
</div>
<!--end page content-->
<?php
include_once('components/quick-view.php');
include_once('components/quick-shop.php');
include_once('components/mini-cart-box.php');
include_once('components/search-box.php');
include_once('components/login-box.php');
include_once('components/mobile-toolbar.php');
include_once('components/mobile-menu.php');
include_once('components/back-to-top-button.php');
getFooter("includes/footer.php");
?>