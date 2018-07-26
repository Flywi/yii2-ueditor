<?php

namespace Flywi\Editor\asset;

use yii\web\AssetBundle;

class UEditorAsset extends AssetBundle
{
    public $sourcePath = '@UEditorAsset';

    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}