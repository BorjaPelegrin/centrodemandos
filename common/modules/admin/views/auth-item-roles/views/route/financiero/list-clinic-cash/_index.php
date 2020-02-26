<?php

$permisos =[
    [
        NOMBRE => 'imprimir-listado-caja',
        RUTA => '/listing/list-clinic-cash/print',
        'sub' => [
            [
                NOMBRE => 'cerrar-caja',
                RUTA => '/financials/clinic-cash/form-ajax',
            ],
            [
                NOMBRE => 'añadir-movimiento-caja',
                RUTA => '/listing/list-clinic-cash/form-ajax-movement',
            ],
            [
                NOMBRE => 'ver-movimiento-caja',
                RUTA => '/financials/clinic-cash/view',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'listing/list-clinic-cash/index',
    'url' => 'http://backend.minerva.lan/listing/list-clinic-cash/index',
]);
?>
