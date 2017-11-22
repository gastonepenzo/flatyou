<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Flatyou\Models\Appartamento;


// Routes
$app->get('/', function (Request $request, Response $response, array $args) 
{
    $a = new Appartamento('D8B05A0D');
    echo $a->get('id_utente');
});

$app->post('/test', function (Request $request, Response $response, array $args) 
{
    $data = $request->getParams();
    return $response->withJson($data);
});


