<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) 
{
    $hostname = 'http://' . $request->getUri()->getHost();
    echo '<h1>Flatyou Services</h1>';
    echo '<h3><a href="' . $hostname . '">' . $hostname . '</a></h3>';
});

$app->post('/test', function (Request $request, Response $response, array $args) 
{
    $data = $request->getParams();
    return $response->withJson($data);
});