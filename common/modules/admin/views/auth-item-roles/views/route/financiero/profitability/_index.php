<?php

$permisos =[
    [
        NOMBRE => 'página-principal-del-listado-de-citas',
        RUTA => '/calendar/event/index',
        'sub' => [
            [
                NOMBRE => 'ver-paciente-rentabilidad',
                RUTA => '/people/patient/view',
            ],
            [
                NOMBRE => 'ver-tratamiento-rentabilidad',
                RUTA => '/historical/patient-treatment/view',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'stock/profitability/index',
    'url' => 'http://backend.minerva.lan/stock/profitability/index',
]);
?>
