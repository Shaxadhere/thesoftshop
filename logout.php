<?php
include_once('web-config.php');
session_start();
session_unset();
session_destroy();
redirectWindow(getHTMLRoot());
?>