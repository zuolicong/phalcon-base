<?php
namespace Base\Lib;

use \Phalcon\Mvc\View\Engine;

class SmartyEngine extends Engine {

    public $_smarty;

    public function __construct($view, $dependencyInjector)
    {
        $this->_smarty = new \Smarty();
        $this->_smarty->template_dir = $view->getViewsDir();
        $this->_smarty->config_dir = TMP_DIR . 'config';
        $this->_smarty->compile_dir = TMP_DIR . 'compile';
        $this->_smarty->cache_dir = TMP_DIR . 'cache';
        $this->_smarty->caching = false;
        $this->_smarty->debugging = true;
        $this->_smarty->left_delimiter = '{{ ';
        $this->_smarty->right_delimiter = ' }}';

        parent::__construct($view, $dependencyInjector);
    }

    public function render($path, $params) {
        $content = $this->fetch($path, $params);
        $this->view->setContent($content);
    }

    public function fetch($path, $params) {
        if (!isset($params['content'])) {
            $params['content'] = $this->view->getContent();
        }
        foreach ($params as $key => $value) {
            $this->_smarty->assign($key, $value);
        }
        return $this->_smarty->fetch($path);
    }

    // 设置参数
    public function setOption($options) {
        foreach ($options as $k => $v) {
            $this->_smarty->$k = $v;
        }
    }

}
