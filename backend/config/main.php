<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$config = [
    'id' => 'entrenamientos',
    'name' => 'backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        /*'user' => [
            'identityClass' => 'common\modules\admin\models\Users',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            // Time auto-logout
            'authTimeout' => 43200, // Tiempo de espera para logout
            // Url for login
            'loginUrl' => ['site/login'],
            // Url after login
            'returnUrl' => ['site/index']
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'class' => 'yii\web\DbSession',
            'writeCallback' => function ($session) {
                return [
                    'user_id' => Yii::$app->user->id,
                    'last_write' => time(),
                ];
            },
            'timeout' => 43200 // Tiempo de espera para logout 12 Horas
        ],*/
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => require(__DIR__ . '/rules.php'),
        'view' => [
            'theme' => [
                'basePath' => '@app/../themes/adminlte2',
                'baseUrl' => '@web',
                'pathMap' => [
                    '@app/views' => '@app/../themes/adminlte2',
                ],
            ],
        ],
        /*'view' => [
            'theme' => [
                'basePath' => '@app/../themes/adminlte',
                'baseUrl' => '@web',
                'pathMap' => [
                    '@app/views' => '@app/../themes/adminlte',
                ],
            ],
        ],*/
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
