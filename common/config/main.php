<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => require(__DIR__ . '/modules.php'),
    'vendorPath' => dirname(__DIR__,2) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //Components

        'global' => [
            'class' => '\common\components\GlobalComponent'
        ],
        'menu' => [
            'class' => '\common\modules\admin\components\MenuComponent'
        ],
        'admin' => [
            'class' => '\common\modules\admin\components\AdminComponent'
        ],
        'users' => [
            'class' => '\common\modules\admin\components\UserComponent'
        ],
    ],
];
