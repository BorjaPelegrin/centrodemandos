<?php

$permisos =[
    [
        NOMBRE => 'listado-cobros-del-tratamiento',
        RUTA => '/financials/charge/view',
        'sub' => [
            [
                NOMBRE => 'botón-añadir-cobro',
                RUTA => '/financials/charge/form-ajax',
            ],
            [
                NOMBRE => 'ver-cobro',
                RUTA => '/financials/charge/view-ajax',
            ],
            /*[
                NOMBRE => 'actualizar-cobro',
                RUTA => '/financials/charge/form-ajax',
            ],*/
            [
                NOMBRE => 'imprimir-cobro',
                RUTA => '/financials/charge/print',
            ],
            [
                NOMBRE => 'añadir-justificante-transferencia',
                RUTA => '/media/media/form-widget',
            ],
            [
                NOMBRE => 'añadir-justificante-financiera',
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
