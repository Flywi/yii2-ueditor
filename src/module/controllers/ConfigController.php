<?php

namespace Flywi\Editor\module\controllers;

use yii\web\Controller;

class ConfigController extends Controller
{
    public function actionIndex()
    {
        $config = require_once(dirname(__DIR__) . '/config/ueditor.php');
        return json_encode($config);
    }
}