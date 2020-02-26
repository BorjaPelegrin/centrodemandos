<?php

$permisos =[
    [
        NOMBRE => 'listado-pagos-del-tratamiento',
        RUTA => '/billing/bill/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-factura',
                RUTA => '/billing/bill/form-ajax',
            ],
            [
                NOMBRE => 'ver-factura',
                RUTA => '/billing/bill/view-ajax',
            ],
            [
                NOMBRE => 'actualizar-factura',
                RUTA => '/billing/bill/form-ajax',
            ],
            [
                NOMBRE => 'añadir-pago-factura',
                RUTA => '/financials/payment/form-ajax',
            ],
            [
                NOMBRE => 'imprimir-factura',
                RUTA => '/billing/bill/print',
            ],
            [
                NOMBRE => 'ver-el-tratamiento',
                RUTA => '/historical/patient-treatment/view',
            ],
            [
                NOMBRE => 'ver-el-pago',
                RUTA => '/financials/payment/view-ajax',
            ],
            [
                NOMBRE => 'desplegable-de-pagos',
                RUTA => '/financials/payment/view',
            ],
            [
                NOMBRE => 'imprimir-el-pago',
                RUTA => '/financials/payment/print',
            ],
            [
                NOMBRE => 'subir-archivo-del-pago',
                RUTA => '/media/media/form-widget',
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
