<?php


if(http_response_code() == 400){
    redirectWindow("/pos/errors/400");
}

if(http_response_code() == 404){
    redirectWindow("/pos/errors/404");
}

if(http_response_code() == 500){
    redirectWindow("/pos/errors/500");
}

if(http_response_code() == 503){
    redirectWindow("/pos/errors/503");
}

if(http_response_code() == 505){
    redirectWindow("/pos/errors/505");
}

if(http_response_code() == 401){
    redirectWindow("/pos/errors/401");
}



?>