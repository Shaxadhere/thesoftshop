<?php
//phprapid library
include_once('assets/vendor/phprapid/rapid.php');

//get application root address
function getHTMLRoot(){
	return "/moreo/control-panel";
}

//get application host
function getServerRoot(){
	return $_SERVER['HTTP_HOST'];
}

//database connection
function connect(){
	$server = "localhost";
    $usr = "root";
    $pass = "";
    $data = "moreopk_moreopk";
    $connection = mysqli_connect($server, $usr, $pass, $data) or die("failed to connect to database");
    return ($connection);
}

//html toast
function HTMLToast(){
	if (isset($_REQUEST['success'])) {
    echo "<div id='alert' class='container-fluid'>";
    echo "<div class='alert alert-success d-flex' role='alert'>";
    echo "<i data-feather='alert-circle' class='mg-r-10'></i> $_REQUEST[success]";
    echo "</div>";
		echo "</div>";
	}

	if (isset($_REQUEST['error'])) {
      echo "<div id='alertdanger' class='container-fluid'>";
      echo "<div class='alert alert-danger d-flex' role='alert'>";
      echo "<i data-feather='alert-triangle' class='mg-r-10'></i> $_REQUEST[error]";
      echo "</div>";
      echo "</div>";
  }
}

//email body
function getEmailBody($RecipentName, $OrderNumber, $Address, $Phone, $Email, $Amount, $DeliveryCharges, $Total, $Message, $Subject = "Your order is placed!")
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
                                                        <td align='center' valign='bottom' style='padding-top: 4px; padding-right: 0px; padding-bottom: 10px;'><a href='//moreo.pk' title='' target='_blank'><img height='auto' src='https://moreo.pk/assets/logo.png' width='170' class='gmail-CToWUd' style='width: 170px; height: auto;'></a></td>
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
                        <div style='color: rgb(1 1 1); text-align: center; font-weight: bold;'><span style='font-size: 24px;'>$Subject</span></div>
                        <div>
                            <p style='font-size: 18px;'>Hi $RecipentName,</p>
                            <p>$Message</p>
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
                        <table width='100%' style='width: 691.188px; min-width: 100%;'>
                            <tbody>
                                <tr>
                                    <td style='color: rgb(83, 83, 83);'>Shipping Option</td>
                                    <td align='right'>COD</td>
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
                                                                <td><a href='https://twitter.com/Moreopk' target='_blank'><img src='https://ci5.googleusercontent.com/proxy/r4HXtapus2-NldbzD0pJjqtqKtC2nkMsuKuYeNcMLtf6IGjavJsMaeYlM6qNf0mxwOM7InEnipJDb8xgODZ64Iiuca_mOKfiiEXFlvqKmhw0Vbg=s0-d-e1-ft#https://img.alicdn.com/tfs/TB1Npp8R8r0gK0jSZFnXXbRRXXa-23-23.png' class='gmail-CToWUd'></a></td>
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
                                                    <div style='font-size: 10px; line-height: 20px; height: 15px;'>&nbsp;</div><a href='//moreo.pk/' target='_blank'><img style='width:300px' src='https://moreo.pk/assets/logo.png' class='gmail-CToWUd'></a>
                                                    <div style='font-size: 10px; line-height: 20px; height: 15px;'>&nbsp;</div>
                                                    <p style='font-size: 10px;'>This is an automatically generated <span zeum4c2='PR_5_0' data-ddnwab='PR_5_0' aria-invalid='spelling' class='LI ng'>e-mail</span> from our website. Please do not reply to this <span zeum4c2='PR_6_0' data-ddnwab='PR_6_0' aria-invalid='spelling' class='LI ng'>e-mail</span>.</p>
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
function getSMTPCredentials()
{
    return array(
        "host" => "sg-s1.dedicatedpanel.net",
        "port" => "465",
        "protocol" => "ssl",
        "username" => "contact@moreo.pk",
        "password" => "MaryamIsLaav."
    );
}

//check if string have html tags
function isHtml($string){
  return preg_match("/<[^<]+>/",$string,$m) != 0;
}

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function getShippingCharges(){
  return 170;
}