<?php

use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;

//error_reporting(E_ALL);

define('APP_PATH', realpath('..') . '/');
define('MODULES_DIR', APP_PATH . 'apps/modules/');
define('DS', DIRECTORY_SEPARATOR);

try {

    require_once APP_PATH . 'vendor/autoload.php';

    /**
     * The FactoryDefault Dependency Injector automatically registers the right services to provide a full stack framework
     */
    $di = new FactoryDefault();

    /**
     * Include services
     */
    require __DIR__ . '/../config/services.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Include modules
     */
    require __DIR__ . '/../config/modules.php';

    /**
     * Include routes
     */
    require __DIR__ . '/../config/routes.php';

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
