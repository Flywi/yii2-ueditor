<?php

namespace Flywi\Editor\module\components;

use yii\web\UploadedFile;

class Upload
{
    public static function run(UploadedFile $file)
    {
       echo $file->name;
    }
}