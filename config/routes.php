<?php

use Phalcon\Mvc\Router;

/**
 * Registering a router
 */
$modules = $application->getModules();
$di->setShared('router', function () use ($modules) {
    // 不使用默认路由
    $router = new Router(false);

    /**
     * Remove Extra Slashes
     * http://docs.phalconphp.com/en/latest/reference/routing.html#dealing-with-extra-trailing-slashes
     */
    $router->removeExtraSlashes(true);

    $modules_name = array_keys($modules);
    $modules_pattern =  sprintf('(%s)', join('|', $modules_name));

    $router->add("/{$modules_pattern}/:controller/:action/:params", array(
        'module' => 1,
        'controller' => 2,
        'action' => 3,
        'params' => 4,
    ));

    return $router;
});

