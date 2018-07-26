<?php

namespace Flywi\Editor\module\controllers;

use yii\web\Controller;

class UploadController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex(){
var_dump($_FILES);
    }
}