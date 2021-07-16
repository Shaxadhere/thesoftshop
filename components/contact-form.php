<div class="kalles-section container mb__50 cb">
    <div class="row fl_center">
        <div class="contact-form col-12 col-md-6 order-1 order-md-0">
            <form method="post" action="<?= getHTMLRoot() ?>/controllers/contact" class="contact-form">
                <h3 class="mb__20 mt__40">DROP US A LINE</h3>
                <p>
                    <label for="ct-name">Your Name (required)</label>
                    <input required="required" type="text" id="ct-name" name="ct-name" value="">
                </p>
                <p>
                    <label for="ct-email">Your Email (required)</label>
                    <input required="required" type="email" id="ct-email" name="ct-email" value="">
                </p>
                <p>
                    <label for="ct-phone">Your Phone Number</label>
                    <input type="tel" id="ct-phone" name="ct-phone" pattern="[0-9\-]*" value="">
                </p>
                <p>
                    <label for="ct-message">Your Message</label>
                    <textarea rows="20" id="ct-message" name="ct-message" required="required"></textarea>
                </p>
                <input type="submit" name="contact" class="button w__100" value="Send">
            </form>
        </div>
        <div class="contact-content col-12 col-md-6 order-0 order-md-1">
            <h3 class="mb__20 mt__40">CONTACT INFORMATION</h3>
            <p>We love to hear from you on our customer service, merchandise, website or any topics you want to share with us. Your comments and suggestions will be appreciated. Please complete the form below.</p>
            <p class="mb__5 d-flex">
                <i class="las la-phone fs__20 mr__10 text-primary"></i>
                <a href="tel:923032804856">+92 (303) 280 4856</a>
            </p>
            <p class="mb__5 d-flex">
                <i class="las la-envelope fs__20 mr__10 text-primary"></i>
                <a href="mailto:contact@thesoftshop.pk">contact@thesoftshop.pk</a>
            </p>
        </div>
    </div>
</div>