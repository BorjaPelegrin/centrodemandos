<?php

$permisos =[
    [
        NOMBRE => 'asignar-área-empleado-clínica',
        RUTA => '/people/clinic-employee-area/form-ajax',
        'sub' => [
            [
                NOMBRE => 'borrar-área-empleado-clínica',
                RUTA => '/people/clinic-employee-area/delete',
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
