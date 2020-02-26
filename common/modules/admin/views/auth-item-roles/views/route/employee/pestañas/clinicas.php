<?php

$permisos =[
    [
        NOMBRE => 'página-principal-del-listado-de-citas',
        RUTA => '/calendar/event/index',
        'sub' => [
            [
                NOMBRE => 'ver-la-clínica',
                RUTA => '/clinic/clinic/view',
            ],
            [
                NOMBRE => 'actualizar-empleado-clinica',
                RUTA => '/people/clinic-employee/update',
            ],
            [
                NOMBRE => 'desactivar-empleado-clinica',
                RUTA => '/people/clinic-employee/deactive-employee',
            ],
            [
                NOMBRE => 'crear-usuario-clinica',
                RUTA => '/people/clinic-employee/add-user',
            ],
            [
                NOMBRE => 'ver-usuario-clinica',
                RUTA => '/admin/users/view',
            ],
            [
                NOMBRE => 'asignar-clinica-por-defecto',
                RUTA => '/people/clinic-employee/clinic-default',
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
