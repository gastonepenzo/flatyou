<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Flatyou\Models\GoogleGeo;
use Flatyou\Models\Apartment;
use Flatyou\Models\User;
use Flatyou\Models\Room;
use Flatyou\Models\Bed;


// Routes app
$app->get('/', function (Request $request, Response $response, array $args) 
{
    $app = new Apartment('2');
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


