<?php
include('../config.php');
session_start();
if(isset($_SESSION['USER'])){
  redirectWindow(getHTMLRoot() . "/dashboard");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=9">
  <meta name="description" content="ARTT CSS Academy Login">
  <meta name="author" content="Shehzad Ahmed">
  <title>Login - ARTT CSS Academy</title>

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
            <h2>Welcome Back</h2>
            <p>Log In to Your ARTT CSS Acadmy Account!</p>
            <form action="auth" method="post">
              <div class="ui search focus mt-15">
                <div class="ui left icon input swdh95">
                  <input class="prompt srch_explore" type="email" name="Email" value="" id="id_email" required="" maxlength="64" placeholder="Email Address">
                  <i class="uil uil-envelope icon icon2"></i>
                </div>
                <?php
                if(isset($_REQUEST['Email'])){
                ?>
                <div class="ui form mt-10 checkbox_sign">
                  <label class="text-danger"><?= $_REQUEST['Email'] ?></label>
                </div>
                <?php
                }
                ?>
              </div>

              <div class="ui search focus mt-15">
                <div class="ui left icon input swdh95">
                  <input class="prompt srch_explore" type="password" name="Password" value="" id="id_password" required="" maxlength="100" placeholder="Password">
                  <i class="uil uil-key-skeleton-alt icon icon2"></i>
                </div>
                <?php
                if(isset($_REQUEST['Password'])){
                ?>
                <div class="ui form mt-10 checkbox_sign">
                  <label class="text-danger"><?= $_REQUEST['Password'] ?></label>
                </div>
                <?php
                }
                ?>
                <?php
                if(isset($_REQUEST['message'])){
                ?>
                <div class="ui form mt-10 checkbox_sign">
                  <label class="text-danger"><?= $_REQUEST['message'] ?></label>
                </div>
                <?php
                }
                ?>
              </div>

              <div class="ui form mt-30 checkbox_sign">
                <div class="inline field">
                  <div class="ui checkbox mncheck">
                    <input type="checkbox" tabindex="0" class="hidden">
                    <label>Remember Me</label>
                  </div>
                </div>
              </div>

              <button class="login-btn" type="submit" name="login">Sign In</button>

            </form>
            <p class="sgntrm145">Or <a href="forgot-password">Forgot Password</a>.</p>
          </div>
          <div class="sign_footer"><img src="<?= getHTMLRoot() ?>/assets/favicon.png" alt="">© <span id="year"></span> <strong> ARTT CSS Academy</strong>. All Rights Reserved.</div>
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