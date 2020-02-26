<?php

$permisos =[
    [
        NOMBRE => 'añadir-departamento',
        RUTA => '/people/clinic-employee/add-department',
        'sub' => [
            [
                NOMBRE => 'borrar-departamento-añadido',
                RUTA => '/people/clinic-employee-department/delete',
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
