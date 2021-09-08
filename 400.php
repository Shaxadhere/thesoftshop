<?php
include_once('web-config.php');
getHeader(
    "Bad Request Error", //page title
    "includes/header.php", //header path
    "Error Page", //pagetype
    "buy scrunchies in pakistan, buy vintage potraits in pakistan, buy stickers in pakistan, buy nostalgic vintage accessories in pakistan", //page keywords
    "Explore your aesthetic, Buy scrunchies, stickers, nostalgic vintage accessories in pakistan", //description
    "Bad Request Error", //topic
    'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] //url
);
?>
<div class="kalles-section nt_section type_image_text_overlay">
    <div class="kalles-static-image__slide nt_full txt_shadow_false se_height_full nt_first">
        <div class="row equal_nt">
            <div class="col-12 mt-5 mb-5">
                <div class="nt_img_txt oh pr middle center" style="text-align-last: center;">
                    <img src="<?= getHTMLRoot() ?>/assets/images/error.gif" alt="404" class="nt_img">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('components/mobile-menu.php');
getFooter("includes/footer.php");
?>