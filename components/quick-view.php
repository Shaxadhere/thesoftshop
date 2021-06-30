<!--quick view-->
<div id="quick-view-tpl" class="dn">
    <div class="product-quickview single-product-content img_action_zoom kalles-quick-view-tpl">
        <div class="row product-image-summary">
            <div class="col-lg-7 col-md-6 col-12 product-images pr oh">
                <!-- Need to check if sale is available -->
                <span style="display:none" class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span id="view-product-discount-percentage">-34%</span></span></span>
                <div class="images">
                    <div id="view-product-image-container" class="product-images-slider tc equal_nt nt_slider nt_carousel_qv p-thumb_qv nt_contain ratio_imgtrue position_8" data-flickity='{ "fade":true,"cellSelector": ".q-item:not(.is_varhide)","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 0,"pageDots": true,"rightToLeft": false }'>
                        <!-- <div data-grname="not4" data-grpvl="ntt4" class="js-sl-item q-item sp-pr-gallery__img w__100" data-mdtype="image">
                            <span class="nt_bg_lz lazyload" data-bgset="<?= getHTMLRoot() ?>/assets/images/quick_view/pr-01.jpg"></span>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-12 summary entry-summary pr">
                <div class="summary-inner gecko-scroll-quick">
                    <div class="gecko-scroll-content-quick">
                        <div class="kalles-section-pr_summary kalles-section summary entry-summary mt__30">
                            <h1 class="product_title entry-title fs__16"><a id="view-product-name-anchor" href="#">${Product Name}</a></h1>
                            <div class="flex wrap fl_between al_center price-review">
                                <p class="price_range" id="price_qv">
                                    <del id="view-product-original-price" style="display:none">${Original Price}</del>
                                    <ins id="view-product-current-price">${Current Price}</ins>
                                </p>
                                <a href="product-detail-layout-01.html" class="rating_sp_kl dib">
                                    <div class="kalles-rating-result">
                                        <span class="kalles-rating-result__number" id="view-product-review-count">12 reviews</span>
                                    </div>
                                </a>
                            </div>
                            <div class="pr_short_des">
                                <p class="mg__0" id="view-product-description">${Product Description}</p>
                            </div>
                            <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
                                <div id="callBackVariant_qv" class="nt_pink nt1_ nt2_">
                                    <div id="cart-form_qv" class="nt_cart_form variations_form variations_form_qv">
                                        <div class="variations mb__40 style__circle size_medium style_color des_color_1">
                                            <div class="swatch is-color kalles_swatch_js">
                                                <h4 class="swatch__title">Color:
                                                    <span class="nt_name_current user_choose_js" id="view-product-default-color">${Default Color}</span>
                                                </h4>
                                                <ul class="swatches-select swatch__list_pr" id="view-product-colors-container">
                                                    <!-- <li class="ttip_nt tooltip_top_right nt-swatch swatch_pr_item is-selected" data-escape="Pink">
                                                        <span class="tt_txt">Pink</span><span class="swatch__value_pr pr bg_color_pink"></span>
                                                    </li>
                                                    <li class="ttip_nt tooltip_top nt-swatch swatch_pr_item" data-escape="Black">
                                                        <span class="tt_txt">Black</span><span class="swatch__value_pr pr bg_color_black"></span>
                                                    </li> -->
                                                </ul>
                                            </div>
                                            <div class="swatch is-label kalles_swatch_js">
                                                <h4 class="swatch__title" id="view-product-default-size">Size:
                                                    <span class="nt_name_current user_choose_js">${Default Size}</span>
                                                </h4>
                                                <ul class="swatches-select swatch__list_pr" id="view-product-sizes-container">
                                                    <li class="nt-swatch swatch_pr_item pr" data-escape="XS">
                                                        <span class="swatch__value_pr">XS</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="variations_button in_flex column w__100 buy_qv_false">
                                            <div class="flex wrap">
                                                <div class="quantity pr mr__10 order-1 qty__true" id="sp_qty_qv">
                                                    <input type="number" class="input-text qty text tc qty_pr_js qty_cart_js" value="1" name="quantity" inputmode="numeric">
                                                    <div class="qty tc fs__14">
                                                        <button type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                            <i class="facl facl-plus"></i>
                                                        </button>
                                                        <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0">
                                                            <i class="facl facl-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="nt_add_w ts__03 pa order-3">
                                                    <a id="view-product-add-to-wishlist" href="#" class="wishlistadd cb chp ttip_nt tooltip_top_left"><span class="tt_txt">Add to Wishlist</span><i class="facl facl-heart-o"></i></a>
                                                </div>
                                                <button id="view-product-add-to-cart" type="button" data-time='6000' data-ani='shake' class="single_add_to_cart_button button truncate js_frm_cart w__100 mt__20 order-4">
                                                    <span class="txt_add ">Add to cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="trust_seal_qv" class="pr_trust_seal tl">
                                <p class="mess_cd cb mb__10 fwm tu fs_16"></p>
                                <img class="lazyload img_tr_s1 w__100" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%202244%20285%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="<?= getHTMLRoot() ?>/assets/images/trust_img2.png" alt="">
                            </div>
                            <div class="product_meta">
                                <span class="posted_in" id="view-product-categories-container"><span class="cb">Categories:</span> <a href="shop-filter-options.html" class="cg" title="Women">Women</a></span>
                                <span class="tagged_as" id="view-product-tags-container"><span class="cb">Tags:</span> <a href="shop-filter-options.html" class="cg" title="Color Black">Color Black</a>, <a href="shop-filter-options.html" class="cg" title="Color Pink">Color Pink</a>, <a href="shop-filter-options.html" class="cg" title="Price $7-$50">Price $7-$50</a>, <a href="shop-filter-options.html" class="cg" title="Vendor Kalles">Vendor Kalles</a>, <a href="shop-filter-options.html" class="cg" title="Watch">Watch</a>, <a href="shop-filter-options.html" class="cg" title="women">women</a></span>
                            </div>
                            <a id="view-product-view-full-details" href="#" class="btn fwsb detail_link p-0 fs__14">View full details<i class="facl facl-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end quick view-->