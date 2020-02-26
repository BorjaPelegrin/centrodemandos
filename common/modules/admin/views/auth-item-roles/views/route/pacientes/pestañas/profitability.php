<?php

$permisos =[
    [
        NOMBRE => 'información-de-la-rentabilidad',
        RUTA => '/stock/profitability/index',
    ],
    [
        NOMBRE => 'listado-de-rentabilidad-por-tratamientos',
        RUTA => '/historical/list-patient-treatment/view',
        'sub' => [
            [
                NOMBRE => 'botón-ver-tratamiento',
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
]);
?>
