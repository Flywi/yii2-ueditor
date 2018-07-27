<?php

namespace Flywi\Editor\module\controllers;

use Flywi\Editor\module\Module;
use yii\web\Controller;

class ConfigController extends Controller
{
    public function actionIndex()
    {
        /* @var $module Module */
        $module = $this->module;
        return json_encode($module->editorConfig);
    }
}