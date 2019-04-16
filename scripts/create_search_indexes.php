<?php

require 'include.php';

use Flatyou\Models\GoogleGeo;
use Flatyou\Models\Apartment;
use Flatyou\Models\User;
use Flatyou\Models\Room;
use Flatyou\Models\Bed;

$success = 0;
$failed  = 0;

$apartments = Apartment::getAll(false);
foreach($apartments as $a)
{
    $res = $a->updateSearchIndex();
    if($res)
    {
        $success++;
    }
    else
    {
        $failed++;
    }
}

echo 'INDICI TOTALI: ' . (int)($success + $failed) . "\n";
echo 'INDICI AGGIORNATI: ' . (int)($success) . "\n";
echo 'INDICI NON AGGIORNATE: ' . (int)($failed) . "\n";

?>