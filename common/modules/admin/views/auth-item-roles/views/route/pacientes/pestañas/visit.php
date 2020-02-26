<?php

$permisos =[
    [
        NOMBRE => 'listado-de-citas-del-paciente',
        RUTA => '/historical/list-patient-visit/view',
        'sub' => [
            [
                NOMBRE => 'botón-cita-comercial',
                RUTA => '/historical/list-patient-visit/create',
            ],
            [
                NOMBRE => 'botón-cita-no-comercial',
                RUTA => '/historical/list-patient-visit/create',
            ],
            [
                NOMBRE => 'ver-cita-paciente',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'ver-archivos-cita',
                RUTA => '/historical/list-patient-visit/view-ajax',
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
