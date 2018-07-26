<?php

namespace Flywi\Editor\module\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class ConfigController extends Controller
{
    public function actionIndex()
    {
        //Yii::$app->response->format = Response::FORMAT_JSON;
        $config = require_once(dirname(__DIR__) . '/config/ueditor.php');
        return json_encode($config);
    }
}