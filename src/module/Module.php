<?php

namespace Flywi\Editor\module;

use yii\base\Module as YiiModule;

class Module extends YiiModule
{
    /**
     * @var string
     */
    public $controllerNamespace = 'Flywi\Editor\module\controllers';

    /**
     * @var string
     */
    public $defaultRoute = 'index/index';

    /**
     * @var array
     */
    public $actionMap = [
        'config' => '/editor/config/index',
        'uploadimage' => '/editor/upload/index'
    ];

    /**
     * init
     */
    public function init()
    {
        $this->prepare();
        parent::init();
    }

    /**
     * prepare
     */
    public function prepare(){

    }
}