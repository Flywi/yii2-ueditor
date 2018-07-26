<?php

namespace Flywi\Editor\asset;

use yii\web\AssetBundle;

class UEditorMinAsset extends AssetBundle
{
    public $sourcePath = '@UEditorAsset';

    public $js = [
        'ueditor.config.js',
        'ueditor.all.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}