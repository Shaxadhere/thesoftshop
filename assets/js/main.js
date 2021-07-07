//add current year in footer
var d = new Date();
var n = d.getFullYear();
document.getElementById("year").innerHTML = n;

//delay function to skip keyup for sometime
function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() {
            callback.apply(context, args);
        }, ms || 0);
    };
}

//parse url query
function parse_my_query(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable) {
            return decodeURIComponent(pair[1]);
        }
    }
    console.log('Query variable %s not found', variable);
}

//quick view modal handle
$(document).on('mouseover', '.quick-view-product', function() {
    var productId = $(this).attr('data-id')
    $.ajax({
        type: "POST",
        url: "controllers/product",
        data: {
            ViewProduct: true,
            ProductID: productId
        },
        success: function(response) {
            var result = JSON.parse(response)
            if (result['success'] == true) {
                var productDetails = result['productDetails']
                var product = productDetails[0]
                var images = JSON.parse(product['ProductImages'])
                var reviews = JSON.parse(product['Reviews'])
                var categories = JSON.parse(product['Categories'])
                var tags = JSON.parse(product['ProductTags'])
                $('#view-product-name-anchor').html(product['ProductName'])
                $('#view-product-name-anchor').attr('href', "/thesoftshop/view-product?name=" + product['ProductSlug'])
                $('#view-product-image-container').empty()
                images.forEach(item => {
                    $('#view-product-image-container').append(
                        "<div data-grname='not4' data-grpvl='ntt4' class='js-sl-item q-item sp-pr-gallery__img w__100' data-mdtype='image'>" +
                        "<span class='nt_bg_lz lazyload' style='background-size: cover !important' data-bgset='/thesoftshop/uploads/product-images/" + item + "'></span>" +
                        "</div>"
                    )
                });
                $('#view-product-current-price').html("Rs. " + product['Price'])
                $('#view-product-review-count').html(((reviews != null) ? reviews.length : "0") + " Reviews")
                $('#view-product-description').html(product['ProductDescription'])
                $('#view-product-default-color').html(product['ColorName'])
                $('#view-product-default-size').html(
                    (product['SizeValue'] != "None") ?
                    "Size: <span class='nt_name_current user_choose_js'>" + product['SizeValue'] + "</span>" :
                    ""
                )
                $('#view-product-colors-container').empty()
                $('#view-product-sizes-container').empty()
                productDetails.forEach(item => {
                    $('#view-product-colors-container').append(
                        "<li class='ttip_nt tooltip_top_right nt-swatch swatch_pr_item' data-escape='" + item['ColorName'] + "'>" +
                        "<span class='tt_txt' >" + item['ColorName'] + "</span><span class='swatch__value_pr pr' style='" + item['ColorCode'] + "'></span>" +
                        "</li>"
                    )
                    if (item['SizeValue'] != "None") {
                        $('#view-product-sizes-container').append(
                            "<li class='nt-swatch swatch_pr_item pr' data-escape='" + item['SizeValue'] + "'>" +
                            "<span class='swatch__value_pr'>" + item['SizeValue'] + "</span>" +
                            "</li>"
                        )
                    }
                });
                $('#view-product-categories-container').empty()
                $('#view-product-categories-container').html(
                    "<span class='cb'>Categories: </span>"
                )
                count = categories.length
                index = 0;
                categories.forEach(item => {
                    index++
                    if (count == index) {
                        $('#view-product-categories-container').append(
                            "<a href='/thesoftshop/category?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>."
                        )
                    } else {
                        $('#view-product-categories-container').append(
                            "<a href='/thesoftshop/category?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>, "
                        )
                    }
                });
                $('#view-product-tags-container').empty()
                $('#view-product-tags-container').html(
                    "<span class='cb'>Tags: </span>"
                )
                count = tags.length
                index = 0;
                tags.forEach(item => {
                    index++
                    if (count == index) {
                        $('#view-product-tags-container').append(
                            "<a href='/thesoftshop/shop?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>."
                        )
                    } else {
                        $('#view-product-tags-container').append(
                            "<a href='/thesoftshop/shop?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>, "
                        )
                    }
                });
                $('#view-product-view-full-details').attr('href', "/thesoftshop/view-product?name=" + product['ProductSlug'])


            } else {
                console.log(result['error'])
            }
        },
        error: function(error) {
            console.log("Error in connection: " + error)
        }
    })
})

//search products function
function search_products(query, category) {
    const queryString = window.location.search
    const params = new URLSearchParams(queryString)
    const sort = (params.has('sort')) ? params.get('sort') : ""
    var url = "/thesoftshop/shop?"
    url += "name=" + query
    if (category != "") {
        url += "&category=" + category
    }
    if (sort != "") {
        url += "&sort=" + sort
    }
    location.href = url
}

//search input on keypress enter handle
$(document).on('keypress', '.search-input', function(event){
    var query = $(this).val()
    var _category = $(this).parent().prev().children().first().val();
    var category = (_category != undefined) ? _category : "";
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        search_products(query, category)
    }
})

//search button handle
$(document).on('click', '.btn-search-products', function() {
    var query = $(this).prev().val()
    var _category = $(this).parent().prev().children().first().val();
    var category = (_category != undefined) ? _category : "";
    search_products(query, category)
})

//customer login handle
$(document).on('submit', '#customer_login', function(event){
    event.preventDefault()
    var customerEmail = $('#CustomerEmail').val()
    var customerPassword = $('#CustomerPassword').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            AuthenticateUser: true,
            CustomerEmail: customerEmail,
            CustomerPassword: customerPassword
        },
        success: function(response){
            if(response == true){
                $('#login-error-alert').hide()
                $('#login-success-alert').show()
                setTimeout(function() {
                    location.reload()
                }, 1000)
            }
            else{
                var error = JSON.parse(response)
                $('#login-error-alert').html(error[0])
                $('#login-error-alert').show()
            }
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//customer register handle
$(document).on('submit', '#RegisterForm', function(event){
    event.preventDefault()
    var fullName = $('#RegisterFullName').val()
    var email = $('#RegisterEmail').val()
    var password = $('#RegisterPassword').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            RegisterCustomer: true,
            CustomerName : fullName,
            CustomerEmail: email,
            CustomerPassword: password
        },
        success: function(response) {
            if(response == true){
                $('#register-error-alert').hide()
                $('#register-success-alert').show()
                setTimeout(function() {
                    location.reload()
                }, 1000)
            }
            else{
                var error = JSON.parse(response)
                $('#register-error-alert').html(error[0])
                $('#register-error-alert').show()
            }
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//personal profile form submit handle
$(document).on('submit', '#PersonalProfileForm', function(event){
    event.preventDefault()
    var fullName = $('#edit-profile-full-name').val()
    var email = $('#edit-profile-email').val()
    var contact = $('#edit-profile-contact').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            UpdateProfile: true,
            FullName : fullName,
            Email: email,
            Contact: contact
        },
        success: function(response) {
            if(response == true){
                $('#edit-profile-error-alert').hide()
                $('#edit-profile-success-alert').show()
                setTimeout(function() {
                    location.reload()
                }, 1000)
            }
            else{
                var error = JSON.parse(response)
                $('#edit-profile-error-alert').html(error[0])
                $('#edit-profile-error-alert').show()
            }
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//shipping address form submit handle
$(document).on('submit', '#ShippingAddressForm', function(event){
    event.preventDefault()
    var shippingAddress = $('#edit-shipping-address-field').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            UpdateShippingAddress: true,
            ShippingAddress : shippingAddress
        },
        success: function(response) {
            if(response == true){
                $('#edit-shipping-address-error-alert').hide()
                $('#edit-shipping-address-success-alert').show()
                setTimeout(function() {
                    location.reload()
                }, 1000)
            }
            else{
                var error = JSON.parse(response)
                $('#edit-shipping-address-error-alert').html(error[0])
                $('#edit-shipping-address-error-alert').show()
            }
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//billing address form submit handle
$(document).on('submit', '#BillingAddressForm', function(event){
    event.preventDefault()
    var billingAddress = $('#edit-billing-address-field').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            UpdateBillingAddress: true,
            BillingAddress : billingAddress
        },
        success: function(response) {
            if(response == true){
                $('#edit-billing-address-error-alert').hide()
                $('#edit-billing-address-success-alert').show()
                setTimeout(function() {
                    location.reload()
                }, 1000)
            }
            else{
                var error = JSON.parse(response)
                $('#edit-billing-address-error-alert').html(error[0])
                $('#edit-billing-address-error-alert').show()
            }
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//show edit personal profile form
$(document).on('click', '#edit-personal-profile', function(){
    var root = $('#root').html()
    $.ajax({
        type: "GET",
        url: "/thesoftshop/components/edit-personal-profile",
        success: function(response){
            $('#root').html(response)
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//show edit shipping address form
$(document).on('click', '#edit-shipping-address', function(){
    var root = $('#root').html()
    $.ajax({
        type: "GET",
        url: "/thesoftshop/components/edit-shipping-address",
        success: function(response){
            $('#root').html(response)
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//show edit billing address form
$(document).on('click', '#edit-billing-address', function(){
    var root = $('#root').html()
    $.ajax({
        type: "GET",
        url: "/thesoftshop/components/edit-billing-address",
        success: function(response){
            $('#root').html(response)
        },
        error: function(error){
            console.log("Error in connection: " + error)
        }
    })
})

//add to cart button on view product page
$(document).on('click', '.btn-add-to-cart', function() {
    var productId = $(this).data('product')
    var location = $(this).data('location')
    if (location == "view-product") {
        var colorName = $('#color-name').html()
        var sizeName = $('#size-name').html()
        var quantity = $('#quantity').val()
    }
    $.ajax({
        type: "POST",
        url: "/thesoftshop/controllers/product",
        data: {
            AddToCart: true,
            ProductID: productId,
            Color: colorName,
            Size: sizeName,
            Quantity: quantity
        },
        success: function(response) {
            var result = JSON.parse(response)
            if (result['success'] == true) {
                // console.log("product added")
                // var image = result['Image']
                // var productName = result['ProductName']
                // var productSize = result['ProductSize']
                // var productColor = result['ProductColor']
                // var totalPrice = result['Price']
                // var quantity = result['Quantity']
                // var cartItem = "<div class='mini_cart_item js_cart_item flex al_center pr oh'>"+
                // "<div class='ld_cart_bar'></div>"+
                // "<a href='product-detail-layout-01.html' class='mini_cart_img'>"+
                // "<img class='w__100 lazyload' data-src='/thesoftshop/uploads/product-images/"+image+"' width='120' height='153' alt='' src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iMTUzIiB2aWV3Qm94PSIwIDAgMTIwIDE1MyI+PC9zdmc+'>"+
                // "</a>"+
                // "<div class='mini_cart_info'>"+
                // "<a href='product-detail-layout-01.html' class='mini_cart_title truncate'>"+productName+"</a>"+
                // "<div class='mini_cart_meta'>"+
                // "<p class='cart_meta_variant'>"+productSize+" | "+productColor+"</p>"+
                // "<div class='cart_meta_price price'>"+
                // "<div class='cart_price'>"+
                // "<p class='price_range' id='price_ppr'>Rs. "+totalPrice+"</p>"+
                // "</div>"+
                // "</div>"+
                // "</div>"+
                // "<div class='mini_cart_actions'>"+
                // "<div class='quantity pr mr__10 qty__true'>"+
                // "<input type='number' class='input-text qty text tc qty_cart_js' step='1' min='0' max='9999' value='"+quantity+"'>"+
                // "<div class='qty tc fs__14'>"+
                // "<button type='button' class='plus db cb pa pd__0 pr__15 tr r__0'>"+
                // "<i class='facl facl-plus'></i>"+
                // "</button>"+
                // "<button type='button' class='minus db cb pa pd__0 pl__15 tl l__0 qty_1'>"+
                // "<i class='facl facl-minus'></i>"+
                // "</button>"+
                // "</div>"+
                // "</div>"+
                // "<a href='#' class='cart_ac_edit js__qs ttip_nt tooltip_top_right'><span class='tt_txt'>Edit this item</span>"+
                // "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>"+
                // "<path d='M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7'></path>"+
                // "<path d='M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z'></path>"+
                // "</svg>"+
                // "</a>"+
                // "<a href='#' class='cart_ac_remove js_cart_rem ttip_nt tooltip_top_right'><span class='tt_txt'>Remove this item</span>"+
                // "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>"+
                // "<polyline points='3 6 5 6 21 6'></polyline>"+
                // "<path d='M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2'></path>"+
                // "<line x1='10' y1='11' x2='10' y2='17'></line>"+
                // "<line x1='14' y1='11' x2='14' y2='17'></line>"+
                // "</svg>"+
                // "</a>"+
                // "</div>"+
                // "</div>"+
                // "</div>";
                // $('.mini_cart_items').append(cartItem)
                $('#cart-alert-danger').hide()
                $('#cart-alert-success').html("Product added to cart successfully!")
                $('#cart-alert-success').show()
                
                setTimeout(function() {
                    window.location.href = window.location.href + "&added-to-cart=true";
                }, 2000)
                // $('#cart-nav').click()
            } else {
                var result = JSON.parse(response)
                $('#cart-alert-success').hide()
                $('#cart-alert-danger').html(result[0])
                $('#cart-alert-danger').show()
            }
        },
        error: function(error) {
            console.log("Error in connection: " + error)
        }
    })
    console.log(productId, colorName, sizeName, quantity)
})
