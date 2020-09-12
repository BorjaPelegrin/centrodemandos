<?php
/**
 * @copyright Copyright (c) 2017
 * @license https://github.com/rmenor/
 * @link http://ramonmenor.es
 */

namespace themes\custom\assets;

class CustomAssets extends \yii\web\AssetBundle
{
    public $sourcePath = '@themes/custom';
    public $css = [
        'css/skin-angel.css',
        'css/custom.css'
    ];
    public $js = [
        //'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
