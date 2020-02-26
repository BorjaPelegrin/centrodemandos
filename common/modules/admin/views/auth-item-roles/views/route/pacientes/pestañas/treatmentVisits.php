<?php

$permisos =[
    [
        NOMBRE => 'listado-citas-comerciales-tratamiento',
        RUTA => '/historical/list-patient-visit/view',
        'sub' => [
            [
                NOMBRE => 'botón-ver-cita-inicial',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'añadir-cita-comercial-tratamiento',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'dar-cita-comercial',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'ver-cita-comercial',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'ver-archivos-de-la-cita-comercial',
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
