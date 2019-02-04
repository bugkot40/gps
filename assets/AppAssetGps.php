<?php


namespace app\assets;


use yii\web\AssetBundle;

class AppAssetGps extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/gps.css',
    ];
    public $js = [
        'js/gps.js'
    ];
    public $depends = [
        'yii\web\YiiAsset', //jQuery
        'yii\bootstrap\BootstrapPluginAsset', //Bootstrap.min.css и Bootstrap.min.js
    ];

}