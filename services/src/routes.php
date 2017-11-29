<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Flatyou\Models\GoogleGeo;
use Flatyou\Models\Appartamento;
use Flatyou\Models\Utente;


// Routes app
$app->get('/', function (Request $request, Response $response, array $args) 
{
    $geo = GoogleGeo::get_position_from_address('35019', 'Tombolo', 'Padova');
});

$app->post('/test', function (Request $request, Response $response, array $args) 
{
    $data = $request->getParams();
    return $response->withJson($data);
});


