<?php

namespace Base\Lib;

use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Loader;

class BaseModule implements ModuleDefinitionInterface
{
    public $moduleName;
    public $moduleNamespace;

    public $loader;
    public $dispatcher;
    public $view;
    public $eventsManager;
    public $config;
    public $url;


    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {

        $this->loader = new Loader();

        $namespaceMap = $this->_getModuleNamespaceMap();
        $this->loader->registerNamespaces($namespaceMap);
        $this->loader->register();

        $di->set('loader', $this->loader);
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        $this->dispatcher = $di->getShared('dispatcher');
        $this->view = $di->getShared('view');
        $this->eventsManager = $di->getShared('eventsManager');
        $this->config = $di->getShared('config');
        $this->url = $di->get('url');

        // 设置默认命名空间
        $moduleNamespace = $this->_getModuleNamespace();
        $this->dispatcher->setDefaultNamespace("{$moduleNamespace}\\Controller");

        // 设置视图目录
        $this->view->setViewsDir(MODULES_DIR . $this->moduleName . DS . 'views');

        // 设置module的baseUri
        $this->url->setBaseUri(DS . $this->moduleName . DS);

        // 加载module配置文件
        $this->_loadModuleConfig();

        // 各module的独立操作
        $this->_handleServices();

        $this->dispatcher->setEventsManager($this->eventsManager);
        $this->view->setEventsManager($this->eventsManager);

        $di->set('dispatcher', $this->dispatcher);
        $di->set('view', $this->view);
        $di->set('config', $this->config);
        $di->set('url', $this->url);
    }

    protected function _loadModuleConfig() {
        $moduleConfigFile = MODULES_DIR . $this->moduleName . '/config/config.ini';
        $moduleConfig = new ConfigIni($moduleConfigFile);
        if ($moduleConfig) {
            $this->config->merge($moduleConfig);
        }
    }

    protected function _handleServices() {

    }

    protected function _getModuleNamespace() {
        return $this->moduleNamespace ? : 'Base\\' . ucfirst($this->moduleName);
    }

    protected function _getModuleNamespaceMap() {
        $moduleNamespace = $this->_getModuleNamespace();
        $namespaceMap = [
            "{$moduleNamespace}\\Controller" => MODULES_DIR . $this->moduleName . DS . 'controllers',
            "{$moduleNamespace}\\Lib" => MODULES_DIR . $this->moduleName . DS . 'lib',
            "{$moduleNamespace}\\DataService" => MODULES_DIR . $this->moduleName . DS . 'dataservice',
        ];
        return $namespaceMap;
    }
}
