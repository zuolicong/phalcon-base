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


}