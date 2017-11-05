<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['db'] = function ($c) {
    $db_conf = $c['settings']['db'];
    $db = new MysqliDb (Array (
                'host'     => $db_conf['host'],
                'username' => $db_conf['user'], 
                'password' => $db_conf['pass'],
                'db'       => $db_conf['name'],
                'charset'  => 'utf8'));
    return $db;
};