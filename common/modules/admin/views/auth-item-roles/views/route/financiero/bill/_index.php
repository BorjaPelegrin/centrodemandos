<?php

$permisos =[
    [
        NOMBRE => 'ver-factura-recibida',
        RUTA => '/billing/bill/view',
        'sub' => [
            [
                NOMBRE => 'Exportar-facturas-recibidas',
                RUTA => '/billing/bill/export-to-excel-bill',
            ],
            [
                NOMBRE => 'añadir-factura-recibida',
                RUTA => '/financials/bill/create',
            ],
            [
                NOMBRE => 'botón-ver-factura',
                RUTA => '/billing/bill/view-ajax',
            ],
            [
                NOMBRE => 'botón-actualizar-factura',
                RUTA => '/billing/bill/form-ajax',
            ],
            [
                NOMBRE => 'botón-añadir-pago',
                RUTA => '/financials/payment/form-ajax',
            ],
            [
                NOMBRE => 'imprimir-facturas-recibidas',
                RUTA => '/listing/list-bill-received/print',
            ],
            [
                NOMBRE => 'exportar-facturas-recibidas-a-excel',
                RUTA => '/listing/list-bill-received/export-to-excel',
            ],
            /*[
                NOMBRE => 'imprimir-factura',
                RUTA => '/billing/bill/print',
            ],*/
            [
                NOMBRE => 'botón-ir-al-tratamiento',
                RUTA => '/historical/patient-treatment/view',
            ],
            [
                NOMBRE => 'botón-ver-el-pago',
                RUTA => '/financials/payment/view-ajax',
            ],
            [
                NOMBRE => 'botón-imprimir-el-pago',
                RUTA => '/financials/payment/print',
            ],
            [
                NOMBRE => 'botón-subir-archivo-del-pago',
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
    'route' => 'billing/bill/index',
    'url' => 'http://backend.minerva.lan/financials/bill/index',
]);
?>
