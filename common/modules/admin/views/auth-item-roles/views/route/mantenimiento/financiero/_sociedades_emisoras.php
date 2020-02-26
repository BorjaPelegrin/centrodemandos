<?php

$permisos =[
    [
        NOMBRE => 'página-principal-de-sociedad-emisora',
        RUTA => '/financials/issuing-company/index',
        'sub' => [
            [
                NOMBRE => 'nueva-sociedad-emisora',
                RUTA => '/financials/issuing-company/create',
            ],
            [
                NOMBRE => 'ver-sociedad-emisora',
                RUTA => '/financials/issuing-company/view',
            ],
            [
                NOMBRE => 'editar-sociedad-emisora',
                RUTA => '/financials/issuing-company/update',
            ],
        ],
    ],
    /*[
        NOMBRE => 'actualizar-valor-doble-click-referencia-contable-clinica',
        RUTA => '/listing/list/print-list',
        'sub' => [
            [
                NOMBRE => 'exportar-excel-listado',
                RUTA => '/listing/list/export-to-excel',
            ],
        ],
    ],*/
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'financials/issuing_company/index',
    'url' => 'http://backend.minerva.lan/financails/issuing_company/index',
]);
?>
