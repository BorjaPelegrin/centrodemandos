<?php
/**
 * @copyright Copyright (c) 2017
 * @license https://github.com/rmenor/
 * @link http://ramonmenor.es
 */

namespace themes\adminlte2\assets;

class CustomAssets extends \yii\web\AssetBundle
{
    public $sourcePath = '@themes/adminlte2';
    public $css = [
        'css/skin-pink.css',
        'css/custom.css'
    ];
    public $js = [
        'js/jquery.slimscroll.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
