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
    $apartment = new Apartment($args['code']);
    if(!$apartment->exists())
    {
        echo "404";
    }
    else
    {
        return $this->view->render($response, 'apartment.html', ['apartment' => $apartment]);
    }
})->setName('profile_apartment');



