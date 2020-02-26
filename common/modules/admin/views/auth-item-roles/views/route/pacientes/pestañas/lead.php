<?php

$permisos =[
    [
        NOMBRE => 'listado-de-solicitudes',
        RUTA => '/people/lead/view',
        'sub' => [
            [
                NOMBRE => 'añadir-solicitud',
                RUTA => '/people/patient/create-with-lead',
            ],
            [
                NOMBRE => 'ver-solicitud-del-paciente',
                RUTA => '/people/list-lead/view',
            ],
            [
                NOMBRE => 'botón-actualizar-paciente',
                RUTA => '/people/patient/update',
            ],
            [
                NOMBRE => 'botón-citar',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'botón-re-citar',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'botón-cita-comercial',
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
