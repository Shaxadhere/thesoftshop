<!-- mh.muzamil97@gmail.com -->
<?php
// include_once('assets/vendor/phprapid/assets/class.phpmailer.php');
// $mail = new PHPMailer();
// $message = "Hello shehzar";

// $mail->IsSMTP();
// $mail->Host = 'sg-s1.dedicatedpanel.net';
// $mail->Port = '465';                                //Sets the default SMTP server port
// $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
// $mail->Username = 'contact@moreo.pk';                    //Sets SMTP username
// $mail->Password = 'MaryamIsLaav.';                    //Sets SMTP password
// $mail->SMTPSecure = 'ssl';
// $mail->From = "mh.muzamil97@gmail.com";
// $mail->FromName = "Muzammil";                //Sets the From name of the message
// $mail->AddAddress("shaxad.here@gmail.com");
// $mail->WordWrap = 50;
// $mail->IsHTML(true);
// $mail->Subject = "hello shehzar";
// $mail->Body = $message;
// if ($mail->Send()) {
//   echo "sent";
// } else {
//   http_response_code(500);
// }
include_once('web-config.php');
$SMTPCredentials = getSMTPCredentials();
        include_once('assets/vendor/phprapid/assets/class.phpmailer.php');
        $mail = new PHPMailer();
        $message = "asdasdas";
        $mail->IsSMTP();
        $mail->Host = $SMTPCredentials['host'];
        $mail->Port = $SMTPCredentials['port'];
        $mail->SMTPAuth = true;
        $mail->Username = $SMTPCredentials['username'];
        $mail->Password = $SMTPCredentials['password'];
        $mail->SMTPSecure = $SMTPCredentials['protocol'];
        $mail->From = "mh.muzamil97@gmail.com";
        $mail->FromName = "mh.muzamil97@gmail.com";
        $mail->AddAddress("shahzarzaydy05@icloud.com");
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = "Your order is recieved";
        $mail->Body = $message;
        $mail->Send();
?>