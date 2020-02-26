<?php

$permisos =[
    [
        NOMBRE => 'página-principal-de-referencia-contable-clinica',
        RUTA => '/financials/issuing-company-clinic/index',
        'sub' => [
            [
                NOMBRE => 'nueva-referencia-contable-clinica',
                RUTA => '/financials/issuing-company-clinic/create',
            ],
            [
                NOMBRE => 'ver-referencia-contable-clinica',
                RUTA => '/financials/issuing-company-clinic/view',
            ],
            [
                NOMBRE => 'editar-referencia-contable-clinica',
                RUTA => '/financials/issuing-company-clinic/update',
            ],
        ],
    ],
    [
        NOMBRE => 'actualizar-valor-doble-click-referencia-contable-clinica',
        RUTA => '/financials/issuing-company-clinic/update-company',
        /*'sub' => [
            [
                NOMBRE => 'exportar-excel-listado',
                RUTA => '/listing/list/export-to-excel',
            ],
        ],*/
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'financials/issuing_company_clinic/index',
    'url' => 'http://backend.minerva.lan/financials/issuing_company_clinic/index',
]);
?>
