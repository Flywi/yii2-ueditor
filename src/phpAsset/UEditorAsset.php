<?php

namespace Flywi\Editor\phpAsset;

use yii\web\AssetBundle;

class UEditorAsset extends AssetBundle
{
    public $sourcePath = '@UEditorAsset' . '/source';

    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}