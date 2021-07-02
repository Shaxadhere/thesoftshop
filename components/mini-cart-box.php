<!-- mini cart box -->
<div id="nt_cart_canvas" class="nt_fk_canvas dn">
    <div class="nt_mini_cart nt_js_cart flex column h__100 btns_cart_1">
        <div class="mini_cart_header flex fl_between al_center">
            <div class="h3 fwm tu fs__16 mg__0">Shopping cart</div>
            <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
        </div>
        <div class="mini_cart_wrap">
            <div class="mini_cart_content fixcl-scroll">
                <div class="fixcl-scroll-content">
                    <div class="empty tc mt__40"><i class="las la-shopping-bag pr mb__10"></i>
                        <p>Your cart is empty.</p>
                        <p class="return-to-shop mb__15">
                            <a class="button button_primary tu js_add_ld" href="<?= getHTMLRoot() ?>/shop">Return To Shop</a>
                        </p>
                    </div>

                    <div class="mini_cart_items js_cat_items lazyload">
                        <!-- Item -->
                        <div class="mini_cart_item js_cart_item flex al_center pr oh">
                            <div class="ld_cart_bar"></div>
                            <a href="product-detail-layout-01.html" class="mini_cart_img">
                                <img class="w__100 lazyload" data-src="<?= getHTMLRoot() ?>/assets/images/mini-cart/mini-cart-01.jpg" width="120" height="153" alt="" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iMTUzIiB2aWV3Qm94PSIwIDAgMTIwIDE1MyI+PC9zdmc+">
                            </a>
                            <div class="mini_cart_info">
                                <a href="product-detail-layout-01.html" class="mini_cart_title truncate">La Bohème Rose Gold</a>
                                <div class="mini_cart_meta">
                                    <p class="cart_meta_variant">Pink</p>
                                    <p class="cart_selling_plan"></p>
                                    <div class="cart_meta_price price">
                                        <div class="cart_price">
                                            <del>$60.00</del>
                                            <ins>$40.00</ins>
                                        </div>
                                    </div>
                                </div>
                                <div class="mini_cart_actions">
                                    <div class="quantity pr mr__10 qty__true">
                                        <input type="number" class="input-text qty text tc qty_cart_js" step="1" min="0" max="9999" value="1">
                                        <div class="qty tc fs__14">
                                            <button type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                <i class="facl facl-plus"></i>
                                            </button>
                                            <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0 qty_1">
                                                <i class="facl facl-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <a href="#" class="cart_ac_edit js__qs ttip_nt tooltip_top_right"><span class="tt_txt">Edit this item</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" class="cart_ac_remove js_cart_rem ttip_nt tooltip_top_right"><span class="tt_txt">Remove this item</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Item -->
                    </div>
                </div>
            </div>
            <div class="mini_cart_footer js_cart_footer">
                <div class="js_cat_dics"></div>
                <div class="total row fl_between al_center">
                    <div class="col-auto"><strong>Subtotal:</strong></div>
                    <div class="col-auto tr js_cat_ttprice">
                        <div class="cart_tot_price">Rs. 0.00</div>
                    </div>
                </div>
                <p class="txt_tax_ship mb__5 fs__12">Taxes, shipping and discounts codes will be calculated at checkout</p>
                <a href="<?= getHTMLRoot() ?>/cart" class="button btn-cart mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center cd-imp">View cart</a>
                <a href="<?= getHTMLRoot() ?>/checkout" class="button btn-checkout mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center text-white">Check Out</a>
            </div>
        </div>
    </div>
</div>
<!-- end mini cart box-->