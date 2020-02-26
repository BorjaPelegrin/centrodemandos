<?php
/**
 * @copyright Copyright (c) 2017
 * @license https://github.com/rmenor/
 * @link http://ramonmenor.es
 */

namespace themes\adminlte2\assets;

class AdminLteAssets extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css',
    ];
    public $js = [
        'js/adminlte.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
