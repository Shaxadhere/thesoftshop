<?php
//phprapid library
include_once('assets/vendor/phprapid/rapid.php');

//get application root address
function getHTMLRoot()
{
  return "/thesoftshop";
}

function getAppName()
{
  return "Moreo";
}

function getSiteDomain()
{
  return "moreo.pk";
}

//get application host
function getServerRoot()
{
  return $_SERVER['HTTP_HOST'];
}

//database connection
function connect()
{
  $server = "localhost";
  $usr = "root";
  $pass = "";
  $data = "thesoftshop.pk";
  $connection = mysqli_connect($server, $usr, $pass, $data) or die("failed to connect to database");
  return ($connection);
}

//html toast
function HTMLToast()
{
  if (isset($_REQUEST['Success'])) {
    echo "<div class='sa4d25'>";
    echo "<div class='container-fluid'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-12'>";
    echo "<div class='alert alert-success' id='alert'>";
    echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
    echo "<strong>Success! </strong> $_REQUEST[Success]";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }

  if (isset($_REQUEST['error'])) {
    echo "<div class='sa4d25'>";
    echo "<div class='container-fluid'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-12'>";
    echo "<div class='alert alert-danger' id='alertdanger'>";
    echo "<button type='button' class='close' data-dismiss='alert'>x</button>";
    if ($_REQUEST['error'] == 401) {
      echo "<strong>Error! </strong> Access Unauthorized! You are not allowed to visit the page you are trying to access";
    } else {
      echo "<strong>Error! </strong> $_REQUEST[error]";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
}

//email body
function getEmailBody($RecipentName, $OrderNumber, $Address, $Phone, $Email, $EstDelivery, $Amount, $DeliveryCharges, $Total)
{
  return "<style>
  * {
      font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif
  }
</style>
<center>
  <table border='0' cellpadding='0' cellspacing='0' width='80%'>
      <tbody>
          <tr>
              <td>
                  <div style='margin-bottom: 0px;'>
                      <div>
                          <table align='left' border='0' cellpadding='0' cellspacing='0' width='100%' style='width: 691.188px; min-width: 100%; padding: 10px;'>
                              <tbody>
                                  <tr>
                                      <td align='center' valign='bottom'>
                                          <table align='left' border='0' cellpadding='0' cellspacing='0' valign='bottom' width='100%' style='width: 671.188px; min-width: 100%;'>
                                              <tbody>
                                                  <tr>
                                                      <td align='center' valign='bottom' style='padding-top: 4px; padding-right: 0px; padding-bottom: 10px;'><a href='//moreo.pk' title='' target='_blank'><img height='auto' src='/moreo.pk/assets/logo.png' width='170' class='gmail-CToWUd' style='width: 170px; height: auto;'></a></td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <div style='padding-top: 100px;'>
                      <div style='font-size: 10px; line-height: 20px; height: 20px;'>&nbsp;</div>
                      <div style='color: rgb(1 1 1); text-align: center; font-weight: bold;'><span style='font-size: 24px;'>Your order is placed!</span></div>
                      <div>
                          <p style='font-size: 18px;'>Hi $RecipentName,</p>
                          <p>Thank you for ordering from Moreo.pk!</p>
                          <p>We're excited for you to receive your order&nbsp;<b>#$OrderNumber</b>&nbsp;and will notify you once it's on its way. We hope you had a great shopping experience! You can check your order status here.</p>
                          <div style='font-size: 10px; line-height: 20px; height: 20px;'>&nbsp;</div>
                          <table align='center' border='0' cellpadding='0' cellspacing='0' style='width: 200px; height: 50px;'>
                              <tbody>
                                  <tr>
                                      <td align='center'><a href='//moreo.pk/track-order?order=$OrderNumber' target='_blank' style='color: #fff; text-decoration-line: none; background: #222222; font-weight: bold; font-size: 16px; width: 1080px; padding: 12px;'>ORDER STATUS</a></td>
                                  </tr>
                              </tbody>
                          </table>
                          <div style='font-size: 10px; line-height: 20px; height: 20px;'>&nbsp;</div>
                      </div>
                  </div>
                  <div>
                      <p style='color: rgb(1 1 1); font-weight: bold; font-size: 15px;'>DELIVERY DETAILS</p>
                      <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                          <tbody>
                              <tr>
                                  <td valign='top' style='color: rgb(1 1 1); width: 124.406px; min-width: 100px; font-weight: bold;'>Name:</td>
                                  <td>$RecipentName</td>
                              </tr>
                              <tr>
                                  <td valign='top' style='color: rgb(1 1 1); font-weight: bold;'>Address:</td>
                                  <td>$Address</td>
                              </tr>
                              <tr>
                                  <td valign='top' style='color: rgb(1 1 1); width: 124.406px; font-weight: bold;'>Phone:</td>
                                  <td>$Phone</td>
                              </tr>
                              <tr>
                                  <td valign='top' style='color: rgb(1 1 1); width: 124.406px; font-weight: bold;'>Email:</td>
                                  <td><a href='mailto:$Email' target='_blank'>$Email</a></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div>
                      <p style='color: rgb(1 1 1); font-weight: bold; font-size: 15px;'>ORDER DETAIL</p>
                      <div style='padding-bottom: 10px; margin-top: 10px;'>
                          <p style='margin: 0px;'>Estimated delivery: $EstDelivery</p>
                      </div>
                  </div>
                  <div>
                      <table width='100%' style='width: 691.188px; min-width: 100%;'>
                          <tbody>
                              <tr>
                                  <td style='color: rgb(83, 83, 83);'>Shipping Option</td>
                                  <td align='right'>CODE</td>
                              </tr>
                          </tbody>
                      </table>
                      <table width='100%' style='width: 691.188px; min-width: 100%;'>
                          <tbody>
                              <tr>
                                  <td style='color: rgb(83, 83, 83);'>Amount</td>
                                  <td align='right'>Rs. $Amount</td>
                              </tr>
                              <tr>
                                  <td style='color: rgb(83, 83, 83);'>Delivery fee</td>
                                  <td align='right'>Rs $DeliveryCharges</td>
                              </tr>
                              <tr>
                                  <td style='color: rgb(83, 83, 83);' style='font-weight: bold;'>Total</td>
                                  <td align='right' style='font-weight: bold;'>Rs $Total</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div>
                      <div>
                          <div>
                              <div>
                                  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                      <tbody>
                                          <tr>
                                              <td width='300'>
                                                  <table border='0' cellpadding='0' cellspacing='0' width='120'>
                                                      <tbody>
                                                          <tr>
                                                              <td><a href='https://www.facebook.com/Moreo.pk' target='_blank'><img src='https://ci4.googleusercontent.com/proxy/ROZKcYfPTYrTOgmTwJcqjfZbyOLcCPQkUTuMqbvL0MWO0yW29b9LA6h_zRdWXLNcWk6j5v8TYIsR4EjW_2sje-BC4bHCclr00_baLHa5_A9vwL0=s0-d-e1-ft#https://img.alicdn.com/tfs/TB126gMeiDsXe8jSZR0XXXK6FXa-23-23.png' class='gmail-CToWUd'></a></td>
                                                              <td><a href='https://www.instagram.com/Moreo.pk' target='_blank'><img src='https://ci4.googleusercontent.com/proxy/pjkqe1i5lIAFvDvpegZY4aMrnQiLcUHiK5p5gpQ54uOAWEczQoU82-o4iZzPppvpyZL84xsxq3h1wUfOwzts4Ri1Ojr8TwHdFRPEn8mZbihGfms=s0-d-e1-ft#https://img.alicdn.com/tfs/TB1rRRPSXY7gK0jSZKzXXaikpXa-22-22.png' class='gmail-CToWUd'></a></td>
                                                              <td><a href='https://twitter.com/Moreo.pk' target='_blank'><img src='https://ci5.googleusercontent.com/proxy/r4HXtapus2-NldbzD0pJjqtqKtC2nkMsuKuYeNcMLtf6IGjavJsMaeYlM6qNf0mxwOM7InEnipJDb8xgODZ64Iiuca_mOKfiiEXFlvqKmhw0Vbg=s0-d-e1-ft#https://img.alicdn.com/tfs/TB1Npp8R8r0gK0jSZFnXXbRRXXa-23-23.png' class='gmail-CToWUd'></a></td>
                                                              <td></td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td align='center' colspan='2'>
                                                  <p style='margin: 0px;'>&nbsp;</p><a href='//moreo.pk/file-a-complaint' target='_blank' style='text-decoration-line: none;'><span style='font-weight: bold; color: rgb(1 1 1);'>FILE A COMPLAINT</span></a>&nbsp;<span style='font-weight: bold; color: rgb(1 1 1);'>|&nbsp;</span><a href='//moreo.pk/contact-us' target='_blank' style='text-decoration-line: none;'><span style='font-weight: bold; color: rgb(1 1 1);'>CONTACT US</span></a>
                                                  <div style='font-size: 10px; line-height: 20px; height: 15px;'>&nbsp;</div>
                                                  <div style='font-size: 10px; line-height: 20px; height: 15px;'>&nbsp;</div><a href='//moreo.pk/' target='_blank'><img src='/thesoftshop/assets/logo.png' class='gmail-CToWUd'></a>
                                                  <div style='font-size: 10px; line-height: 20px; height: 15px;'>&nbsp;</div>
                                                  <p style='font-size: 10px;'>This is an automatically generated <span zeum4c2='PR_5_0' data-ddnwab='PR_5_0' aria-invalid='spelling' class='LI ng'>e-mail</span> from our subscription list. Please do not reply to this <span zeum4c2='PR_6_0' data-ddnwab='PR_6_0' aria-invalid='spelling' class='LI ng'>e-mail</span>.</p>
                                                  <div style='font-size: 10px; line-height: 20px; height: 15px;'>&nbsp;</div>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </td>
          </tr>
      </tbody>
  </table>
</center>";
}

//smtp mailing credentials
function getSMTPCredentials(){
  return array(
    "host" => "a2plcpnl0202.prod.iad2.secureserver.net",
    "port" => "465",
    "protocol" => "ssl",
    "username" => "admin@shaxad.com",
    "password" => "786786PkPk"
  );
}

//check if string have html tags
function isHtml($string){
  return preg_match("/<[^<]+>/", $string, $m) != 0;
}

//generate random numeric string
function generateNumericString($min, $max){
  $str_result = '0123456789';
  return substr(str_shuffle($str_result), $min, $max);
}

function resizeImageT(){
  $filename = 'uploads/product-images/qrban85h1Y7dIPTB4N2S.jfif';
  $percent = 0.5;

  // Content type
  // header('Content-Type: image/jpeg');

  // Get new sizes
  list($width, $height) = getimagesize($filename);
  $newwidth = $width * $percent;
  $newheight = 600;

  // Load
  $thumb = imagecreatetruecolor($newwidth, $newheight);
  $source = imagecreatefromjpeg($filename);

  // Resize
  imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

  // Output
  // imagejpeg($thumb);
  $randomStrings = random_strings(14);
  echo $randomStrings;
  imagepng($thumb, 'uploads/product-images/' . $randomStrings . '.png');
}
