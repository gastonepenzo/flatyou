<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Flatyou\Models\GoogleGeo;
use Flatyou\Models\Appartamento;
use Flatyou\Models\Utente;
use Flatyou\Models\Stanza;
use Flatyou\Models\Posto;


// Routes app
$app->get('/', function (Request $request, Response $response, array $args) 
{
    $app = new Appartamento('2');
    $rooms = $app->getRooms();
    foreach($rooms as $r)
    {
        var_dump($r->getApartment());
    }
});

$app->post('/test', function (Request $request, Response $response, array $args) 
{
    $data = $request->getParams();
    return $response->withJson($data);
});


