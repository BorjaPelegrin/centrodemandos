<?php

$permisos =[
    [
        NOMBRE => 'añadir-actualizar-bloqueo-horario-empleado',
        RUTA => '/calendar/event/form-schedule-employee-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-bloqueo-horario-empleado',
                RUTA => '/calendar/event-meta/view',
            ],
            [
                NOMBRE => 'borrar-bloqueo-horario-empleado',
                RUTA => '/calendar/event/delete',
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
