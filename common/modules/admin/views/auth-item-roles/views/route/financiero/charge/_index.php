<?php

$permisos =[
    [
        NOMBRE => 'facturas-recibidas-ver-cobro',
        RUTA => '/financials/charge/view-ajax',
        'sub' => [
            /*[
                NOMBRE => 'facturas-recibidas-exportar-a-excel',
                RUTA => '/financials/charge/export-to-excel-charge',
            ],*/
            /*[
                NOMBRE => 'actualizar-cobro',
                RUTA => '/financials/charge/form-ajax',
            ],*/
            [
                NOMBRE => 'facturas-recibidas-imprimir-cobro',
                RUTA => '/financials/charge/print',
            ],
            [
                NOMBRE => 'imprimir-facturas-emitidas',
                RUTA => '/listing/list-bill-issued/print',
            ],
            [
                NOMBRE => 'exportar-facturas-emitidas-a-excel',
                RUTA => '/listing/list-bill-issued/export-to-excel',
            ],
            [
                NOMBRE => 'facturas-recibidas-añadir-justificante-transferencia',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'facturas-recibidas-añadir-justificante-financiera',
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
    'route' => 'financials/charge/index',
    'url' => 'http://backend.minerva.lan/financials/charge/index',
]);
?>
