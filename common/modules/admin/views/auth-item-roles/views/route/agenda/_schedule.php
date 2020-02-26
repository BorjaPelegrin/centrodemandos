<?php

$permisos =[
    [
        NOMBRE => 'página-principal-de-la-agenda',
        RUTA => '/calendar/event/schedule',
        'sub' => [
            [
                NOMBRE => 'nueva-cita',
                RUTA => '/people/patient/create-with-lead',
            ],
            [
                NOMBRE => 'mi-agenda-calendario',
                RUTA => '/calendar/event/miAgenda',
            ],
            [
                NOMBRE => 'por-doctor',
                RUTA => '/calendar/event/doctor',
            ],
            [
                NOMBRE => 'por-tratamiento',
                RUTA => '/calendar/event/treatment',
            ],
            [
                NOMBRE => 'listado-de-citas',
                RUTA => '/calendar/event/index',
            ],
            [
                NOMBRE => 'mostrar-cuadros-de-citas',
                RUTA => '/calendar/event/events',
            ],
            [
                NOMBRE => 'añadir-cuadro-de-la-cita',
                RUTA => '/calendar/event/event-edit',
            ],
            [
                NOMBRE => 'ver-información-cita',
                RUTA => '/calendar/event/view-ajax',
            ],
            [
                NOMBRE => 'marcar-cita-en-espera',
                RUTA => '/calendar/event/waiting',
            ],
            [
                NOMBRE => 'marcar-cita-atendida',
                RUTA => '/calendar/event/served',
            ],
            [
                NOMBRE => 'marcar-cita-cancelada',
                RUTA => '/calendar/event/cancel',
            ],
            [
                NOMBRE => 'marcar-cita-no-vino',
                RUTA => '/calendar/event/event-attended',
            ],
            [
                NOMBRE => 'confirmar-cita',
                RUTA => '/historical/patient-visit/confirm',
            ],
        ],
    ],
];

?>

<?php
    echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
        'permisos' => $permisos,
        PARENT => $parent,
        'route' => 'calendar/event/schedule',
        'url' => 'http://backend.minerva.lan/calendar/schedule',
    ]);
?>
