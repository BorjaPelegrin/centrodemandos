<?php

$permisos =[
    [
        NOMBRE => 'listado-de-citas-de-la-solicitud',
        RUTA => '/historical/list-patient-visit/view',
        'sub' => [
            [
                NOMBRE => 'dar-cita-de-la-solicitud',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'ver-cita-de-la-solicitud',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'ver-archivos-de-la-cita',
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
