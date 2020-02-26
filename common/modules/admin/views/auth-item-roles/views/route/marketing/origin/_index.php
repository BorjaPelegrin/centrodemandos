<?php

$permisos =[
    [
        NOMBRE => 'añadir-origen',
        RUTA => '/maintenance/origin/create',
        'sub' => [
            [
                NOMBRE => 'activar-desactivar-origen',
                RUTA => '/maintenance/origin/change-to-archived',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'maintenance/origin/index',
    'url' => 'http://backend.minerva.lan/maintenance/origin/index',
]);
?>
