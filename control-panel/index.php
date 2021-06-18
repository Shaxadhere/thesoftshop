<?php
include_once('web-config.php');
session_start();
if(isset($_SESSION['ADMIN'])){
    redirectWindow(getHTMLRoot() . "/dashboard");
}
else{
    redirectWindow(getHTMLRoot() . "/auth/index?error=you must login to continue");
}
?>