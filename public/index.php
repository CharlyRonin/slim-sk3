<?php

// ----------- GLOBAL CONSTANTS
//define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__DIR__) );
define('SRC_PATH',  ROOT_PATH . '/src');
define('APP_PATH',  ROOT_PATH . '/app');
define('LOG_PATH',  ROOT_PATH . '/logs');



// ----------- COMPOSER
require_once ROOT_PATH . '/vendor/autoload.php';
session_start();

// ----------- SLIM FRAMEWORK
$settings = require APP_PATH . '/settings.php';
$app = new \Slim\App( $settings );
$container = $app->getContainer();

// Set up Dependencies
require APP_PATH . '/dependencies.php';

// Register middleware
require APP_PATH . '/middleware.php';

// Error Handler
require APP_PATH . '/errorHandler.php';

// Register routes
require APP_PATH . '/router.php';

try {
    $app->run();
} catch (\Slim\Exception\MethodNotAllowedException $e) {
    echo $e->getMessage();
} catch (\Slim\Exception\NotFoundException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}