<?php

$settings = [
    'settings' => [
        'google' => [
            'maps_api_key' => 'AIzaSyDgIEKrsuRlWqAQWEgmTTPp4V1mAjxh4tE'
        ],
        'photos_path' => '/img/'
    ],
];

switch($_SERVER['FYENV'])
{
    case 'development':
        $settings['settings']['host'] = 'http://dev.flatyou.it';
        $settings['settings']['db']= [
            'host'     => '52.28.51.146',
            'user'     => 'flatyou',
            'pass'     => 'flatyouweb',
            'name'     => 'flatyou'
        ];
        $settings['settings']['displayErrorDetails']    = true;
        $settings['settings']['addContentLengthHeader'] = true;
        $settings['settings']['twig_cache']             = false;
        $settings['settings']['mail'] = [
            'from'     => 'flatyou.devel@gmail.com',
            'smtp'     => 'smtp.gmail.com',
            'username' => 'flatyou.devel@gmail.com',
            'password' => 'Winston82',
            'auth'     => true,
            'secure'   => 'tls',
            'port'     => 587
            
        ];
        break;
    default:
        $settings['settings']['host'] = 'http://www.flatyou.it';
        $settings['settings']['db']= [
            'host'     => 'localhost',
            'user'     => 'flatyou',
            'pass'     => 'flatyouweb',
            'name'     => 'flatyou'
        ];
        $settings['settings']['displayErrorDetails']    = false;
        $settings['settings']['addContentLengthHeader'] = false;
        $settings['settings']['twig_cache']             = 'twig/cache';
        $settings['settings']['mail'] = [
            'from'     => 'flatyou.devel@gmail.com',
            'smtp'     => 'smtp.gmail.com',
            'username' => 'flatyou.devel@gmail.com',
            'password' => 'Winston82',
            'auth'     => true,
            'secure'   => 'tls',
            'port'     => 587
            
        ];
        break;
}

return $settings;