<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger\Adapter\File as FileLoggerAdapter;
use Phalcon\Logger\Formatter\Line as LoggerFormatter;

/**
 * 设置全局配置文件
 */
$config = new ConfigIni(APP_PATH  . "/apps/config/config.ini");
$di->setShared('config', $config);

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->registerEngines(array(
        '.html' => 'Base\Lib\SmartyEngine',
    ));

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;

    return new $class($dbConfig);
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
});

/**
* Set dispatcher
*/
$di->setShared('dispatcher', function() use ($di) {
    $dispatcher = new Phalcon\Mvc\Dispatcher();
    $eventsManager = new EventsManager();
    $dispatcher->setEventsManager($eventsManager);
    return $dispatcher;
});

/**
 * 设置日志
 */
$di->setShared('log', function () use ($config) {
    $logDir = $config->application->logDir;
    if (!file_exists($logDir)) {
        mkdir($logDir, 0777, true);
    }
    $logFile = $logDir . date('Y_m_d') . '.log';
    $logger = new FileLoggerAdapter($logFile);
    $formatter = new LoggerFormatter();
    $formatter->setDateFormat('Y-m-d H:i:s');
    $logger->setFormatter($formatter);
    return $logger;
});

/**
 * 去掉model非空验证
 */
Phalcon\Mvc\Model::setup(['notNullValidations' => false]);
