<?php

// Application middleware

use Slim\Middleware\TokenAuthentication;

$authenticator = function($request, TokenAuthentication $tokenAuth)
{
    # Search for token on header, parameter, cookie or attribute
    $token = $tokenAuth->findToken($request);
    
    # Your method to make token validation
    //$user = User::auth_token($token);

    # If occured ok authentication continue to route
    # before end you can storage the user informations or whateve
};

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != '' && strtolower($_SERVER['HTTPS']) != 'off')
{
    $secure = true;
}
else
{
    $secure = false;
}

$app->add(new Slim\Middleware\TokenAuthentication([
    'path'          => '/*',
    'authenticator' => $authenticator,
    'secure'        => $secure,
]));