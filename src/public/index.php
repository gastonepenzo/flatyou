<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) 
{
    $view = new \Slim\Views\Twig('twig/templates', ['cache' => $container->get('settings')['twig_cache']]);

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));

    return $view;
};

// Load db class
require __DIR__ . '/../src/db.php';
require __DIR__ . '/../src/mail.php';

//Load models
require __DIR__ . '/../models/Model.class.php';
require __DIR__ . '/../models/GoogleGeo.class.php';
require __DIR__ . '/../models/User.class.php';
require __DIR__ . '/../models/Photo.class.php';
require __DIR__ . '/../models/Comment.class.php';
require __DIR__ . '/../models/Room.class.php';
require __DIR__ . '/../models/Bed.class.php';
require __DIR__ . '/../models/Apartment.class.php';

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
//require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';


// Run app
$app->run();
