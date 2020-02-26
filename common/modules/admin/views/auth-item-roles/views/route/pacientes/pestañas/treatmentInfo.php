<?php

$permisos =[
    [
        NOMBRE => 'añadir-primera-sesión',
        RUTA => '/historical/patient-treatment/add-first-session',
        'sub' => [
            [
                NOMBRE => 'añadir-sesiones',
                RUTA => '/historical/patient-treatment/add-sessions',
            ],
            [
                NOMBRE => 'botón-asignar-empleado',
                RUTA => '/historical/patient-treatment/form-ajax',
            ],
            [
                NOMBRE => 'botón-asignar-pareja',
                RUTA => '/historical/patient-treatment/add-patient',
            ],
            [
                NOMBRE => 'ver-pareja-tratamiento',
                RUTA => '/people/patient/view-ajax',
            ],
            [
                NOMBRE => 'activar-puntos-VipCard',
                RUTA => '/people/vip-card/activate-points',
            ],
        ],
    ],
    [
        NOMBRE => 'listado-sesiones-del-tratamiento',
        RUTA => '/historical/list-patient-visit/view',
        'sub' => [
            [
                NOMBRE => 'ver-información-de-la-cita',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'dar-cita-del-tratamiento',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'Ver-archivos-de-la-cita',
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
