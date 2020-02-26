<?php

return [
    /*'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to
        // use your own export download action or custom translation
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
    'redactor' => [
        'class' => 'yii\redactor\RedactorModule',
        'uploadDir' => '@webroot/media/img',
        'uploadUrl' => '@web/media/img',
        'imageAllowExtensions'=>['jpg','png','gif']
    ],
    'management' => [
        'class' => 'common\modules\management\Module',
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                //'*', // add or remove allowed actions to this list
            ]
        ],
    ],*//*
    'jodit' => [
        'class' => 'yii2jodit\JoditModule',
        'extensions'=>['jpg','png','gif'],
        'root'=> '@webroot/uploads/',
        'baseurl'=> '@web/uploads/',
        'maxFileSize'=> '20mb',
        'defaultPermission'=> 0775,
    ],*/

    'admin' => [
        'class' => 'common\modules\admin\Module',
        /*'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                //'*', // add or remove allowed actions to this list
            ]
        ],
        /*'modules' => [
            'rbac' => [
                'class' => 'mdm\admin\Module',
                'as access' => [
                    'class' => 'mdm\admin\components\AccessControl',
                    'allowActions' => [
                        //'*',
                    ]
                ],
                'controllerMap' => [
                    'assignment' => [
                        'class' => 'mdm\admin\controllers\AssignmentController',
                        'userClassName' => 'common\modules\admin\models\Users',
                        'searchClass' => 'common\modules\admin\searchs\UsersSearch',
                        'idField' => 'id',
                        'usernameField' => 'username',
                        //'fullnameField' => 'full_name',
                        'extraColumns' => [

                        ],
                    ],
                ],
                'layout' => 'left-menu',
                'mainLayout' => '@app/views/layouts/main.php',
            ],
        ],*/
    ],
    'dashboard' => [
        'class' => 'common\modules\dashboard\Module',
        /*'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
            ]
        ]*/
    ],
    'maintenance' => [
        'class' => 'common\modules\maintenance\Module',
        /*'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
            ]
        ]*/
    ],
];
