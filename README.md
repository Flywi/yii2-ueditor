# yii2-ueditor
UEditor for Yii2

## 安装

推荐使用

```
$ php composer.phar require flywi/yii2-ueditor "@dev"
```

或者将

```
"flywi/yii2-ueditor": "@dev"
```

加入到`composer.json`的`require`段中

## 使用
在`main.php`中加入
```php
    'modules' => [
        ....
        'editor' => ['class' => \Flywi\Editor\module\Module::class]
    ],
```
在`ActiveForm`中使用:
```php
...
echo $form->field($model, 'content')->widget(\Flywi\Editor\UEditor::class, [
    'id' => 'contentID',
    'config' => [
      // Ueditor的部分配置
      'serverUrl' => Url:to('..editor') // 对应于modules中editor的url
    ]
]);
...
```
直接使用:
```php
...
echo \Flywi\Editor\UEditor::widget([
        'name' => 'inputName',
        'id' => 'contentId',
        'config' => [
           // Ueditor的部分配置
             'serverUrl' => Url:to('..editor') // 对应于modules中editor的url
        ]
 ]);
...
```
## 其他
UEditor [配置参考](http://ueditor.baidu.com)
