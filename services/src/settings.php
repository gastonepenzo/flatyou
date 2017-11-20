<?php
return [
    'settings' => [
        'displayErrorDetails'    => true,  // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        'db'=> [
            'host'     => 'localhost',
            'user'     => 'root',
            'pass'     => 'c30,db',
            'name'     => 'tmp2'
        ],
        
        // Monolog settings
        'logger' => [
            'name' => 'FLATYOU-SERVICES',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
