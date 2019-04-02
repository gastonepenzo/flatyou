<?php

$settings = [
    'settings' => [
        'google' => [
            'maps_api_key' => 'AIzaSyDIcRgn2HIAooRMKYoKrH3oI2ddiovI8QM'
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
        break;
}

return $settings;