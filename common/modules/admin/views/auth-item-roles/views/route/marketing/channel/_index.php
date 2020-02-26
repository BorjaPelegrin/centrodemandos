<?php

$permisos =[
    [
        NOMBRE => 'ver-canal',
        RUTA => '/people/channel/view',
        'sub' => [
            [
                NOMBRE => 'actualizar-canal',
                RUTA => '/people/channel/update',
            ],
            [
                NOMBRE => 'borrar-canal',
                RUTA => '/people/channel/delete',
            ],
            [
                NOMBRE => 'asignar-un-origen',
                RUTA => '/people/channel-origin/create-ajax',
            ],
            [
                NOMBRE => 'ver-origen',
                RUTA => '/maintenance/origin/view',
            ],
            [
                NOMBRE => 'borrar-origen',
                RUTA => '/people/channel-origin/delete',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'people/channel/index',
    'url' => 'http://backend.minerva.lan/people/channel/index',
]);
?>
