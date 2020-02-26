<?php

$permisos =[
    [
        NOMBRE => 'ver-solicitud-online',
        RUTA => '/people/leads/view',
        'sub' => [
            [
                NOMBRE => 'imprimir-excel-solicitudes-online',
                RUTA => '/people/leads/export-to-excel',
            ],
            [
                NOMBRE => 'imprimir-csv-solicitudes-online',
                RUTA => '/people/leads/export-to-csv',
            ],
            [
                NOMBRE => 'imprimir-informe-solicitudes-online',
                RUTA => '/people/leads/export-to-report',
            ],
            [
                NOMBRE => 'importar-leads-csv',
                RUTA => '/people/leads/import-csv',
            ],
        ],
    ],
    [
        NOMBRE => 'ver-nombre-paciente-solicitud-online',
        RUTA => 'infoPatientName',
        'sub' => [
            [
                NOMBRE => 'ver-apellidos-paciente-solicitud-online',
                RUTA => 'infoPatientSurname',
            ],
            [
                NOMBRE => 'ver-telefono-paciente-solicitud-online',
                RUTA => 'infoPatientPhone',
            ],
            [
                NOMBRE => 'ver-email-paciente-solicitud-online',
                RUTA => 'infoPatientEmail',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'people/channel/index',
    'url' => 'http://backend.minerva.lan/people/channel/index',
]);
?>
