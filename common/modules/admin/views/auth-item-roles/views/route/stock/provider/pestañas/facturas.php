<?php

$permisos =[
    [
        NOMBRE => 'añadir-factura-proveedor',
        RUTA => '/billing/bill/form-ajax',
    ],
    [
        NOMBRE => 'ver-factura-proveedor',
        RUTA => '/financials/bills/view',
        'sub' => [
            [
                NOMBRE => 'imprimir-factura-proveedor',
                RUTA => '/financials/bills/print',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
]);
?>