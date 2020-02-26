<?php

$permisos =[
    [
        NOMBRE => 'listado-de-empleados',
        RUTA => '/people/clinic-employee/view',
        'sub' => [
            [
                NOMBRE => 'añadir-empleado',
                RUTA => '/people/employee/form-ajax',
            ],
            [
                NOMBRE => 'generar-contraseña',
                RUTA => '/people/employee/generate-pass',
            ],
            [
                NOMBRE => 'ver-empleado-clínica',
                RUTA => '/people/clinic-employee/view',
            ],
            [
                NOMBRE => 'actualizar-empleado-clínica',
                RUTA => '/people/clinic-employee/update',
            ],
            [
                NOMBRE => 'borrar-empleado-clínica',
                RUTA => '/people/clinic-employee/delete',
            ],
            [
                NOMBRE => 'crear-usuario-clínica',
                RUTA => '/people/clinic-employee/add-user',
            ],
            [
                NOMBRE => 'ver-usuario-clínica',
                RUTA => '/admin/users/view',
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
