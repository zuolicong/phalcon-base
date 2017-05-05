<?php

use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;

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
    error_log($e->getMessage());
    error_log($e->getTraceAsString());
    $response = [
        'code' => $e->getCode(),
        'msg' => $e->getMessage(),
    ];
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}
