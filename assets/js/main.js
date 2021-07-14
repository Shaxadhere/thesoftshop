// add current year in footer
var d = new Date();
var n = d.getFullYear();
document.getElementById("year").innerHTML = n;

// delay function to skip keyup for sometime
function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

// parse url query
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

// quick view modal handle
$(document).on('mouseover', '.quick-view-product', function () {
    var productId = $(this).attr('data-id')
    $.ajax({
        type: "POST",
        url: "controllers/product",
        data: {
            ViewProduct: true,
            ProductID: productId
        },
        success: function (response) {
            var result = JSON.parse(response)
            if (result['success'] == true) {
                var productDetails = result['productDetails']
                var inventory = result['inventory']
                $('#quantity-available').html(inventory['Quantity'] + " pieces available")
                var product = productDetails[0]
                var images = JSON.parse(product['ProductImages'])
                var reviews = JSON.parse(product['Reviews'])
                var categories = JSON.parse(product['Categories'])
                var tags = JSON.parse(product['ProductTags'])
                $('#view-product-name-anchor').html(product['ProductName'])
                $('#view-product-name-anchor').attr('href', "/thesoftshop/view-product?name=" + product['ProductSlug'])
                $('#view-product-image-container').empty()
                images.forEach(item => {
                    $('#view-product-image-container').append("<div data-grname='not4' data-grpvl='ntt4' class='js-sl-item q-item sp-pr-gallery__img w__100' data-mdtype='image'>" + "<span class='nt_bg_lz lazyload' style='background-size: cover !important' data-bgset='/thesoftshop/uploads/product-images/" + item + "'></span>" + "</div>")
                });
                $('#view-product-current-price').html("Rs. " + product['Price'])
                $('#view-product-review-count').html(((reviews != null) ? reviews.length : "0") + " Reviews")
                $('#view-product-description').html(product['ProductDescription'])
                $('#view-product-default-color').html(product['ColorName'])
                $('#view-product-default-size').html("Size: <span class='nt_name_current user_choose_js' id='view-product-size-value'>" + product['SizeValue'] + "</span>")
                $('#view-product-colors-container').empty()
                $('#view-product-sizes-container').empty()
                productDetails.forEach(item => {
                    if (item['ColorName'] != "None") {
                        $('#view-product-colors-container').append("<li class='ttip_nt tooltip_top_right nt-swatch swatch_pr_item' data-escape='" + item['ColorName'] + "'>" + "<span class='tt_txt' >" + item['ColorName'] + "</span><span data-location='quick-view' class='swatch__value_pr pr color-switch' style='" + item['ColorCode'] + "'></span>" + "</li>")
                    }
                    if (item['SizeValue'] != "None") {
                        $('#view-product-sizes-container').append("<li class='nt-swatch swatch_pr_item pr' data-escape='" + item['SizeValue'] + "'>" + "<span data-location='quick-view' class='swatch__value_pr size-switch'>" + item['SizeValue'] + "</span>" + "</li>")
                    }
                });
                $('#view-product-categories-container').empty()
                $('#view-product-categories-container').html("<span class='cb'>Categories: </span>")
                count = categories.length
                index = 0;
                categories.forEach(item => {
                    index ++
                    if (count == index) {
                        $('#view-product-categories-container').append("<a href='/thesoftshop/category?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>.")
                    } else {
                        $('#view-product-categories-container').append("<a href='/thesoftshop/category?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>, ")
                    }
                });
                $('#view-product-tags-container').empty()
                $('#view-product-tags-container').html("<span class='cb'>Tags: </span>")
                count = tags.length
                index = 0;
                tags.forEach(item => {
                    index ++
                    if (count == index) {
                        $('#view-product-tags-container').append("<a href='/thesoftshop/shop?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>.")
                    } else {
                        $('#view-product-tags-container').append("<a href='/thesoftshop/shop?name=" + item + "' class='cg' title='" + item + "'>" + item + "</a>, ")
                    }
                });
                $('#view-product-view-full-details').attr('href', "/thesoftshop/view-product?name=" + product['ProductSlug'])
                $('#view-product-add-to-cart-button').attr('data-product', btoa(product['ProductID']))


            } else {
                console.log(result['error'])
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// search products function
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

// search input on keypress enter handle
$(document).on('keypress', '.search-input', function (event) {
    var query = $(this).val()
    var _category = $(this).parent().prev().children().first().val();
    var category = (_category != undefined) ? _category : "";
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        search_products(query, category)
    }
})

// search button handle
$(document).on('click', '.btn-search-products', function () {
    var query = $(this).prev().val()
    var _category = $(this).parent().prev().children().first().val();
    var category = (_category != undefined) ? _category : "";
    search_products(query, category)
})

// customer login handle
$(document).on('submit', '#customer_login', function (event) {
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
        success: function (response) {
            if (response == true) {
                $('#login-error-alert').hide()
                $('#login-success-alert').show()
                setTimeout(function () {
                    location.reload()
                }, 1000)
            } else {
                var error = JSON.parse(response)
                $('#login-error-alert').html(error[0])
                $('#login-error-alert').show()
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// customer register handle
$(document).on('submit', '#RegisterForm', function (event) {
    event.preventDefault()
    var fullName = $('#RegisterFullName').val()
    var email = $('#RegisterEmail').val()
    var password = $('#RegisterPassword').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            RegisterCustomer: true,
            CustomerName: fullName,
            CustomerEmail: email,
            CustomerPassword: password
        },
        success: function (response) {
            if (response == true) {
                $('#register-error-alert').hide()
                $('#register-success-alert').show()
                setTimeout(function () {
                    location.reload()
                }, 1000)
            } else {
                var error = JSON.parse(response)
                $('#register-error-alert').html(error[0])
                $('#register-error-alert').show()
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// personal profile form submit handle
$(document).on('submit', '#PersonalProfileForm', function (event) {
    event.preventDefault()
    var fullName = $('#edit-profile-full-name').val()
    var email = $('#edit-profile-email').val()
    var contact = $('#edit-profile-contact').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            UpdateProfile: true,
            FullName: fullName,
            Email: email,
            Contact: contact
        },
        success: function (response) {
            if (response == true) {
                $('#edit-profile-error-alert').hide()
                $('#edit-profile-success-alert').show()
                setTimeout(function () {
                    location.reload()
                }, 1000)
            } else {
                var error = JSON.parse(response)
                $('#edit-profile-error-alert').html(error[0])
                $('#edit-profile-error-alert').show()
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// shipping address form submit handle
$(document).on('submit', '#ShippingAddressForm', function (event) {
    event.preventDefault()
    var shippingAddress = $('#edit-shipping-address-field').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            UpdateShippingAddress: true,
            ShippingAddress: shippingAddress
        },
        success: function (response) {
            if (response == true) {
                $('#edit-shipping-address-error-alert').hide()
                $('#edit-shipping-address-success-alert').show()
                setTimeout(function () {
                    location.reload()
                }, 1000)
            } else {
                var error = JSON.parse(response)
                $('#edit-shipping-address-error-alert').html(error[0])
                $('#edit-shipping-address-error-alert').show()
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// billing address form submit handle
$(document).on('submit', '#BillingAddressForm', function (event) {
    event.preventDefault()
    var billingAddress = $('#edit-billing-address-field').val()
    $.ajax({
        type: "POST",
        url: "/thesoftshop/auth/auth",
        data: {
            UpdateBillingAddress: true,
            BillingAddress: billingAddress
        },
        success: function (response) {
            if (response == true) {
                $('#edit-billing-address-error-alert').hide()
                $('#edit-billing-address-success-alert').show()
                setTimeout(function () {
                    location.reload()
                }, 1000)
            } else {
                var error = JSON.parse(response)
                $('#edit-billing-address-error-alert').html(error[0])
                $('#edit-billing-address-error-alert').show()
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// show edit personal profile form
$(document).on('click', '#edit-personal-profile', function () {
    var root = $('#root').html()
    $.ajax({
        type: "GET",
        url: "/thesoftshop/components/edit-personal-profile",
        success: function (response) {
            $('#root').html(response)
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// show edit shipping address form
$(document).on('click', '#edit-shipping-address', function () {
    var root = $('#root').html()
    $.ajax({
        type: "GET",
        url: "/thesoftshop/components/edit-shipping-address",
        success: function (response) {
            $('#root').html(response)
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// show edit billing address form
$(document).on('click', '#edit-billing-address', function () {
    var root = $('#root').html()
    $.ajax({
        type: "GET",
        url: "/thesoftshop/components/edit-billing-address",
        success: function (response) {
            $('#root').html(response)
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

// add to cart button on view product page
$(document).on('click', '.btn-add-to-cart', function () {
    var productId = $(this).data('product')
    var location = $(this).data('location')
    if (location == "view-product") {
        var colorName = $('#color-name').html()
        var sizeName = $('#size-name').html()
        var quantity = $('#quantity').val()
    } else if (location == "quick-view") {
        var colorName = $('#view-product-default-color').html() ? $('#view-product-default-color').html() : "None";
        var sizeName = $('#view-product-size-value').html() ? $('#view-product-size-value').html() : "None";
        var quantity = $('#view-product-quantity').val()
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
        success: function (response) {
            var result = JSON.parse(response)
            if (result['success'] == true) {
                $('#cart-alert-danger').hide()
                $('#cart-alert-success').html("Product added to cart successfully!")
                $('#cart-alert-success').show()

                setTimeout(function () {
                    window.location.reload()
                }, 3000)
            } else {
                var result = JSON.parse(response)
                $('#cart-alert-success').hide()
                $('#cart-alert-danger').html(result[0])
                $('#cart-alert-danger').show()
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
    console.log(productId, colorName, sizeName, quantity)
})

// remove item from cart
$(document).on('click', '.remove-cart-item', function () {
    var cartItemId = $(this).data('cartitemid')
    var location = $(this).attr('data-location')
    if(location == "cart"){
        var row = $(this).parent().parent().parent().parent().parent().parent()
        var emptyCartMessage = "<div class='kalles-section page_section_heading'>" + "<div class='page-head tc pr oh cat_bg_img page_head_'>" + "<div class='parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0' data-bgset='assets/images/slide/banner21.jpg'></div>" + "<div class='container pr z_100'>" + "<h1 class='mb__5 cw'>Cart</h1>" + "<p class='mg__0'></p>" + "</div>" + "</div>" + "</div>" + "<div class='empty tc mt__60 mb__60'><i class='las la-shopping-bag pr mb__10'></i>" + "<p>Your cart is empty.</p>" + "<p class='return-to-shop mb__15'>" + "<a class='button button_primary tu js_add_ld' href='/thesoftshop/shop'>Return To Shop</a>" + "</p>" + "</div>";
    }
    else if(location == "mini-cart"){
        var row = $(this).parent().parent().parent()
        var emptyCartMessage = "<div class='empty tc mt__40'><i class='las la-shopping-bag pr mb__10'></i>"+
        "<p>Your cart is empty.</p>"+
        "<p class='return-to-shop mb__15'>"+
        "<a class='button button_primary tu js_add_ld' href='<?= getHTMLRoot() ?>/shop'>Return To Shop</a>"+
        "</p>"+
        "</div>";
    }
    $.ajax({
        type: "POST",
        url: "/thesoftshop/controllers/product",
        data: {
            RemoveItemFromCart: true,
            CartItemId: cartItemId
        },
        success: function (response) {
            if (response == true) {
                row.remove();
                if ($('.cart_item').length == 0) {
                    $('.cart-items-container').hide()
                    $('#cart-root').append(emptyCartMessage)
                }
            } else {
                var result = JSON.parse(response)
                console.log(result[0])
            }
        },
        error: function (error) {
            console.log("Error in connection: " + error)
        }
    })
})

//checkout button handle
$(document).on('click', '#checkout-btn', function(){
    var fullName = $('#checkout-full-name').val()
    var phone = $('#checkout-phone').val()
    var email = $('#checkout-email').val()
    var shippingAddress = $('#checkout-shipping-address').val()
    var state = $('#checkout-state').val()
    var city = $('#checkout-city').val()
    var orderNotes = $('#checkout-order-notes').val()

    $.ajax({
        type: "POST",
        url: "/thesoftshop/controllers/orders",
        data: {
            SubmitOrder: true,
            FullName: fullName,
            Email: email,
            Phone: phone,
            ShippingAddress: shippingAddress,
            City: city,
            State: state,
            OrderNotes: orderNotes,
        },
        success: function(response) {
            var result = JSON.parse(response)
            if(result['success'] == true){
                window.location.href = '/thesoftshop/thank-you';
            }
        },
        error: function(error) {
            console.log("Error in connection: " + error)
        }
    })
})

//check stocks || inventory
function check_stocks(product, size, color){
    $.ajax({
        type: "POST",
        url: "/thesoftshop/controllers/product",
        data: {
            CheckQuantity: true,
            ProductID: product,
            Size: size,
            Color: color
        },
        success: function(response){
            $('#quantity-available').html(response)
        },
        error: function(error) {

        }
    })
}

//handle size switch
$(document).on('click', '.size-switch', function(){
    var location = $(this).data('location')
    console.log(location)
    var product = $('.btn-add-to-cart').data('product')
    var colorName = (location == "view-product") ?  $('#color-name').html() : $('#view-product-default-color').html()
    var sizeName = (location == "view-product") ? $('#size-name').html() : $('#view-product-size-value').html()
    check_stocks(product, sizeName, colorName)
})

//handle color switch
$(document).on('click', '.color-switch', function(){
    var location = $(this).data('location')
    console.log(location)
    var product = $('.btn-add-to-cart').data('product')
    var colorName = (location == "view-product") ?  $('#color-name').html() : $('#view-product-default-color').html()
    var sizeName = (location == "view-product") ? $('#size-name').html() : $('#view-product-size-value').html()
    check_stocks(product, sizeName, colorName)
})

//handle quantity change
$(document).on('change', '.quantity-field', function(){
    var parent = $(this).parent().parent().parent()
    var quantity = $(this).val()
    var totalPrice = parent.children().find('.cart-item-price')
    var productId = $(this).data('product')
    var color = $(this).data('color')
    var size = $(this).data('size')
    var sessionId = $(this).data('session-id')
    var unitPrice = $(this).data('unit-price')
    $('#btn-update-cart').show()
    totalPrice.html("Rs. " + parseInt(unitPrice) * parseInt(quantity))
    console.log(productId, color, size, sessionId, totalPrice)
})