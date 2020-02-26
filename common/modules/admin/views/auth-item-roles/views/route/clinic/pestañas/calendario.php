<?php

$permisos =[
    [
        NOMBRE => 'nuevo-horario',
        RUTA => '/calendar/event/form-schedule-employee-ajax',
        'sub' => [
            [
                NOMBRE => 'ver-horario',
                RUTA => '/calendar/event-meta/view',
            ],
            [
                NOMBRE => 'actualizar-horario',
                RUTA => '/calendar/event/form-schedule-employee-ajax',
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
