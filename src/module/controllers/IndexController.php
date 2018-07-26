<?php

namespace Flywi\Editor\module\controllers;

use Flywi\Editor\module\Module;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $queryParams = Yii::$app->request->queryParams;
        if (!isset($queryParams['action'])) {
            throw new NotFoundHttpException('params should include <action>');
        }
        $action = strtolower($queryParams['action']);
        /* @var $module Module */
        $module = $this->module;
        if (isset($module->actionMap[$action])) {
            return $this->redirect([$module->actionMap[$action]]);
        }
    }
}