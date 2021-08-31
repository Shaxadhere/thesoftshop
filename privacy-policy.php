<?php
include_once('web-config.php');
getHeader(
    "Privacy policy",//page title
    "includes/header.php",//header path
    "Privacy policy",//pagetype
    "Buy scrunchies in pakistan",//page keywords
    "Privacy policy - Buy scrunchies in pakistan",//description
    'Privacy policy',//topic
    'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']//url
);
?>
<!--hero banner-->
<div class="kalles-section page_section_heading">
    <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="<?= getHTMLRoot() ?>/assets/images/slide/banner24.jfif"></div>
        <div class="container pr z_100">
            <h1 class="mb__5 cw">Privacy Policy</h1>
        </div>
    </div>
</div>
<!--end hero banner-->

<!--page content-->
<div class="kalles-section container mt__50 mb__50">
    <div class="terms cb">
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">These Privacy Policies May Change</h3>
            <p>At Moreo.pk, accessible from <a href="https://moreo.pk">moreo.pk</a>, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Moreo.pk and how we use it.</p>
            <p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>
            <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Moreo.pk . This policy is not applicable to any information collected offline or via channels other than this website.</p>
        </div>
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">Consent</h3>
            <p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>
        </div>
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">Information we collect</h3>
            <p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
            <p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
            <p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>
        </div>
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">How we use your information</h3>
            <p>We use the information we collect in various ways, including to:</p>
            <ul>
                <li>Provide, operate, and maintain our website</li>
                <li>Improve, personalize, and expand our website</li>
                <li>Understand and analyze how you use our website</li>
                <li>Develop new products, services, features, and functionality</li>
                <li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>
                <li>Send you emails</li>
                <li>Find and prevent fraud</li>
            </ul>
        </div>
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">Log Files</h3>
            <p>Moreo.pk follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>
        </div>
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">Google DoubleClick DART Cookie</h3>
            <p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>
        </div>
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">Our Advertising Partners</h3>
            <p>Some of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.</p>

            <ul>
                <li><a href="https://policies.google.com/technologies/ads">Google Ads Privacy Policy</a></li>
            </ul>

        </div>
        <div class="kalles-term-exp mb__20">
            <h3 class="fs__18 mt-0">Children's Information</h3>
            <p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

            <p>Moreo.pk does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

        </div>
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