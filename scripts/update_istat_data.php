<?php

require 'include.php';


use Flatyou\Models\GoogleGeo;
use Flatyou\Models\Apartment;
use Flatyou\Models\User;
use Flatyou\Models\Room;
use Flatyou\Models\Bed;


$apartments = Apartment::getAll();
foreach($apartments as $a)
{
    $a->updatePosition();
}

?>