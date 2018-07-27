<?php

namespace Flywi\Editor\module\controllers;

use Flywi\Editor\module\Module;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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

        $actionMap = $module->actionMap;
        $config = $module->editorConfig;

        if (isset($module->actionMap[$action])) {
            // 区分action
            if ($action == 'config') {
                return $this->redirect([$actionMap[$action]]);
            }
            if (in_array($action, [
                $config['imageActionName'],
                $config['fileActionName'],
                $config['videoActionName'],
                $config['scrawlActionName'],
            ])) {
                $uploadMap = [
                    'imageActionName' => $config['imageActionName'],
                    'fileActionName' => $config['fileActionName'],
                    'videoActionName' => $config['videoActionName'],
                    'scrawlActionName' => $config['scrawlActionName'],
                ];
                $fileNameKey = NULL;
                foreach ($uploadMap as $key => $val) {
                    if ($val == $action) {
                        $fileNameKey = str_replace('Action', 'Field', $key);
                    }
                }
                $file = UploadedFile::getInstanceByName($config[$fileNameKey]);
                if (!$file) {
                    throw new \Exception('file upload error!');
                }
                $redirectValue = $module->actionMap['uploadimage'];
                if (is_callable($redirectValue)) {
                    return call_user_func_array($redirectValue, [$file, $config]);
                }
                if (is_string($redirectValue)) {
                    return call_user_func_array([$redirectValue, 'run'], [$file, $config]);
                }
                if (is_array($redirectValue)) {
                    return call_user_func_array($redirectValue, [$file, $config]);
                }
                throw new \Exception('please check the modules settings <actionMap>');
            }
            throw new \Exception('not support now');
        }
    }
}