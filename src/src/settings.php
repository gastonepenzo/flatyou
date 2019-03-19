<?php
return [
    'settings' => [
        'displayErrorDetails'    => true,  // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'db'=> [
            'host'     => 'localhost',
            'user'     => 'flatyou',
            'pass'     => 'flatyouweb',
            'name'     => 'flatyou'
        ],
        'google' => [
            'maps_api_key' => 'AIzaSyDIcRgn2HIAooRMKYoKrH3oI2ddiovI8QM'
        ] 
    ],
];
