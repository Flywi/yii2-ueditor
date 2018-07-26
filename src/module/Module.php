<?php

namespace Flywi\Editor\module;

use yii\base\Module as YiiModule;

class Module extends YiiModule
{
    public $controllerNamespace = 'Flywi\Editor\module\controllers';

    public $defaultRoute = 'index/index';

    public $actionMap = [
        'config' => '/editor/config/index',
        'uploadimage' => '/editor/upload/index'
    ];

    public function init()
    {
        $this->prepare();
        parent::init();
    }

    public function prepare(){

    }
}