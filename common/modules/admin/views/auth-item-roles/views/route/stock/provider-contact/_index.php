<?php

$permisos =[
    [
        NOMBRE => 'añadir-contacto-proveedor',
        RUTA => '/stock/provider-contact/create',
        'sub' => [
            [
                NOMBRE => 'ver-contacto-proveedor',
                RUTA => '/stock/provider-contact/view',
            ],
            [
                NOMBRE => 'actualizar-contacto-proveedor',
                RUTA => '/stock/provider-contact/update',
            ],
            [
                NOMBRE => 'actualizar-contacto-proveedor',
                RUTA => '/stock/provider-contact/change-to-archived',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'stock/provider/index',
    'url' => 'http://backend.minerva.lan/stock/provider/index',
]);
?>