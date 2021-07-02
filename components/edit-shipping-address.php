<?php
session_start();
include_once('../web-config.php');
include_once('../models/customer-model.php');
$CustomerModel = new Customer();
$Customer = $CustomerModel->FilterCustomerByID(base64_encode($_SESSION['USER']['PK_ID']));

?>
<div class="container">
    <div class="row" style="justify-content: center;">
        <div class="col-12 col-md-6 col-lg-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
            <div class="checkout-section">
                <h3 class="checkout-section__title">Shipping Address</h3>
                <form id="ShippingAddressForm" method="post">
                    <div class="alert alert-success" style="display:none" id="edit-shipping-address-success-alert">
                        Shipiing Address updated successfully
                    </div>
                    <div class="alert alert-danger" style="display:none" id="edit-shipping-address-error-alert">

                    </div>
                    <div class="row">
                        <p class="checkout-section__field col-12">
                            <label for="ShippingAddress">Shipping Address</label>
                            <input required placeholder="Please enter your shipping address" type="text" id="edit-shipping-address-field" value="<?= $Customer['ShippingAddress'] ?>">
                        </p>
                        <p class="checkout-section__field col-12">
                            <button type="submit">Save</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
            <div class="product-inner pr">
                <div class="card" style="width: 100%; height:175px">
                    <div class="card-body">
                        <div style="display:flex">
                            <h5 class="card-title">Personal Profile</h5><a id="edit-personal-profile" style="padding: 10px 0px 0px 10px; color:#56cfe1" href="#" class="card-link">Edit</a>
                        </div>
                        <p class="card-text" style="margin-bottom:1px !important"><?= $Customer['FullName'] ?></p>
                        <p class="card-text" style="margin-bottom:1px !important"><?= $Customer['Email'] ?></p>
                        <p class="card-text" style="margin-bottom:1px !important"><?= $Customer['Contact'] ?></p>
                    </div>
                </div>
            </div>
            <div class="product-inner pr" style="margin-top: 30px;">
                <div class="card" style="width: 100%; height:175px">
                    <div class="card-body">
                        <div style="display:flex">
                            <h5 class="card-title">Billing Address</h5><a id="edit-billing-address" style="padding: 10px 0px 0px 10px; color:#56cfe1" href="#" class="card-link">Edit</a>
                        </div>
                        <p class="card-text"><?= (empty($Customer['BillingAddress'])) ? "No addresses" : $Customer['BillingAddress'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
        </div>
    </div>
</div>