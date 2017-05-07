<?php

namespace Base\Frontend\Controller;

use Base\Lib\ControllerBase;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->pick('index/index');
    }

    public function testAction() {
        echo 'I just do not use hello world.';
    }

}

