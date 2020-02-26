<?php
use yii\bootstrap\Tabs;

$permisos =[
    [
        NOMBRE => 'añadir-artículo',
        RUTA => '/resources/resource/create',
        'sub' => [
            [
                NOMBRE => 'ver-artículo',
                RUTA => '/resources/resource/view',
            ],
            [
                NOMBRE => 'actualizar-artículo',
                RUTA => '/resources/resource/update',
            ],
            [
                NOMBRE => 'borrar-artículo',
                RUTA => '/resources/resource/delete',
            ],
        ],
    ],
    [
        NOMBRE => 'todas-las-pestañas-del-recurso',
        RUTA => 'resource_tab',
        'sub' => [
            [
                NOMBRE => 'pestaña-proveedores',
                RUTA => 'tabProvider',
            ],
            [
                NOMBRE => 'pestaña-clínicas',
                RUTA => 'tabClinics',
            ],
            [
                NOMBRE => 'pestaña-ficheros',
                RUTA => 'tabMedia',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'resources/resource/index',
    'url' => 'http://backend.minerva.lan/resources/resource/index',
]);
?>

<?= Tabs::widget([
    'navType' => 'nav-pills',
    'options' => [
        'id' => 'resourceTabs',
    ],
    ITEMS => [
        [
            LABEL => 'Proveedores',
            CONTENT => Yii::$app->view->render('pestañas/proveedor', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Clínicas',
            CONTENT => Yii::$app->view->render('pestañas/clinicas', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
        [
            LABEL => 'Ficheros',
            CONTENT => Yii::$app->view->render('pestañas/ficheros', [
                PARENT => $parent,
                RESULT => $result
            ]),
        ],
    ],
]) ?>