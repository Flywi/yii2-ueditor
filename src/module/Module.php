<?php

namespace Flywi\Editor\module;

use Flywi\Editor\module\components\Upload;
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

    ];
    /**
     * @var array
     */
    public $editorConfig = [];
    /**
     * @var array
     */
    public $defaultActionMap = [
        'config' => '/editor/config/index',
        'uploadimage' => Upload::class,
    ];

    /**
     * init
     */
    public function init()
    {
        parent::init();
        $this->prepare();
    }

    /**
     * prepare
     */
    public function prepare()
    {
        $config = require_once(__DIR__ . '/config/ueditor.php');
        $this->editorConfig = array_merge($config, $this->editorConfig);
        $this->actionMap = array_merge($this->defaultActionMap, $this->actionMap);
    }
}