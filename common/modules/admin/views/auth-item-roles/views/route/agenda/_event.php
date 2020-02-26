<?php

$permisos =[
    [
        NOMBRE => 'página-principal-del-listado-de-citas',
        RUTA => '/calendar/event/index',
        'sub' => [
            [
                NOMBRE => 'botón-imprimir-listado-de-citas',
                RUTA => '/calendar/event/print-all',
            ],
            [
                NOMBRE => 'ver-cita',
                RUTA => '/historical/patient-visit/view',
            ],
            [
                NOMBRE => 'buscador-seleccionar-empleado',
                RUTA => '/calendar/event/select-clinic-employee',
            ],
        ],
    ],
];

?>
<?php
echo Yii::$app->view->render('@modules/admin/views/auth-item-roles/views/route/_permission-layout', [
    'permisos' => $permisos,
    PARENT => $parent,
    'route' => 'calendar/event/index',
    'url' => 'http://backend.minerva.lan/calendar/index',
]);
?>
