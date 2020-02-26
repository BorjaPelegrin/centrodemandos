<?php

$permisos =[
    [
        NOMBRE => 'listado-de-tratamientos-de-la-solicitud',
        RUTA => '/historical/list-patient-treatment/view',
        'sub' => [
            [
                NOMBRE => 'ver-tratamiento-del-paciente-de-la-solicitud',
                RUTA => '/historical/patient-treatment/view',
            ],
            [
                NOMBRE => 'botón-enviar-email-de-la-solicitud',
                RUTA => '/historical/patient-treatment/send',
            ],
            [
                NOMBRE => 'ver-sesiones-de-los-tratamientos-de-la-solicitud',
                RUTA => '/historical/list-patient-visit/view',
            ],
            [
                NOMBRE => 'ver-cita-de-sesión-de-la-solicitud',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'citar-la-sesión-de-la-solicitud',
                RUTA => '/calendar/event/schedule',
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
