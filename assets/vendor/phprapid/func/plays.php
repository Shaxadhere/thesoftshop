<?php

// * PHP Rapid
// * https://github.com/Shaxadhere/phprapid
// *
// * Tested on PHP 7.4
// *
// * Copyright Shehzad Ahmed 
// * https://shaxad.netlify.app
// * https://github.com/Shaxadhere

// * Released under the GNU GENERAL PUBLIC LICENSE
// * 
// *
// * Date: 2020-08-23

/**
 * adds header with dynamic title/
 *
 * @param String   $pageName  expects page name
 * @param String   $headerPath  header.php path
 * 
 */ 
function getHeader(string $pageName, string $headerPath, string $pageType="Home", string $keywords="", string $description="", string $pageTopic="", string $pageUrl="")
{
    ob_start();
    include($headerPath);
    //include("header.php");
    $buffer = ob_get_contents();
    ob_end_clean();
    $title = $pageName;
    $buffer = preg_replace('/(<meta name="keywords" content=")(.*?)(" \/>)/i', '$1' . $keywords . '$3', $buffer);
    $buffer = preg_replace('/(<meta name="description" content=")(.*?)(" \/>)/i', '$1' . $description . '$3', $buffer);
    $buffer = preg_replace('/(<meta name="page-topic" content=")(.*?)(" \/>)/i', '$1' . $pageTopic . '$3', $buffer);
    $buffer = preg_replace('/(<meta name="page-type" content=")(.*?)(" \/>)/i', '$1' . $pageType . '$3', $buffer);
    $buffer = preg_replace('/(<meta property="og:title" content=")(.*?)(" \/>)/i', '$1' . $pageName . '$3', $buffer);
    $buffer = preg_replace('/(<meta property="og:description" content=")(.*?)(" \/>)/i', '$1' . $description . '$3', $buffer);
    $buffer = preg_replace('/(<meta property="og:url" content=")(.*?)(" \/>)/i', '$1' . $pageUrl . '$3', $buffer);
    $buffer = preg_replace('/(<meta name="twitter:title" content=")(.*?)(" \/>)/i', '$1' . $pageName . '$3', $buffer);
    $buffer = preg_replace('/(<meta name="twitter:description" content=")(.*?)(" \/>)/i', '$1' . $description . '$3', $buffer);
    $buffer = preg_replace('/(<meta property="og:url" content=")(.*?)(" \/>)/i', '$1' . $pageUrl . '$3', $buffer);
    $buffer = preg_replace('/(<meta property="og:site_name" content=")(.*?)(" \/>)/i', '$1' . "Moreo.pk" . '$3', $buffer);
    $buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . ' - Moreo.pk$3', $buffer);

    echo $buffer;
}

/**
 * adds footer/
 *
 * @param String   $footerPath  expects footer.php path
 * 
 */ 
function getFooter(string $footerPath){
    include($footerPath);
}

/**
 * redirects page with javascript
 *
 * @param String   $url  expects url
 * 
 */ 
function redirectWindow(string $url)
{
    echo "<script>window.location.href='$url';</script>";
}

/**
 * shows alert with javascript
 *
 * @param String   $msg  expects message
 * 
 */ 
function showAlert(string $msg)
{
    echo "<script>alert('$msg');</script>";
}

?>