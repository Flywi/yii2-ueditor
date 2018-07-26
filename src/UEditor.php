<?php

namespace Flywi\Editor;

use Flywi\Editor\asset\UEditorAsset;
use Flywi\Editor\asset\UEditorMinAsset;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\InputWidget;

class UEditor extends InputWidget
{
    /**
     *ueditor version
     */
    const UE_VERSION = '1.4.3.3';
    /**
     * @var $id
     */
    public $id;
    /**
     * @var bool
     */
    public $minJs = true;
    /**
     * @var array
     */
    public $config = [

    ];
    /**
     * @var array
     */
    private $_defaultConfig = [
        'toolbars' => [
            [
                'undo', //撤销
                'bold', //加粗
                'italic', //斜体
                'underline', //下划线
                'strikethrough', //删除线
                'formatmatch', //格式刷
                'selectall', //全选
                'print', //打印
                'link', //超链接
                'unlink', //取消链接
                'fontfamily', //字体
                'fontsize', //字号
                'simpleupload', //单图上传
                'insertimage', //多图上传
                'help', //帮助
                'justifyleft', //居左对齐
                'justifyright', //居右对齐
                'justifycenter', //居中对齐
                'justifyjustify', //两端对齐
                'forecolor', //字体颜色
                'backcolor', //背景色
                'touppercase', //字母大写
                'tolowercase', //字母小写
            ]
        ],
        'initialFrameWidth' => 700,//宽度
        'initialFrameHeight' => 320,//高度
    ];
    /**
     * @var null
     */
    private $_editorName = NULL;

    public function init()
    {
        parent::init();
        $this->prepare();
    }

    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
    }

    /**
     * prepare for the Widget
     */
    protected function prepare()
    {
        $this->resolveConfig();
        $this->registerAlias();
        $this->registerAsset();
        $this->registerJs();
    }

    /**
     * resolve config
     */
    protected function resolveConfig()
    {
        // add serveUrl
        $this->_defaultConfig['serverUrl'] =  Url::to('/editor');

        if (empty($this->_editorName)) {
            $this->_editorName = '_ueditor' . $this->getId();
        }
        if (empty($this->id)) {
            $this->id = $this->_editorName;
        }
        if (empty($this->options)) {
            $this->options = [];
        }
        $this->options = array_merge($this->options, [
            'id' => $this->id ?: $this->_editorName,
        ]);
        $this->config = array_merge($this->_defaultConfig, $this->config);
    }

    /**
     * register alias
     */
    protected function registerAlias()
    {
        Yii::setAlias('@UEditorAsset', __DIR__ . '/resource');
    }

    /**
     * register assets
     */
    protected function registerAsset()
    {
        /* @var $view View */
        $view = $this->getView();
        if ($this->minJs === true) {
            UEditorMinAsset::register($view);
        } else {
            UEditorAsset::register($view);
        }

    }

    /**
     * register js
     */
    protected function registerJs()
    {
        $editorName = $this->_editorName;
        $id = $this->id;
        $editorConfig = json_encode($this->config);
        $js = <<<JS
var {$editorName} = UE.getEditor("{$id}",{$editorConfig});
JS;
        /* @var $view View */
        $view = $this->getView();
        $view->registerJs($js);
    }

}