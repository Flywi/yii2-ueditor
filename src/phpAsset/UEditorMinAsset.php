<?php

namespace Flywi\Editor\phpAsset;

use yii\web\AssetBundle;

class UEditorMinAsset extends AssetBundle
{
    public $sourcePath = '@UEditorAsset' . '/source';

    public $js = [
        'ueditor.config.js',
        'ueditor.all.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}