<?php

$permisos =[
    [
        NOMBRE => 'página-principal-de-los-pacientes',
        RUTA => '/people/patient/index',
        'sub' => [
            [
                NOMBRE => 'añadir-paciente',
                RUTA => '/people/patient/create',
            ],
            [
                NOMBRE => 'añadir-solicitud',
                RUTA => '/people/patient/create-with-lead',
            ],
            [
                NOMBRE => 'imprimir-listado-pacientes',
                RUTA => '/people/patient/print-all',
            ],
            [
                NOMBRE => 'exportar-a-excel-listado-pacientes',
                RUTA => '/people/patient/export-to-excel',
            ],
            [
                NOMBRE => 'ir-al-paciente',
                RUTA => '/people/patient/view',
            ],
            [
                NOMBRE => 'activar-desactivar-paciente',
                RUTA => '/people/patient/change-to-archived',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'people/patient/index',
    'url' => 'http://backend.minerva.lan/patient/index',
]);
?>
