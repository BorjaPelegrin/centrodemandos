<?php

$permisos =[
    [
        NOMBRE => 'listado-de-tratamientos',
        RUTA => '/historical/list-patient-treatment/view',
        'sub' => [
            [
                NOMBRE => 'ver-listado-tratamientos-de-la-pareja',
                RUTA => '/treatments/related-treatment/view',
            ],
            [
                NOMBRE => 'botón-añadir-tratamiento',
                RUTA => '/historical/patient-treatment/create',
            ],
            [
                NOMBRE => 'ver-tratamiento-del-paciente',
                RUTA => '/historical/patient-treatment/view',
            ],
            [
                NOMBRE => 'botón-enviar-email',
                RUTA => '/historical/patient-treatment/send',
            ],
            [
                NOMBRE => 'ver-sesiones-de-los-tratamientos',
                RUTA => '/historical/list-patient-visit/view',
            ],
            [
                NOMBRE => 'ver-cita-de-sesión',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'citar-la-sesión',
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
