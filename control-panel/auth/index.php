<?php
include_once('../web-config.php');
session_start();
if (isset($_SESSION['ADMIN'])) {
  redirectWindow(getHTMLRoot() . "/dashboard");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="TheSoftShop.pk Admin Panel">
  <meta name="author" content="Shehzad Ahmed">
  <link rel="shortcut icon" type="image/x-icon" href="<?= getHTMLRoot() ?>/assets/img/favicon.png">
  <title>Login | TheSoftShop.pk</title>
  <link href="<?= getHTMLRoot() ?>/assets/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= getHTMLRoot() ?>/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/dashforge.css">
  <link rel="stylesheet" href="<?= getHTMLRoot() ?>/assets/css/dashforge.auth.css">
</head>

<body>
  <header class="navbar navbar-header navbar-header-fixed">
    <a href="index" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
    <div class="navbar-brand">
      <a href="index" class="df-logo">TheSoft<span>Shop</span></a>
    </div>
    <div id="navbarMenu" class="navbar-menu-wrapper">
      <div class="navbar-menu-header">
        <a href="index" class="df-logo">TheSoft<span>Shop</span></a>
        <a id="mainMenuClose" href="index"><i data-feather="x"></i></a>
      </div>
    </div>
    <div class="navbar-right">
      <a href="../../index" class="btn btn-buy"><i data-feather="arrow-left"></i> <span>Back To Website</span></a>
    </div>
  </header>>

  <div class="content content-fixed content-auth">
    <div class="container">
      <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
        <div class="media-body align-items-center d-none d-lg-flex">
          <div class="mx-wd-600">
            <img src="<?= getHTMLRoot() ?>/assets/img/img15.png" class="img-fluid" alt="">
          </div>
        </div>
        <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
          <form action="auth" method="post">
            <div class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Sign In</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>

              <div class="form-group">
                <label>Email address</label>
                <input name="Email" type="email" class="form-control" placeholder="yourname@yourmail.com">
                <?php
                if(isset($_GET['Email'])){
                  $error = $_GET['Email'];
                  echo "<span style='color:red;font-size: 11px;'>";
                  echo $error;
                  echo "</span>";
                }
                ?>
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                  <a href="forgot-password" class="tx-13">Forgot password?</a>
                </div>
                <input name="Password" type="password" class="form-control" placeholder="Enter your password">
                <?php
                if(isset($_GET['Password'])){
                  $error = $_GET['Password'];
                  echo "<span style='color:red;font-size: 11px;'>";
                  echo $error;
                  echo "</span>";
                }
                if(isset($_GET['error'])){
                  $error = $_GET['error'];
                  echo "<span style='color:red;font-size: 11px;'>";
                  echo $error;
                  echo "</span>";
                }
                ?>
              </div>
              <button name="SignIn" class="btn btn-brand-02 btn-block">Sign In</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div>
      <span>Copyright &copy; <span id="year"></span> TheSoftShop.pk all rights reserved</span>
    </div>
  </footer>

  <script src="<?= getHTMLRoot() ?>/assets/lib/jquery/jquery.min.js"></script>
  <script src="<?= getHTMLRoot() ?>/assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= getHTMLRoot() ?>/assets/lib/feather-icons/feather.min.js"></script>
  <script src="<?= getHTMLRoot() ?>/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <script src="<?= getHTMLRoot() ?>/assets/js/dashforge.js"></script>

  <!-- append theme customizer -->
  <script src="<?= getHTMLRoot() ?>/assets/lib/js-cookie/js.cookie.js"></script>
  <script src="<?= getHTMLRoot() ?>/assets/js/dashforge.settings.js"></script>
  <script>
    $(function() {
      'use script'

      window.darkMode = function() {
        $('.btn-white').addClass('btn-dark').removeClass('btn-white');
      }

      window.lightMode = function() {
        $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
      }

      var hasMode = Cookies.get('df-mode');
      if (hasMode === 'dark') {
        darkMode();
      } else {
        lightMode();
      }
    })
  </script>

  <script>
    var d = new Date();
    var n = d.getFullYear();
    document.getElementById("year").innerHTML = n;
  </script>
</body>


</html>