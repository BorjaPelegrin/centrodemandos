<?php

$permisos =[
    [
        NOMBRE => 'ver-información-de-caja',
        RUTA => '/financials/clinic-cash/view',
        'sub' => [
            [
                NOMBRE => 'corregir-caja',
                RUTA => '/financials/clinic-cash/form-ajax',
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
