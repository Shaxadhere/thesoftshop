<?php
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="ARTT CSS Acadmy Sign Up">
    <meta name="author" content="Shehzad Ahmed">
    <title>Sign Up - ARTT CSS Academy</title>

    <link rel="icon" type="image/png" href="<?= getHTMLRoot() ?>/assets/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,500" rel='stylesheet'>
    <link href='<?= getHTMLRoot() ?>/assets/vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="<?= getHTMLRoot() ?>/assets/css/vertical-responsive-menu.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/responsive.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/css/night-mode.css" rel="stylesheet">

    <link href="<?= getHTMLRoot() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= getHTMLRoot() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= getHTMLRoot() ?>/assets/vendor/semantic/semantic.min.css">
</head>

<body>

    <div class="sign_in_up_bg">
        <div class="container">
            <div class="row justify-content-lg-center justify-content-md-center">
                <div class="col-lg-12">
                    <div class="main_logo25" id="logo">
                        <a href="<?= getHTMLRoot() ?>"><img src="<?= getHTMLRoot() ?>/assets/logo.png" alt=""></a>
                        <a href="<?= getHTMLRoot() ?>"><img class="logo-inverse" src="<?= getHTMLRoot() ?>/assets/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="sign_form">
                        <h2>Welcome to ARTT CSS Academy</h2>
                        <p>Sign Up and Start Learning!</p>
                        <form action="auth" method="post">
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="FullName" value="" id="id_fullname" required="" maxlength="64" placeholder="Full Name">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="email" name="Email" value="" id="id_email" required="" maxlength="100" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="password" name="Password" value="" id="id_password" required="" maxlength="100" placeholder="Password">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="Contact" value="" id="id_contact" required="" maxlength="12" placeholder="Contact">
                                </div>
                            </div>
                            <div class="ui search focus mt-15">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input class="prompt srch_explore" type="text" name="CNIC" value="" id="id_cnic" required="" maxlength="15" placeholder="CNIC">
                                </div>
                            </div>
                            <div class="ui form mt-30 checkbox_sign">
                                <div class="inline field">
                                    <div class="ui checkbox mncheck">
                                        <input type="checkbox" tabindex="0" class="hidden">
                                        <label>I’m in for emails with exciting discounts and personalized recommendations</label>
                                    </div>
                                </div>
                            </div>
                            <button class="login-btn" type="submit" name="signup">Sign Up</button>
                        </form>
                        <p class="sgntrm145">By signing up, you agree to our <a href="terms-of-use">Terms of Use</a> and <a href="privacy-policy">Privacy Policy</a>.</p>
                        <p class="mb-0 mt-30">Already have an account? <a href="index">Log In</a></p>
                    </div>
                    <div class="sign_footer"><img src="<?= getHTMLRoot() ?>/assets/favicon.png" alt="">© <span id="year"></span><strong> ARTT CSS Academy</strong>. All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= getHTMLRoot() ?>/assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= getHTMLRoot() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= getHTMLRoot() ?>/assets/vendor/OwlCarousel/owl.carousel.js"></script>
    <script src="<?= getHTMLRoot() ?>/assets/vendor/semantic/semantic.min.js"></script>
    <script src="<?= getHTMLRoot() ?>/assets/js/custom.js"></script>
    <script src="<?= getHTMLRoot() ?>/assets/js/night-mode.js"></script>
    <script>
        var d = new Date();
        var n = d.getFullYear();
        document.getElementById("year").innerHTML = n;
    </script>
</body>


</html>