<?php

/* @var $parent */

use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'crear-nuevo-formulario',
        RUTA => '/documents/document/create',
        'sub' => [
            [
                NOMBRE => 'exportar-formularios-excel',
                RUTA => '/documents/document/export-to-excel',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-formularios',
        RUTA => '/documents/document/view',
        'sub' => [
            [
                NOMBRE => 'actualizar-formularios',
                RUTA => '/documents/document/update',
            ],
            /*
             *  Para las pestañas que de momento no tienen permiso
             [
                NOMBRE => 'actualizar-tratamiento',
                RUTA => '/treatments/treatment/update',
            ],
            [
                NOMBRE => 'activar-desactivar-tratamiento',
                RUTA => '/treatments/treatment/change-to-archived',
            ],*/
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'treatments/treatment/index',
    'url' => 'http://backend.minerva.lan/treatments/treatment/index',
]);

?>
<strong>Las pestañas de los formularios no tienen permisos</strong>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'documentsPermissionTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Atributos',
            CONTENT => Yii::$app->view->render('pestanas/formulario_atributos', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Categorías',
            CONTENT => Yii::$app->view->render('pestanas/formulario_categorias', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Vista del formulario',
            CONTENT => Yii::$app->view->render('pestanas/formulario_vista', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>
