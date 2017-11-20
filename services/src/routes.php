<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Flatyou\Models\Appartamento;


// Routes
$app->get('/', function (Request $request, Response $response, array $args) 
{
    $hostname = 'http://' . $request->getUri()->getHost();
    $app = new Appartamento(1);
});

$app->post('/test', function (Request $request, Response $response, array $args) 
{
    $data = $request->getParams();
    return $response->withJson($data);
});


