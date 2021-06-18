<?php
//phprapid library
include_once('../assets/vendor/phprapid/rapid.php');

//get application root address
function getHTMLRoot(){
	return "/thesoftshop/control-panel";
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
	$data = "arttcsslms";
	$connection = mysqli_connect($server, $usr, $pass, $data) or die("failed to connect to database");
	return ($connection);
}

//html toast
function HTMLToast(){
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
function getEmailBody($RecipentName, $Message, $AdditionalInformation, $FromName){
	return "<!DOCTYPE html
        PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
      <html xmlns='http://www.w3.org/1999/xhtml'>
      
      <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Password Reset Email Template</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans&display=swap' rel='stylesheet'>
      </head>
      <style>
        body {
          height: 100%;
          width: 100%;
          margin: 0;
          padding: 0;
          font-family: 'Open Sans', sans-serif;
          font-size: 16px;
          background-color: #F6F9FC;
        }
        table {
          border-collapse: collapse;
          width: 100%;
          max-width: 600px;
          font-size: inherit;
          margin-top: 40px;
        }
        thead {}
        tbody {
          border-top: 3px solid #0B79D9;
          background-color: #FFFFFF;
        }
        th {
          height: 60px;
          padding: 10px 20px;
        }
        td {
          font-size: 14px;
          line-height: 1.8;
          padding: 10px 20px;
        }
        .center {
          text-align: center;
        }
        .space-y {
          padding-top: 40px;
          padding-bottom: 40px;
        }
        .text-muted {
          color: #8898AA;
        }
        .text-primary {
          color: #0B79D9;
        }
        .disregard {
          font-size: 12px;
        }
        .disregard__text {
          width: 50%;
        }
        .brand__name {
          text-align: left;
        }
        .button--reset {
          padding: 12px 20px;
          border-radius: 5px;
          background-color: #0B79D9;
          color: white;
          font-size: 14px;
          letter-spacing: 0.25px;
          text-decoration: none;
          text-transform: uppercase;
          border: 1px solid #0B79D9;
        }
      </style>
      <body>
        <table align='center' cellpadding='0' cellspacing='0'>
          <thead>
            <tr>
              <th class='brand__name'></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class='center'>
                <h2>Welcome to ARTT</h2>
              </td>
            </tr>
            <tr>
              <td>Hi $RecipentName,</td>
            </tr>
            <tr>
              <td class='center'>$Message</td>
            </tr>
            <tr>
              <td class='center space-y'>
				$AdditionalInformation
              </td>
            </tr>
            <tr>
              <td class='center space-y'>
              <br>
                $FromName
              </td>
            </tr>
            <tr align='center'>
              <td class='disregard text-muted'>
                <p class='disregard__text'>Please disregard this email if this action was not triggered by you.</p>
              </td>
            </tr>
          </tbody>
        </table>
      </body>
      </html>";
}

//smtp mailing credentials
function getSMTPCredentials(){
	return array(
		"host" => "mail.artt.edu.pk",
		"port" => "587",
		"protocol" => "tls",
		"username" => "admissions@artt.edu.pk",
		"password" => "admissions_artt123"
	);
}

//check if string have html tags
function isHtml($string){
  return preg_match("/<[^<]+>/",$string,$m) != 0;
}