<?php

require 'include.php';


use Flatyou\Models\GoogleGeo;
use Flatyou\Models\Apartment;
use Flatyou\Models\User;
use Flatyou\Models\Room;
use Flatyou\Models\Bed;

$success = 0;
$failed  = 0;

$apartments = Apartment::getAll();
foreach($apartments as $a)
{
    $res = $a->updatePosition();
    if($res)
    {
        $success++;
    }
    else
    {
        $failed++;
    }
}

echo 'POSIZIONI TOTALI: ' . (int)($success + $failed) . "\n";
echo 'POSIZIONI AGGIORNATE: ' . (int)($success) . "\n";
echo 'POSIZIONI NON AGGIORNATE: ' . (int)($failed) . "\n";

?>