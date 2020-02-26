<?php

$permisos =[
    [
        NOMBRE => 'página-principal-de-solicitudes',
        RUTA => '/people/lead/index',
        'sub' => [
            [
                NOMBRE => 'añadir-solicitud',
                RUTA => '/people/patient/create-with-lead',
            ],
            [
                NOMBRE => 'imprimir-listado-de-solicitudes',
                RUTA => '/people/lead/print-all',
            ],
            [
                NOMBRE => 'excel-listado-de-solicitudes',
                RUTA => '/people/lead/export-to-excel',
            ],
            [
                NOMBRE => 'paciente',
                RUTA => '/people/patient/view',
            ],
            [
                NOMBRE => 'ver-solicitud',
                RUTA => '/people/lead/view',
            ],
            [
                NOMBRE => 'activar-desactivar-solicitud',
                RUTA => '/people/list-lead/change-to-archived',
            ],
            [
                NOMBRE => 'Cambiar-canal-solicitud',
                RUTA => '/people/lead/change-channel',
            ],
            [
                NOMBRE => 'actualizar-paciente',
                RUTA => '/people/patient/update',
            ],
            [
                NOMBRE => 'citar',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 're-citar',
                RUTA => '/calendar/event/schedule',
            ],
            [
                NOMBRE => 'cita-comercial',
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
    'route' => 'people/lead/index',
    'url' => 'http://backend.minerva.lan/lead/index',
]);
?>
