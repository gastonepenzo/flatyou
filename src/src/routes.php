<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Flatyou\Models\GoogleGeo;
use Flatyou\Models\Apartment;
use Flatyou\Models\User;
use Flatyou\Models\Room;
use Flatyou\Models\Bed;


// Routes app
$app->get('/apartment/{code:[A-Za-z0-9]{8}}', function (Request $request, Response $response, array $args) 
{
    //var_dump($args['id']);
    $app = new Apartment($args['code']);
    if(!$app->exists())
    {
        var_dump("non esiste");
    }
    else
    {
        echo '<html><body>' . $app->getMap() . '</body></html>';
    }
});

$app->post('/test', function (Request $request, Response $response, array $args) 
{
    $data = $request->getParams();
    return $response->withJson($data);
});


