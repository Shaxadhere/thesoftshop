<?php

include_once('../web-config.php');

//Request from sign up confirm
if (isset($_POST['RegisterCustomer'])) {
  $errors = array();

  if (empty($_POST['CustomerName'])) {
    array_push($errors, "Full name is required");
    echo json_encode($errors);
    exit();
  }

  if (isHtml($_POST['CustomerName'])) {
    array_push($errors, "Full name must be in letters only");
    echo json_encode($errors);
    exit();
  }

  if (empty($_POST['CustomerEmail'])) {
    array_push($errors, "Email is required");
    echo json_encode($errors);
    exit();
  }

  if(!filter_var($_POST['CustomerEmail'], FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Invalid Email entered");
    echo json_encode($errors);
    exit();
  }

  if (isHtml($_POST['CustomerEmail'])) {
    array_push($errors, "Invalid email");
    echo json_encode($errors);
    exit();
  }


  if (!validateEmail($_POST['CustomerEmail'])) {
    array_push($errors, "Email is invalid");
    echo json_encode($errors);
    exit();
  }

  if (empty($_POST['CustomerPassword'])) {
    array_push($errors, "Password is required");
    echo json_encode($errors);
    exit();
  }

  if ($errors == null) {
    $FullName = mysqli_real_escape_string(connect(), $_POST['CustomerName']);
    $CustomerEmail = mysqli_real_escape_string(connect(), $_POST['CustomerEmail']);
    $CustomerPassword = mysqli_real_escape_string(connect(), $_POST['CustomerPassword']);
    if (checkExistance("tbl_customer", "Email", $CustomerEmail, connect())) {
      array_push($errors, "Email already exists");
      echo json_encode($errors);
      exit();
    }
    insertData(
      "tbl_customer",
      array(
        "FullName",
        "Email",
        "Password",
      ),
      array(
        $FullName,
        $CustomerEmail,
        password_hash($CustomerPassword, 1),
      ),
      connect()
    );

    $User = verifyValues(
      "tbl_customer",
      array(
        "Email",
        $CustomerEmail
      ),
      connect()
    );

    $User = mysqli_fetch_array($User);

    session_start();
    $_SESSION["USER"] = $User;

    echo true;
  } else {
    echo json_encode($errors);
  }
}

//Request from login confirm
if (isset($_POST['AuthenticateUser'])) {
  $errors = array();

  
  //validating email in POST
  if (isset($_POST['CustomerEmail'])) {
    if(isHtml($_POST['CustomerEmail'])){
      array_push($errors, "Invalid Email");
      echo json_encode($errors);
      exit();
    }
    if (empty($_POST['CustomerEmail'])) {
      array_push($errors, "Email cannot be empty");
      echo json_encode($errors);
      exit();
    }
    if(!filter_var($_POST['CustomerEmail'], FILTER_VALIDATE_EMAIL)){
      array_push($errors, "Invalid Email");
      echo json_encode($errors);
      exit();
    }
    else if (!validateEmail($_POST['CustomerEmail'])) {
      array_push($errors, "Invalid Email");
      echo json_encode($errors);
      exit();
    }
  }
  
  //validating password password in POST
  if (isset($_POST['CustomerPassword'])) {
    //if password is empty string
    if (empty($_POST['CustomerPassword'])) {
      array_push($errors, "Password cannot be empty");
      echo json_encode($errors);
      exit();
    }
  }
  
  $CustomerEmail = mysqli_real_escape_string(connect(), $_POST['CustomerEmail']);
  $CustomerPassword = mysqli_real_escape_string(connect(), $_POST['CustomerPassword']);

  //verifies the email entered
  $user = verifyValues(
    "tbl_customer",
    array(
      "Email",
      $CustomerEmail
    ),
    connect()
  );

  //saving the result in a variable
  $ValidUser = mysqli_fetch_array($user);

  //checking if the account exists
  if (isset($ValidUser)) {
    //checking the password
    if (password_verify($CustomerPassword, $ValidUser['Password'])) {
      session_start();
      $_SESSION["USER"] = $ValidUser;
    }
    //returning password is incorect
    else {
      array_push($errors, "Invalid Password");
    }
  }
  //returning Email doesnt exists
  else {
    array_push($errors, "Email doesnt exists");
  }

  if ($errors == null) {
    echo true;
  } else {
    echo json_encode($errors);
  }
}

//Request from update profile confirm
if (isset($_POST['UpdateProfile'])) {
  session_start();
  if (!isset($_SESSION['USER'])) {
    echo false;
    exit();
  }
  $errors = array();
  $FullName = mysqli_real_escape_string(connect(), $_POST['FullName']);
  $Email = mysqli_real_escape_string(connect(), $_POST['Email']);
  $Contact = mysqli_real_escape_string(connect(), $_POST['Contact']);
  if (empty($FullName)) {
    array_push($errors, "Full name is required");
  }
  if (empty($Email)) {
    array_push($errors, "Email is required");
  }
  if (isHTML($FullName)) {
    array_push($errors, "Invalid name");
  }
  if (isHTML($Email)) {
    array_push($errors, "Invalid email");
  }
  if (isHTML($Contact)) {
    array_push($errors, "Invalid contact");
  }
  if ($errors == null) {
    editData(
      "tbl_customer",
      array(
        "FullName",
        $FullName,
        "Email",
        $Email,
        "Contact",
        $Contact
      ),
      "PK_ID",
      $_SESSION['USER']['PK_ID'],
      connect()
    );
    echo true;
  } else {
    echo json_encode($errors);
  }
}

//Request from update shipping address confirm
if (isset($_POST['UpdateShippingAddress'])) {
  session_start();
  if (!isset($_SESSION['USER'])) {
    echo false;
    exit();
  }
  $errors = array();
  $ShippingAddress = mysqli_real_escape_string(connect(), $_POST['ShippingAddress']);
  if (isHTML($ShippingAddress)) {
    array_push($errors, "Invalid shipping address");
  }
  if ($errors == null) {
    editData(
      "tbl_customer",
      array(
        "ShippingAddress",
        $ShippingAddress
      ),
      "PK_ID",
      $_SESSION['USER']['PK_ID'],
      connect()
    );
    echo true;
  } else {
    echo json_encode($errors);
  }
}

//Request from update billing address confirm
if (isset($_POST['UpdateBillingAddress'])) {
  session_start();
  if (!isset($_SESSION['USER'])) {
    echo false;
    exit();
  }
  $errors = array();
  $BillingAddress = mysqli_real_escape_string(connect(), $_POST['BillingAddress']);
  if (isHTML($BillingAddress)) {
    array_push($errors, "Invalid billing address");
  }
  if ($errors == null) {
    editData(
      "tbl_customer",
      array(
        "BillingAddress",
        $BillingAddress
      ),
      "PK_ID",
      $_SESSION['USER']['PK_ID'],
      connect()
    );
    echo true;
  } else {
    echo json_encode($errors);
  }
}

//Request from forgot confirm
if (isset($_POST['reset'])) {
  //if it contains email in POST
  if (isset($CustomerEmail)) {
    //if email is empty string
    if (empty($CustomerEmail)) {
      redirectWindow("index?email=Email cannot be empty");
    }
    //if email is invalid
    else if (!validateEmail($CustomerEmail)) {
      redirectWindow("forgotPassword?email=Invalid Email");
    }
  }

  //verifies the email entered
  $user = verifyValues(
    "tbl_customer",
    array(
      "Email",
      $CustomerEmail
    ),
    connect()
  );

  //saving the result in a variable
  $ValidUser = mysqli_fetch_array($user);

  //checking if the account exists
  if (isset($ValidUser)) {

    include_once('../assets/phprapid/assets/class.phpmailer.php');
    $mail = new PHPMailer();
    $antiForgeryToken = random_strings(50);
    editData(
      "tbl_customer",
      array(
        "token",
        $antiForgeryToken
      ),
      "PK_ID",
      $ValidUser[0],
      connect()
    );

    $reset_Url = "<a href='http://$_SERVER[HTTP_HOST]/auth/verify?'>Reset Your Password</a>";

    $message = "";

    $mail->IsSMTP();
    $mail->Host = 'a2plcpnl0202.prod.iad2.secureserver.net';
    $mail->Port = '465';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'admin@shaxad.com';                    //Sets SMTP username
    $mail->Password = '786786PkPk';                    //Sets SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->From = "admin@shaxad.com";
    $mail->FromName = "Point Of Sale";                //Sets the From name of the message
    $mail->AddAddress($ValidUser[2]);
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = "Reset Password";
    $mail->Body = $message;
    if ($mail->Send()) {
      redirectWindow("$_HTMLROOTURI/Auth/emailSent");
    } else {
      http_response_code(500);
    }
  }
  //returning Email doesnt exists
  else {
    redirectWindow("forgotPassword?email=Email doesnt exists");
  }
}

//Request from save password confirm
if (isset($_POST['SavePassword'])) {
  if (isset($_REQUEST['token']) && isset($_REQUEST['uuid'])) {
    $antiForgeryToken = $_REQUEST['token'];
    $uuid = $_REQUEST['uuid'];
    $fetched = fetchDataById(
      "tbl_customer",
      "PK_ID",
      $uuid,
      connect()
    );
    $user = mysqli_fetch_array($fetched);
    $token = $user[6];
    if (!($token == $antiForgeryToken)) {
      redirectWindow("$_HTMLROOTURI/Auth/expired");
    } else {
      $newPassword = $_REQUEST['NewPassword'];
      editData(
        "tbl_customer",
        array(
          "Password",
          password_hash($newPassword, 1),
          "token",
          ""
        ),
        "PK_ID",
        $uuid,
        connect()
      );
      $UserType = $user['FK_UserType'];
      session_start();
      $_SESSION["USER"] = $user;
      if ($UserType == 1) {
        redirectWindow("$_HTMLROOTURI/Controllers/Admin/index?Success=Your%20password%20was%20saved%20successfully");
      } else if ($UserType == 2) {
        redirectWindow("$_HTMLROOTURI/Controllers/Manager/index?Success=Your%20password%20was%20saved%20successfully");
      } else if ($UserType == 3) {
        redirectWindow("$_HTMLROOTURI/Controllers/Employee/index?Success=Your%20password%20was%20saved%20successfully");
      } else {
        return http_response_code(400);
      }
    }
  } else {
    redirectWindow("$_HTMLROOTURI/Auth/expired");
  }
}

include_once("../errors/errors.php");
