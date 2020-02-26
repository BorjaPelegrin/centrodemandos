<?php

$permisos =[
    [
        NOMBRE => 'añadir-puesto',
        RUTA => '/people/clinic-employee/add-employee-type',
        'sub' => [
            [
                NOMBRE => 'borrar-puesto-añadido',
                RUTA => '/people/clinic-employee-type/delete',
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
