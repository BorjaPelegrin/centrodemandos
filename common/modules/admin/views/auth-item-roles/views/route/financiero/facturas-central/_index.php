<?php

$permisos =[
    [
        NOMBRE => 'facturas-central-listado',
        RUTA => '/financials/facturas-central/index',
        'sub' => [
            [
                NOMBRE => 'subir-facturas',
                RUTA => '/financials/facturas-central/upload',
            ],
            [
                NOMBRE => 'abrir-factura',
                RUTA => '/financials/facturas-central/open-file',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => '/financials/facturas-central/index',
    'url' => 'http://backend.minerva.lan/financials/bill/index',
]);
?>
